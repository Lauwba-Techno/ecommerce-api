<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $product->transform(function ($item) {
            $item->subcategory->subcategory_image = env('APP_URL') . Storage::url($item->subcategory->subcategory_image);
            $item->product_image = env('APP_URL') . Storage::url($item->product_image);
            return $item;
        });
        return new PostResource(true, "Data berhasil didapat", $product);
    }

    public function show(Product $product)
    {
        $product->subcategory->subcategory_image = env('APP_URL') . Storage::url($product->subcategory->subcategory_image);
        $product->product_image = env('APP_URL') . Storage::url($product->product_image);
        return new PostResource(true, "Data berhasil didapat", $product);
    }
}
