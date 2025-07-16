<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Forecast;
use Illuminate\Http\Request;

class ForecastController extends Controller
{
    public function index(City $city)
    {

        $forecast = Forecast::all();

        dd($city->id);
    }
}
