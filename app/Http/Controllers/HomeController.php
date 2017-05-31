<?php

namespace App\Http\Controllers;

use App\Client_invoice;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function show()
    {
        $invoice = Client_invoice::where([
            ['user_id', '=', auth()->user()->id],
            ['paid', '=', true]
        ])->get()->pluck('amount');
        dd($invoice);
        // Calculate invoice All time.
        $all_time =

        // Calculate invoice This week.
        // Calculate invoice Today.


        return view('home');
    }
}
