<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function index()
    {
        $carousel = Carousel::all();
        $carousel->transform(function ($item) {
            $item->carousel_image = env('APP_URL') . Storage::url($item->carousel_image);
            return $item;
        });
        return new PostResource(true, "Data berhasil didapat", $carousel);
    }
}
