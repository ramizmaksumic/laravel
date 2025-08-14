<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCities extends Controller
{
    public function favourites(Request $request, $city)
    {

        $user = Auth::user();

        if ($user === null) {
            return redirect()->back()->with(["error" => "Morate biti ulogovani za ovu opciju."]);
        }
        \App\Models\UserCitie::create([
            'city_id' => $city,
            'user_id' => $user->id
        ]);

        return redirect()->back();
    }

    public function deleteFavourites($city)
    {
        $user = Auth::user();

        if ($user === null) {
            return redirect()->back()->with(["error" => "Morate biti ulogovani za ovu opciju."]);
        }

        // Brišemo samo za tog usera i taj grad
        \App\Models\UserCitie::where('user_id', $user->id)
            ->where('city_id', $city)
            ->delete();

        return redirect()->back();
    }
}
