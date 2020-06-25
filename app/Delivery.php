<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
      'mode',
      'price',
      'address_id'
    ];

    public function command()
    {
        return $this->hasOne('App\Command');
    }

    public function addresses()
    {
        return $this->hasMany('App\Address');
    }
}
