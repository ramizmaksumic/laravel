<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use App\Models\Citie;
use App\Models\City;
use App\Models\Forecast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ForecastController extends Controller
{
    public $cityName;

    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

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

        if (!$cityName) {

            return back()->with('error', 'Molimo unesite grad za pretragu');
        }
        $data = $this->weatherService->getForecast($cityName);

        if (!$data) {
            return back()->with('error', 'Grad nije pronađen u API-ju');
        }


        // $cities = City::where('name', "LIKE", $data['location']['name'])->first();

        // dd($cities);





        $cities = City::where('name', $data['location']['name'])->first();

        if (!$cities) {
            $cities = City::create([
                'name' => $data['location']['name'],
            ]);
        }

        Forecast::updateOrCreate(
            [
                'gradovi_id' => $cities->id,
                'date' => $data['forecast']['forecastday'][0]['date'],
            ],
            [
                'temperature' => $data['forecast']['forecastday'][0]['day']['maxtemp_c'],
                'weather_type' => $data['forecast']['forecastday'][0]['day']['condition']['text'],
                'probability' => $data['forecast']['forecastday'][0]['day']['daily_chance_of_rain'],
            ]
        );

        // 3. Povuci grad sa danasnjim forecastom
        $cities = City::with('todaysForecast')
            ->where("id", $cities->id)
            ->get();

        if (!$cities) {
            return back()->with('error', "Nema tog grada u API-ju");
        }



        $userCities = [];

        if (Auth::check()) {

            $userCities = Auth::user()->cityFavourites;
            $userCities = $userCities->pluck('city_id')->toArray();
        }



        return view('show-cities', compact('cities', 'userCities'));
    }
}
