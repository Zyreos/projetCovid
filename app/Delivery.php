<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
      'mode',
      'address1',
      'address2',
      'postcode',
      'city',
      'country',
      'price'
    ];

    public function command()
    {
        return $this->hasOne('App\Command');
    }
}
