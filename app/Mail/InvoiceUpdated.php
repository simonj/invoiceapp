<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $client;
    public $invoice;
    public $items;

    /**
     * Create a new message instance.
     *
     * @param $user
     * @param $client
     * @param $invoice
     * @param $invoiceItems
     */
    public function __construct($user, $client, $invoice, $invoiceItems)
    {
        $this->user = $user;
        $this->client = $client;
        $this->invoice = $invoice;
        $this->items = $invoiceItems;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.invoiceUpdated')->subject('Invoice from ' . $this->user->name . ' is Updated');
    }
}
