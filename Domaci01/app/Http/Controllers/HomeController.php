<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()


    {
        $sat = date("H");

        $trenutnoVrijeme = date("h:i:s");

        return view('welcome', [

            'trenutnoVrijeme' => $trenutnoVrijeme,
            'sat' => $sat

        ]);
    }
}
