<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function addProducts(Request $request)
    {

        $request->validate([
            "name" => "required|max:255",
            "description" => "required|max:255",
            "amount" => "required|max:20",
            "price" => "required|max:20"
        ]);

        Product::create([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price"),
            "image" => $request->get("image"),
        ]);

        return redirect('/admin/all-products');
    }

    public function allProducts()
    {

        $products = Product::all();

        return view('products', ["products" => $products]);
    }
}
