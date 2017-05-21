<?php

namespace App\Http\Controllers;

use App\Client_invoice;
use App\Client_invoice_item;
use App\Mail\InvoiceSent;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    protected $dates = ['due_date'];

    const CREATED  = 'created'; // label-info
    const SENT     = 'sent'; // label-primary
    const REMINDER = 'reminder'; // label-warning
    const PAID     = 'paid'; // label-success

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
        $invoices = client_invoice::with('clients')
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->with('items')
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
        $invoice = new Client_invoice;
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

    public function pay($reference_key)
    {
        $invoice = Client_invoice::with('items')->whereReferenceKey($reference_key)->first();

        return view('invoices.pay', compact('invoice'));
    }

    public function markPaid($reference_key)
    {
        $invoice = Client_invoice::with('items')->whereReferenceKey($reference_key)->first();

        $invoice->paid = true;
        $invoice->status = self::PAID;
        $invoice->save();

        return back();
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
        $invoice = Client_invoice::whereReferenceKey($request->reference_key)->first();

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

        flash('Invice has been paid')->success();

        return back();

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
        // Delete invoice from database.
        Client_invoice::destroy($id);

        // Send mail to client.

        return response()->json(['success' => true]);
    }
}
