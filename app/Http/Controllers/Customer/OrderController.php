<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->orderByDesc('created_at')->get();

        return view('purchases', compact('orders'));
    }

    public function store(Request $request)
    {
        $cartProducts = $request->session()->get('cart', []);

        $total = 0;
        foreach ($cartProducts as $product) {
            $total += $product['price'];
        }

        $user = auth()->user();

        $order = new Order();
        $order->user_id = $user->id;
        $order->total_price = $total;
        $order->status = 'pending'; 
        $order->save();

        $request->session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Purchase successful!');
    }
}
