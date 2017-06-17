<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $client;
    public $invoice;

    /**
     * Create a new message instance.
     *
     * @param $user
     * @param $client
     * @param $invoice
     */
    public function __construct($user, $client, $invoice)
    {
        $this->user = $user;
        $this->client = $client;
        $this->invoice = $invoice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.invoiceReminder')->subject('Reminder from ' . ucfirst($this->user->name));
    }
}
