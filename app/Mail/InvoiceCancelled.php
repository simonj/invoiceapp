<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceCancelled extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $client;

    /**
     * Create a new message instance.
     *
     * @param $user
     * @param $client
     */
    public function __construct($user, $client)
    {
        $this->user = $user;
        $this->client = $client;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.invoiceCancelled')->subject('Invoice from ' . ucfirst($this->user->name) .' is cancelled');
    }
}
