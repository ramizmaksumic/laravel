<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $favourites = collect();

        if ($user) {
            $userCities = \App\Models\UserCitie::where('user_id', $user->id)->pluck('city_id');
            $favourites = \App\Models\City::whereIn('id', $userCities)->with('forecasts')->get();
        }
        return view('welcome', compact('favourites'));
    }
}
