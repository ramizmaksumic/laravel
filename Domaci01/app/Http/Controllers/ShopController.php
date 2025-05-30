<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {

        $products = ["Audi S5", "Mercedes G class", "BMW 650i", "Nissan GTR"];
        return view('shop', ['products' => $products]);
    }
}
