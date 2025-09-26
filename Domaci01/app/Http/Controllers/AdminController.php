<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    private $productRepo;

    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }
    public function index()
    {
        return view('admin');
    }

    public function addProducts(AddProductRequest $request)
    {

        $request->validated();

        $this->productRepo->createNew($request);

        return redirect('/admin/all-products');
    }

    public function allProducts()
    {

        $products = Product::all();

        return view('products', ["products" => $products]);
    }

    public function delete($product)
    {

        $singleProduct = $this->productRepo->returnProd($product);

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

    public function update(UpdateProductRequest $request, $id)
    {

        $product = Product::findOrFail($id);

        $request->validated();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->amount = $request->amount;
        $product->price = $request->price;
        $product->image = $request->image;

        $product->save();

        return redirect('/');
    }
}
