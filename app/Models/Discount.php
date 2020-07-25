<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['discount_code', 'discount_percentage'];

    public function scopeFindByCode($query, $code)
    {
        return $query->where('discount_code', $code)->first();
    }
}
