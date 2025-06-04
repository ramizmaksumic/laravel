<?php

namespace App\Http\Controllers;

use App\Models\Ocena;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class OceneController extends Controller
{
    public function index()
    {
        return view('add-predmet');
    }

    public function addPredmet(Request $request)
    {

        $validated = $request->validate([
            "predmet" => 'required|string',
            "ocena" => 'required|integer',
            "profesor" => 'required|string'
        ]);



        Ocena::create($validated);

        return redirect()->back()->with('success', 'Proizvod je uspješno dodan!');
    }
}
