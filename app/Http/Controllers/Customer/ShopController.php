<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        return view('shop', ['shop' => Product::all()]);
    }

    public function show(Product $shop)
    {
        return view('detail-product', ['product' => $shop]);
    }
}
