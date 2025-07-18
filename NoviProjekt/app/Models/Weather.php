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



        return $this->hasOne(City::class, 'id', 'id');
    }

    public function index()
    {


        return view('forecast-form');
    }
}
