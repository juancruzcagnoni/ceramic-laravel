<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cartProducts = $request->session()->get('cart', []);
        $total = 0;

        foreach ($cartProducts as $product) {
            $total += $product['price'];
        }

        return view('cart', ['cartProducts' => $cartProducts, 'total' => $total]);
    }

    public function store(Request $request)
    {
        $id = $request->input('product_id');
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('cart.index')->with('error', 'Product not found.');
        }

        $cart = $request->session()->get('cart', []);

        $cart[$id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
        ];

        $request->session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    public function destroy(Request $request, Product $cart)
    {
        $cartProducts = $request->session()->get('cart', []);

        $id = $cart->id;

        if (array_key_exists($id, $cartProducts)) {
            unset($cartProducts[$id]);
            $request->session()->put('cart', $cartProducts);
            return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
        } else {
            return redirect()->route('cart.index')->with('error', 'Product not found in cart.');
        }
    }
}
