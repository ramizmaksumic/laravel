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
            "name" => "required|max:255|unique:products",
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

    public function delete($product)
    {

        $singleProduct = Product::where(['id' => $product])->first();

        if ($singleProduct === null) {
            die("Ovaj proizvod ne postoji u bazi podataka.");
        } else {
            $singleProduct->delete();
        }

        return redirect()->back();
    }

    public function singleProduct($product)
    {
        $product = Product::findOrFail($product);

        return view('single-product', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);

        $request->validate([
            "name" => "required|max:255|unique:products",
            "description" => "required|max:255",
            "amount" => "required|max:20",
            "price" => "required|max:20"
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->amount = $request->amount;
        $product->price = $request->price;
        $product->image = $request->image;

        $product->save();

        return redirect('/');
    }
}
