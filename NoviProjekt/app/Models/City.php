<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $table = 'gradovi';
    protected $fillable = ['name'];
    public function forecasts()
    {
        return $this->hasMany(Forecast::class);
    }

    public function weathers()
    {
        return $this->hasMany(Weather::class);
    }
}
