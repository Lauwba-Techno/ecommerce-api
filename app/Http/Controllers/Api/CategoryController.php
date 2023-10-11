<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return new PostResource(true, "Data berhasil di dapat", $category);

    }

    public function show(Category $category)
    {
        return new PostResource(true, "Data berhasil di dapat", $category);
    }
}
