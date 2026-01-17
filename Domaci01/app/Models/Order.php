<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'price', 'status'];

    public function products()
    {

        return $this->hasMany(Product::class)
            ->withPivot('amount');
    }
}
