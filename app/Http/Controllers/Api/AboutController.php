<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::all();
        return new PostResource(true, "Data berhasil didapat", $about);
    }

    public function show(About $about)
    {
        return new PostResource(true, "Data berhasil didapat", $about);
    }
}
