<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Category extends Model
{
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
