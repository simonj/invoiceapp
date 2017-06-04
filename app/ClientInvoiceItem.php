<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientInvoiceItem extends Model
{
    protected $table = 'client_invoice_items';
    protected $fillable = ['client_invoice_id', 'quantity', 'description', 'price'];

    public function invoice()
    {
        return $this->belongsTo(ClientInvoice::class);
    }
}
