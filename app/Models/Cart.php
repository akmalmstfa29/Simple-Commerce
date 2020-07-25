<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['qty', 'price', 'discount'];

    public function getPriceWithoutDiscAttribute()
    {
        return $this->price + $this->discount; //remove useless zero
    }

    public function getTotalPriceAttribute()
    {
        return $this->price * $this->qty; //remove useless zero
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
