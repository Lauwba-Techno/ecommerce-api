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
            $item->subcategory_image = 'https://ecommerce.pkl-lauwba.com/' . Storage::url($item->subcategory_image);
            return $item;
        });
        return new PostResource(true, "Data berhasil didapat", $subcategory);
    }

    public function show(Subcategory $subcategory)
    {
        $subcategory->subcategory_image = 'https://ecommerce.pkl-lauwba.com/' . Storage::url($subcategory->subcategory_image);
        return new PostResource(true, "Data berhasil didapat", $subcategory);
    }
}
