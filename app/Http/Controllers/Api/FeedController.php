<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeedController extends Controller
{
    public function index()
    {
        $feed = Feed::all();
        $feed->transform(function ($item) {
            $item->feed_image = env('APP_URL') . Storage::url($item->feed_image);
            return $item;
        });
        return new PostResource(true, "Data berhasil didapat", $feed);
    }
}
