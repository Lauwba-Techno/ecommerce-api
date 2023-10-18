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
            $item->category_image = 'https://ecommerce.pkl-lauwba.com/' . Storage::url($item->category_image);
            return $item;
        });
        return new PostResource(true, "Data berhasil didapat", $category);
    }

    public function show(Category $category)
    {
        $category->category_image = 'https://ecommerce.pkl-lauwba.com/' . Storage::url($category->category_image);
        return new PostResource(true, "Data berhasil didapat", $category);
    }
}
