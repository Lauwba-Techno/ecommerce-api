<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::all();
        return view('admin.cart.index', compact('cart'));
    }

    public function show(Cart $cart)
    {
        return view('admin.cart.index', compact('cart'));
    }
}
