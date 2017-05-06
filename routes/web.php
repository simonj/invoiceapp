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

Route::post('charge', function () {
    // Set your secret key: remember to change this to your live secret key in production
    // See your keys here: https://dashboard.stripe.com/account/apikeys
    \Stripe\Stripe::setApiKey("sk_test_BXSPQ4kmTwwBazTOTuPi8NM1");

    // Token is created using Stripe.js or Checkout!
    // Get the payment token submitted by the form:
    $token = $_POST['stripeToken'];

    // Charge the user's card:
    $charge = \Stripe\Charge::create([
        "amount"      => 1000,
        "currency"    => "dkk",
        "description" => "Example charge",
        "source"      => $token,
    ]);
});
