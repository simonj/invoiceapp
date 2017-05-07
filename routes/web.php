<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Client_invoice;

Route::get('/', 'WelcomeController@show');

Route::get('/home', 'HomeController@show');
// CLients
Route::get('/clients', 'ClientController@index');
Route::get('/clients/create', 'ClientController@create');
Route::post('/clients', 'ClientController@store');
Route::get('clients/{id}/edit', 'ClientController@edit');
Route::delete('/clients/{id}', 'ClientController@destroy');
Route::get('loadClients', 'ClientController@loadClients');

// Invoices
Route::resource('invoices', 'InvoiceController');
Route::get('invoices/{reference_id}/pay', 'InvoiceController@pay');
Route::get('fetchInvoices', 'InvoiceController@fetchInvoices');
Route::post('invoices/validateInvoice', 'InvoiceController@validateInvoice');
Route::post('invoices/charge', 'InvoiceController@charge');

//Route::post('charge', function (Illuminate\Http\Request $request) {
//
//    // Find invoice by reference key.
//    $invoice = Client_invoice::whereReferenceKey($request->reference_key)->first();
//
////     Set your secret key: remember to change this to your live secret key in production
////     See your keys here: https://dashboard.stripe.com/account/apikeys
//    \Stripe\Stripe::setApiKey("sk_test_BXSPQ4kmTwwBazTOTuPi8NM1");
//
//    // Token is created using Stripe.js or Checkout!
//    // Get the payment token submitted by the form:
//    $token = $_POST['stripeToken'];
//
//    // Charge the user's card:
//    $charge = \Stripe\Charge::create([
//        "amount"      => $invoice->amount,
//        "currency"    => "usd",
//        "description" => 'Invoice #'. $invoice->reference_key .' paid',
//        "source"      => $token,
//    ]);
//
//    // Update invoice status.
//    $invoice->paid = true;
//    $invoice->status = 'paid';
//    $invoice->save();
//
//    flash('Invice has been paid')->success();
//
//    return back();
//
//});
