<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'image', 'price'];


    public function getImageUrlAttribute()
    {
        return asset('img/product/'.$this->image);
    }

    public function setPriceAttribute($value)
    {
        return $value + 0; //remove useless zero
    }
}
