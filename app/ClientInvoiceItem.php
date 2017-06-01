<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client_invoiceItem extends Model
{
    protected $table = 'client_invoice_items';
    protected $fillable = ['client_invoice_id', 'quantity', 'description', 'price'];

    public function invoice()
    {
        return $this->belongsTo(Client_invoice::class);
    }
}
