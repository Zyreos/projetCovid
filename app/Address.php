<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'address1',
        'address2',
        'postcode',
        'city',
        'country',
    ];

    public function command()
    {
        return $this->hasOne('App\Command');
    }

    public function delivery()
    {
        return $this->hasOne('App\Delivery');
    }

}
