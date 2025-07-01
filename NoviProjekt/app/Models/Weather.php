<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{

    protected $table = 'weather';
    protected $fillable = [
        'gradovi_id',
        'temperature'
    ];
    public function city()
    {



        return $this->belongsTo(City::class);
    }
}
