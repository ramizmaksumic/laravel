<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $table = 'gradovi';
    protected $fillable = ['name'];

    // u City modelu:
    public function forecasts()
    {
        return $this->hasMany(Forecast::class, 'gradovi_id')->orderBy('date', 'desc');
    }
}
