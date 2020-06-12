<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [
        'name',
        'price',
        'description',
        'dimensions',
        'quantity',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function pictures()
    {
        return $this->hasMany('App\Picture', 'picture_id');
    }

    public function commands()
    {
        return $this->belongsToMany('App\Command', 'baskets');
    }
}
