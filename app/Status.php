<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    public function commands()
    {
        return $this->hasMany('App\Command', 'command_id');
    }
}
