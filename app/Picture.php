<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
      'path',
      'article_id'
    ];

    public function article()
    {
        return $this->hasOne('App\Article');
    }
}
