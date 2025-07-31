<?php

namespace App\Http\Controllers;

use App\Models\Forecast;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showForecast()


    {

        $forecast = Forecast::all();
        return view('forecast', ['forecast' => $forecast]);
    }

    public function updateForecast(Request $request)
    {

        Forecast::create(
            [
                'gradovi_id' => $request->get('city_id'),
                'temperature' => $request->get('temperature'),
                'weather_type' => $request->get('weather_type'),
                'probability' => $request->get('probability'),
                'date' => $request->get('date'),
            ]
        );

        return redirect()->back();
    }
}




// <i class="fa-solid fa-cloud-rain"></i>
// <i class="fa-solid fa-snowflake"></i>
// <i class="fa-solid fa-sun"></i>