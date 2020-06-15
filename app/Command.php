<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    //
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

    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }


}
