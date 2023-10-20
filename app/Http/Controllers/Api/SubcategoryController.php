<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategory = Subcategory::all();
        $subcategory->transform(function ($item) {
            $item->category->category_image = env('APP_URL') . Storage::url($item->category->category_image);
            $item->subcategory_image = env('APP_URL') . Storage::url($item->subcategory_image);
            $item->product->transform(function ($data) {
                $data->product_image = env('APP_URL') . Storage::url($data->product_image);
                return $data;
            });
            return $item;
        });
        return new PostResource(true, "Data berhasil didapat", $subcategory);
    }

    public function show(Subcategory $subcategory)
    {
        $subcategory->category->category_image = env('APP_URL') . Storage::url($subcategory->category->category_image);
        $subcategory->subcategory_image = env('APP_URL') . Storage::url($subcategory->subcategory_image);
        $subcategory->product->transform(function ($item) {
            $item->product_image = env('APP_URL') . Storage::url($item->product_image);
            return $item;
        });
        return new PostResource(true, "Data berhasil didapat", $subcategory);
    }
}
