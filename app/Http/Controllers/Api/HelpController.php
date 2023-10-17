<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Help;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HelpController extends Controller
{
    public function index()
    {
        $help = Help::all();
        $help->transform(function ($item) {
            $item->help_image = Storage::url($item->help_image);
            return $item;
        });
        return new PostResource(true, "Data berhasil didapat", $help);
    }

    public function show(Help $help)
    {
        $help->transform(function ($item) {
            $item->help_image = Storage::url($item->help_image);
            return $item;
        });
        return new PostResource(true, "Data berhasil didapat", $help);
    }
}
