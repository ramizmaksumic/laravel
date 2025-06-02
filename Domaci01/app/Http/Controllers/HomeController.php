<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()


    {
        $products = Product::orderBy('created_at', 'desc')
            ->take(6)
            ->get();




        return view('welcome', ['products' => $products]);
    }
}
