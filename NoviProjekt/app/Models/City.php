<?php

namespace App\Models;

use Carbon\Carbon;
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


    public function todaysForecast()
    {
        return $this->hasOne(Forecast::class, 'gradovi_id', 'id')
            ->whereDate('date', Carbon::now());
    }
}
