<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citie extends Model
{
    protected $fillable = [
        'name',
        'description',
        'deg'
    ];
}
