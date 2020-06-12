<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function status()
    {
        return $this->belongsTo('App\Status', 'status_id');
    }

    public function delivery()
    {
        return $this->belongsTo('App\Delivery', 'delivery_id');
    }

    public function articles()
    {
        return $this->belongsToMany('App\Article', 'baskets');
    }


}
