<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $category->transform(function ($item) {
            $item->category_image = env('APP_URL') . Storage::url($item->category_image);
            $item->subcategory->transform(function ($data) {
                $data->subcategory_image = env('APP_URL') . Storage::url($data->subcategory_image);
                return $data;
            });
            return $item;
        });
        return new PostResource(true, "Data berhasil didapat", $category);
    }

    public function show(Category $category)
    {
        $category->subcategory->transform(function ($item) {
            $item->subcategory_image = env('APP_URL') . Storage::url($item->subcategory_image);
            return $item;
        });
        return new PostResource(true, "Data berhasil didapat", $category);
    }
}
