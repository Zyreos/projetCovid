<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User', 'foreign_key');
    }

    public function status()
    {
        return $this->belongsTo('App\Status', 'foreign_key');
    }

    public function delivery()
    {
        return $this->belongsTo('App\Delivery', 'foreign_key');
    }

    public function articles()
    {
        return $this->belongsToMany('App\Article', 'foreign_key');
    }


}
