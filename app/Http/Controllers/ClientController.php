<?php

namespace App\Http\Controllers;

use App\Client;
use App\Client_invoice;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{

    function __construct()
    {
        $this->middleware('subscribed', ['only' => ['store']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clients.index');
    }


    /**
     * Load all clients.
     */
    public function loadClients()
    {
        return response()->json(Client::where('user_id', Auth::user()->id)->get());
    }


    /**
     * Create new client
     */
    public function create()
    {

        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'company' => 'required',
            'email'   => 'required',
        ]);

        $client = new Client;

        $client->company = $request->company;
        $client->email = $request->email;
        $client->address1 = $request->address1;
        $client->address2 = $request->address2;
        $client->city = $request->city;
        $client->state = $request->state;
        $client->zipcode = $request->zipcode;
        $client->country = $request->country;
        $client->contact_person = $request->contact_person;
        $client->user_id = Auth::user()->id;

        $client->save();
    }


    /**
     * Edit client.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $clientId = Client::find($id)->id;

        return view('clients.edit', compact('clientId'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'company' => 'required',
            'email'   => 'required',
        ]);

        $client = Client::find($id);

        $client->company = $request->company;
        $client->email = $request->email;
        $client->address1 = $request->address1;
        $client->address2 = $request->address2;
        $client->city = $request->city;
        $client->state = $request->state;
        $client->zipcode = $request->zipcode;
        $client->country = $request->country;
        $client->contact_person = $request->contact_person;
        $client->user_id = Auth::user()->id;

        $client->save();
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
        // Delete invoice and invoice items.
        $invoice = Client_invoice::where('client_id', $id)->first();
        if ($invoice) {
            $invoice->items()->delete();
            $invoice->delete();
        }

        // Find client and delete client.
        $client = Client::find($id);
        $client->delete();


        return response()->json(['success' => true]);
    }
}
