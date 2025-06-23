<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citie;

class CitiesController extends Controller
{
    public function addCitie()
    {
        return view('add-cities');
    }

    public function createCitie(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "deg" => "required|integer",
            "description" => "required|string"
        ]);

        Citie::create([
            'name' => $request->get('name'),
            'deg' => $request->get('deg'),
            'description' => $request->get('description')
        ]);

        return redirect('/');
    }

    public function showCities()
    {
        $cities = Citie::all();



        return view('cities', ['cities' => $cities]);
    }
}
