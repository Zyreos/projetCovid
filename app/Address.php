<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'address1',
        'address2',
        'postcode',
        'city',
        'country',
        'is_bill'
    ];

    public function commands()
    {
        return $this->belongsToMany('App\Command');
    }

    public function delivery()
    {
        return $this->belongsTo('App\Delivery');
    }

}
