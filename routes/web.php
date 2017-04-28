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

use App\Http\Controllers\InvoiceController;

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
Route::get('invoices', 'InvoiceController@index');
Route::get('invoices/{reference_id}/preview', 'InvoiceController@preview');
Route::post('invoices/send', 'InvoiceController@send');
Route::get('invoices/create', 'InvoiceController@create');
Route::post('invoices/validateInvoice', 'InvoiceController@validateInvoice');
Route::get('fetchInvoices', 'InvoiceController@fetchInvoices');
