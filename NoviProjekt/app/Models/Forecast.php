<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    protected $table = 'forecast';
    protected $fillable = ['city_id', 'temperature', 'date'];
    public function city()
    {

        return $this->hasOne(City::class, 'id', 'id');
    }
}
