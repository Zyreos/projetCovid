<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public function article()
    {
        return $this->belongsTo('App\Category', 'foreign_key');
    }

    public function pictures()
    {
        return $this->hasMany('App\Picture', 'foreign_key');
    }

    public function commands()
    {
        return $this->belongsToMany('App\Command', 'foreign_key');
    }
}
