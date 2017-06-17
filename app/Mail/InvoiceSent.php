<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceSent extends Mailable
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
     * @param $items
     */
    public function __construct($user, $client, $invoice, $items)
    {
        $this->user = $user;
        $this->client = $client;
        $this->invoice = $invoice;
        $this->items = $items;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.invoiceSent')->subject('Invoice from ' . ucfirst($this->user->name));
    }
}
