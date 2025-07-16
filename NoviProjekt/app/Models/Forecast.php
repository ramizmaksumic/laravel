<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    protected $table = 'forecast';
    protected $fillable = ['gradovi_id', 'temperature', 'date', 'weathet_type', 'probability'];

    const WEATHER = ["rainy", "snowy", "sunny"];
    public function city()
    {
        return $this->belongsTo(City::class, 'gradovi_id');
    }
}
