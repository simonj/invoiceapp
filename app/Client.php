<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['company', 'email', 'adress1', 'adress2', 'city', 'state', 'zipcode', 'country', 'contact_person', 'user_id'];

    public function invoices()
    {
        return $this->hasMany('App\ClientInvoice', 'client_id');
    }

    public function user()
    {
        $this->belongsTo('App\User');
    }
}
