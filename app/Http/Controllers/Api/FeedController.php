<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Feed;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index()
    {
        $feed = Feed::all();
        return new PostResource(true, "Data berhasil di dapat", $feed);
    }
}
