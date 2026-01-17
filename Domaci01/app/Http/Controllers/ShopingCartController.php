<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopingRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItems;
use Illuminate\Support\Facades\DB;

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

    public function cartCheckout()
    {
        // 1. Ako je korpa prazna → redirect
        $cart = session()->get('cart');

        if (!$cart || count($cart) === 0) {
            return redirect()->route('home');
        }

        DB::beginTransaction();

        try {
            // 2. Provjera dostupnosti proizvoda
            foreach ($cart as $productId => $item) {
                $product = Product::findOrFail($productId);

                if ($product->amount < $item['quantity']) {
                    return redirect()
                        ->back()
                        ->with('error', 'Nažalost, proizvod "' . $product->name . '" nema dovoljno količine na stanju.');
                }
            }

            // 3. Kreiranje ordera
            $order = Order::create([
                'total_price' => collect($cart)->sum(
                    fn($item) => $item['price'] * $item['quantity']
                ),
            ]);

            // 4. Kreiranje order_items + smanjenje stanja
            foreach ($cart as $productId => $item) {
                OrderItems::create([
                    'order_id'  => $order->id,
                    'product_id' => $productId,
                    'quantity'  => $item['quantity'],
                    'price'     => $item['price'],
                ]);

                // Smanji stanje proizvoda
                Product::where('id', $productId)->decrement('amount', $item['quantity']);
            }

            // 5. Isprazni korpu
            session()->forget('cart');

            DB::commit();

            // 6. Thank you page
            return view('cart.thank-you', compact('order'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Došlo je do greške prilikom obrade narudžbe.');
        }
    }
}
