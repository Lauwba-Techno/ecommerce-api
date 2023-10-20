<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = Cart::where('user_id', $request->user_id)->get();
        $cart->transform(function ($item) {
            $item->product->product_image = env('APP_URL') . Storage::url($item->product->product_image);
            return $item;
        });
        return new PostResource(true, "Data berhasil didapat", $cart);
    }

    public function store(Request $request)
    {
        $where = [
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'quantity' => 1
        ];

        $cart = Cart::create($where);

        if ($cart) {
            return new PostResource(true, "Data berhasil ditambahkan", $cart);
        } else {
            return new PostResource(false, "Data gagal ditambahkan", []);
        }
    }

    public function show(Cart $cart)
    {
        $cart->product->product_image = env('APP_URL') . Storage::url($cart->product->product_image);
        return new PostResource(true, "Data berhasil didapat", $cart);
    }

    public function update(Request $request, Cart $cart)
    {
        $cart->update([
            'quantity' => $request->quantity
        ]);

        if ($cart) {
            return new PostResource(true, "Data berhasil diubah", $cart);
        } else {
            return new PostResource(false, "Data gagal diubah", []);
        }
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        if ($cart) {
            return new PostResource(true, "Data berhasil dihapus", $cart);
        } else {
            return new PostResource(false, "Data gagal dihapus", []);
        }
    }
}
