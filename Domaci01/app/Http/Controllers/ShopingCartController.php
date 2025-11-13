<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopingRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopingCartController extends Controller
{
    public function addToCart(ShopingRequest $request)
    {

        $product = Product::find($request->id);


        //Inicirajmo sesiju
        $cart = session()->get('cart', []);

        // Ako proizvod već postoji u korpi, povećaj količinu
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->amount;
        } else {
            // Ako ne postoji, dodaj ga u korpu
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->amount,
                'image' => $product->image ?? null, // ako imaš slike
            ];
        }

        // Sačuvaj korpu u sesiju
        session()->put('cart', $cart);


        return view('cart.checkout', compact('product'));
    }
}
