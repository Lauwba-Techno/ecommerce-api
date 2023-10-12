<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategory = Subcategory::all();
        return new PostResource(true, "Data berhasil didapat", $subcategory);
    }

    public function show(Subcategory $subcategory)
    {
        return new PostResource(true, "Data berhasil didapat", $subcategory);
    }
}
