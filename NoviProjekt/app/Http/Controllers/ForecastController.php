<?php

namespace App\Http\Controllers;

use App\Models\Citie;
use App\Models\City;
use App\Models\Forecast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForecastController extends Controller
{
    public function index(City $city)
    {

        $forecast = Forecast::all();

        dd($city);
    }

    public function showSearch()
    {
        return view('search-view');
    }

    public function doSearch(Request $request)
    {
        $cityName = $request->get('city');

        $cities = City::with('todaysForecast')->where("name", "LIKE", "%$cityName%")->get();

        if (count($cities) == 0) {
            return redirect()->back()->with("error", "Nismo pronašli grad sa ovim imenom.");
        }


        $userCities = [];

        if (Auth::check()) {

            $userCities = Auth::user()->cityFavourites;
            $userCities = $userCities->pluck('city_id')->toArray();
        }



        return view('show-cities', compact('cities', 'userCities'));
    }
}
