<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Help;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index()
    {
        $help = Help::all();
        return new PostResource(true, "Data berhasil di dapat", $help);
    }
    
    public function show(Help $help)
    {
        return new PostResource(true, "Data berhasil di dapat", $help);
    }
}
