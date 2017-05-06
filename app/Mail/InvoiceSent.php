<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        return $this->markdown('emails.invoiceSent')->subject('Invoice from '. $this->user->name);
    }
}
