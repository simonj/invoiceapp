<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function show()
    {

        // Calculate invoice All time.
        $all_time = auth()->user()->clientInvoices()->where('paid', '=', true)->sum('amount');

        // Calculate invoice This week.
        $from_date = Carbon::now()->subDay()->startOfWeek()->toDateTimeString();
        $till_date = Carbon::now()->subDay()->endOfWeek()->toDateTimeString();

        $this_week = auth()->user()->clientInvoices()->where('paid', '=', true)
            ->whereBetween('updated_at', [$from_date, $till_date])->sum('amount');

        // Calculate invoice Today.
        $today_date = Carbon::now()->today()->toDateTimeString();

        $today = auth()->user()->clientInvoices()->where('paid', '=', true)
            ->whereDate('updated_at', $today_date)->sum('amount');

        return view('home', compact('all_time', 'this_week', 'today'));
    }
}
