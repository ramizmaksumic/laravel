<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCitie extends Model
{
    protected $table = 'user_cities';

    protected $fillable = [
        'user_id',
        'city_id'
    ];
}
