<?php

namespace App\Console\Commands;

use App\ClientInvoice;
use App\Mail\InvoiceReminder;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class sendReminderEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifications:sendReminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Find all invoices with due dates within a week';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Get all invoices with due dates within a week.

        $due_dates = collect(ClientInvoice::where('paid', '=', false)
            ->whereBetween('due_date', [
                Carbon::parse('last monday')->startOfDay(),
                Carbon::parse('next friday')->endOfDay(),
            ])->get());


        // Send emails.
        $due_dates->each(function ($invoice) {
//            dd($invoice->clients->email);
            Mail::to($invoice->clients->email)->send(new InvoiceReminder($invoice->user, $invoice->clients, $invoice));
        });
    }
}
