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

// Invoice related that does not need a auth.
Route::get('invoices/{reference_id}/pay', 'InvoiceController@pay');
Route::post('invoices/charge', 'InvoiceController@charge');
Route::get('invoices/{reference_id}/hasSeenEmail', 'InvoiceController@hasSeenEmail');
Route::get('invoices/{reference_id}/downloadPdf', 'InvoiceController@downloadPDf');

Route::group(['middleware' => 'auth', 'subscribed'], function () {

    // Dashboard home.
    Route::get('/home', 'HomeController@show');

    // Clients.
    Route::resource('clients', 'ClientController');
    Route::get('loadClients', 'ClientController@loadClients');

    // Invoices.
    Route::resource('invoices', 'InvoiceController');

    Route::get('fetchInvoices', 'InvoiceController@fetchInvoices');
    Route::post('invoices/validateInvoice', 'InvoiceController@validateInvoice');
    Route::get('invoices/{reference_id}/markPaid', 'InvoiceController@markPaid');

    Route::get('stripe/connect', function (Illuminate\Http\Request $request) {

        env('STRIPE_CLIENT_ID', 'sk_test_BXSPQ4kmTwwBazTOTuPi8NM1');
        env('STRIPE_KEY', 'sk_test_BXSPQ4kmTwwBazTOTuPi8NM1');

        env('TOKEN_URI', 'https://connect.stripe.com/oauth/token');
        env('AUTHORIZE_URI', 'https://connect.stripe.com/oauth/authorize');

        if (isset($_GET['code'])) { // Redirect w/ code
            $code = $_GET['code'];

            $token_request_body = [
                'client_secret' => API_KEY,
                'grant_type'    => 'authorization_code',
                'client_id'     => CLIENT_ID,
                'code'          => $code,
            ];

            $req = curl_init(TOKEN_URI);
            curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($req, CURLOPT_POST, true);
            curl_setopt($req, CURLOPT_POSTFIELDS, http_build_query($token_request_body));


            // TODO: Additional error handling
            $respCode = curl_getinfo($req, CURLINFO_HTTP_CODE);
            $resp = json_decode(curl_exec($req), true);
            curl_close($req);

            // Find logged in user and set stripe token.
            $user = App\User::find(Auth::user()->id);
            $user->stripe_id = $resp['stripe_user_id'];
            $user->stripe_connect_token = $resp['access_token'];
            $user->save();

            return back();
        }
    });

    // Disconnect stripe.
    route::get('stripe/disconnect', function () {

        // Find user.
        $user = App\User::find(auth()->user()->id);

        // Remove stripe id and stripe token from user.
        $user->stripe_id = null;
        $user->stripe_connect_token = null;
        $user->save();

        return back();
    });

});
