<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    protected $table = 'forecast';
    protected $fillable = ['gradovi_id', 'temperature', 'date', 'probability'];

    const WEATHER = ["rainy", "snowy", "sunny", "cloudy"];
    public function city()
    {
        return $this->belongsTo(City::class, 'gradovi_id');
    }

    public function getColorAttribute()
    {
        if ($this->temperature <= 0) {
            return 'lightblue';
        } elseif ($this->temperature <= 15) {
            return 'blue';
        } elseif ($this->temperature <= 25) {
            return 'green';
        } else {
            return 'red';
        }
    }

    public function getWeatherIconAttribute(): string
    {
        if ($this->temperature === null) {
            return ''; // ne prikazuje se ništa dok nema temperature
        }

        return match (true) {
            $this->temperature >= 25 => 'fa-sun',
            $this->temperature >= 15 => 'fa-cloud-rain',
            $this->temperature >= 5  => 'fa-cloud',
            default                  => 'fa-snowflake',
        };
    }


    public function shouldShowTemperature()
    {
        // logika kada da se temperatura prikazuje
        return match ($this->weather_type) {
            'snowy' => $this->temperature <= 0,
            'rainy' => $this->temperature >= 0,
            'sunny', 'cloudy' => true,
            default => false,
        };
    }
}
