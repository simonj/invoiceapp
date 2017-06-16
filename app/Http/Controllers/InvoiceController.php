<?php

namespace App\Http\Controllers;

use App\ClientInvoice;
use App\ClientInvoiceItem;
use App\Mail\InvoiceCancelled;
use App\Mail\InvoicePaid;
use App\Mail\InvoiceSent;
use App\Mail\InvoiceUpdated;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Spark\Contracts\Repositories\NotificationRepository;


class InvoiceController extends Controller
{
    protected $dates = ['due_date'];

    const CREATED   = 'created';  // label-info
    const SENT      = 'sent';     // label-primary
    const REMINDER  = 'reminder'; // label-warning
    const PAID      = 'paid';     // label-success
    const UPDATED   = 'updated';  // label-info

    /**
     * Get invoices.
     */
    public function index()
    {
        return view('invoices.index');
    }

    /**
     * Fetch All invoices.
     */
    public function fetchInvoices()
    {
        $invoices = CLientInvoice::with('clients')
            ->with('items')
            ->orderBy('created_at', 'desc')
            ->where('user_id', Auth::user()->id)
            ->get();

        return $invoices;
    }

    /**
     * Create invoice.
     */
    public function create()
    {
        return view('invoices.create');
    }

    /**
     * Preview invoice
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return string
     */
    public function validateInvoice(Request $request)
    {
        // Add validation.
        $this->validate(
            $request,
            [
                'client'              => 'required',
                'date'                => 'required',
                'items.*.quantity'    => 'required',
                'items.*.description' => 'required',
                'items.*.price'       => 'required'
            ],
            [
                'items.*.quantity.required'    => 'Quantity field is required.',
                'items.*.description.required' => 'Description field is required.',
                'items.*.price.required'       => 'Price field is required.'
            ]
        );

        return response()->json(['success' => true]);
    }

    /**
     * Create & send invoice to customer.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        // Generate reference key.
        $reference_key = str_random(60);

        // Create invoice.
        $invoice = new ClientInvoice();
        $invoice->reference_key = $reference_key;
        $invoice->client_id = $request->client['id'];
        $invoice->user_id = Auth::user()->id;
        $invoice->due_date = Carbon::parse($request->date);
        $invoice->status = self::SENT;
        $invoice->amount = $request->amount;
        $invoice->notes = $request->notes;
        $invoice->paid = 0;
        $invoice->save();

        // Create invoice quantities.
        $items = $request->input('items');

        $invoice->items()->createMany($items);

        $user = Auth::user();
        $client = $request->client['contact_person'];
        $items = $invoice->items()->get();

        // Send email to client.
        Mail::to($request->client['email'])->send(new InvoiceSent($user, $client, $invoice, $items));
    }

    /**
     * Update invoice
     *
     * @param \Illuminate\Http\Request $request
     * @param $reference_key
     *
     * @internal param $id
     */
    public function update(Request $request, $reference_key)
    {
        // Validate inputs.
        $this->validate(
            $request,
            [
                'due_date'            => 'required',
                'items.*.quantity'    => 'required',
                'items.*.description' => 'required',
                'items.*.price'       => 'required'
            ],
            [
                'items.*.quantity.required'    => 'Quantity field is required.',
                'items.*.description.required' => 'Description field is required.',
                'items.*.price.required'       => 'Price field is required.'
            ]
        );

        // Update invoice in database.
        $invoice = ClientInvoice::find($request->id);
        $invoice->due_date = Carbon::parse($request->due_date);
        $invoice->status = self::UPDATED;
        $invoice->amount = $request->amount;
        $invoice->notes = $request->notes;
        $invoice->save();

        // Get all invoice items.
        $items = $request->items;

        // Insert or update all invoice items.
        $invoiceItems = collect($items)->each(function ($item) use ($invoice) {

            // Get product by product code.
            ClientInvoiceItem::updateOrCreate(
                ['id' => $item['id']],
                ['quantity'          => $item['quantity'],
                'description'       => $item['description'],
                'price'             => $item['price']]
            );
        });


        // Send email to client.
        Mail::to($invoice->clients->email)->send(new InvoiceUpdated(auth()->user(), $invoice->clients, $invoice, $invoiceItems));
    }

    /**
     * Show the pay page for the client.
     */
    public function pay(NotificationRepository $notifications, $reference_key)
    {
        $invoice = ClientInvoice::with('items')->whereReferenceKey($reference_key)->first();

        // I've its not the user viewing invoice, we update "seen invoice"
        if (auth()->guest()) {
            $invoice->has_seen_invoice = true;
            $invoice->save();

            $notifications->create($invoice->user, [
                'icon' => 'fa-envelope-o',
                'body' => 'Your client ' . $invoice->clients->company . ' have clicked on the link in email',
            ]);
        }

        return view('invoices.pay', compact('invoice'));
    }

    public function markPaid($reference_key)
    {
        $invoice = ClientInvoice::with('items')->whereReferenceKey($reference_key)->first();

        $invoice->paid = true;
        $invoice->status = self::PAID;
        $invoice->save();

        // Send email to client.
        Mail::to($invoice->clients->email)->send(new InvoicePaid(auth()->user(), $invoice->clients, $invoice));

        return back();
    }

    /**
     * Client has seen email.
     *
     * @param \Laravel\Spark\Contracts\Repositories\NotificationRepository $notifications
     * @param $reference_key
     */
    public function hasSeenEmail(NotificationRepository $notifications, $reference_key)
    {
        // Find invoice.
        $invoice = ClientInvoice::whereReferenceKey($reference_key)->first();

        // Update has seen email status.
        $invoice->has_seen_email = true;
        $invoice->save();

        // Notify user that client has open the email.
        $notifications->create(auth()->user(), [
            'icon' => 'fa-envelope-o',
            'body' => 'Your client ' . $invoice->clients->company . ' have seen your email',
        ]);

    }

    /**
     * Charge clients credit card.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function charge(Request $request)
    {
        // Find invoice by reference key.
        $invoice = ClientInvoice::whereReferenceKey($request->reference_key)->first();

        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_BXSPQ4kmTwwBazTOTuPi8NM1");

        // Token is created using Stripe.js or Checkout!
        // Get the payment token submitted by the form:
        $token = $_POST['stripeToken'];

        // Charge the user's card:
        $charge = \Stripe\Charge::create([
            "amount"      => $invoice->amount,
            "currency"    => "usd",
            "description" => 'Invoice #' . $invoice->reference_key . ' paid',
            "source"      => $token,
        ]);

        // Update invoice status.
        $invoice->paid = true;
        $invoice->status = 'paid';
        $invoice->save();

        flash('Invoice has been paid')->success();

        return back();
    }

    public function downloadPdf($reference_key)
    {
        // Find invoice by reference_key.
        $invoice = ClientInvoice::whereReferenceKey($reference_key)->get()->toArray();


        $pdf = \PDF::loadView('pdf.simple', $invoice);

        return $pdf->download('invoice.pdf');

        // generate PDF.

        // Let user / client download
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = ClientInvoice::find($id);

        // Send email to client.
        Mail::to($invoice->clients->email)->send(new InvoiceCancelled(auth()->user(), $invoice->clients));

        // Delete invoice from database.
        ClientInvoice::destroy($id);


        return response()->json(['success' => true]);
    }
}
