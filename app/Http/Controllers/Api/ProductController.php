<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return new PostResource(true, "Data berhasil di dapat", $product);
    }

    public function show(Product $product)
    {
        return new PostResource(true, "Data berhasil di dapat", $product);
    }
}
