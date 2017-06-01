<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientInvoice extends Model
{
    protected $table = 'client_invoices';
    protected $fillable = ['reference_key', 'client_id', 'user_id', 'due_date', 'status', 'notes', 'amount', 'paid'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function clients()
    {
        return $this->belongsTo('App\Client', 'client_id');
    }

    public function items()
    {
        return $this->hasMany(Client_invoiceItem::class, 'client_invoice_id');
    }
}
