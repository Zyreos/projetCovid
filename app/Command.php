<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    protected $fillable = [
        'date_validation',
        'total',
        'status_id',
        'delivery_id',
        'user_id',

    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function delivery()
    {
        return $this->belongsTo('App\Delivery');
    }

    public function addresses()
    {
        return $this->belongsToMany('App\Address');
    }

    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }


}
