<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FeedController extends Controller
{
    public function index()
    {
        $feed = Feed::all();
        return view('admin.feed.index', compact('feed'));
    }

    public function create()
    {
        return view('admin.feed.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'feed_title' => 'required',
            'feed_category' => 'required',
            'feed_desc' => 'required',
            'feed_image' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->messages());
        }

        $feed_image = $request->file('feed_image');
        if($path = Storage::putFile('public/feeds', $feed_image)){
            $feed = Feed::create([
                'feed_title' => $request->feed_title,
                'feed_category' => $request->feed_category,
                'feed_desc' => $request->feed_desc,
                'feed_image' => $path
            ]);

            if ($feed) {
                return Redirect()->to('/feed')->withSuccess('Data berhasil ditambah');
            } else {
                return back()->withInput()->withErrors('Data gagal ditambah');
            }
        }else{
            return back()->withInput()->withErrors(['error'=> ['Image tidak bisa di simpan']]);
        }

    }

    public function edit(Feed $feed)
    {
        return view('admin.feed.edit', compact('feed'));
    }

    public function update(Request $request, Feed $feed)
    {
        $validator = Validator::make($request->all(), [
            'feed_title' => 'required',
            'feed_category' => 'required',
            'feed_desc' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->messages());
        }

        $data = [
            'feed_title' => $request->feed_title,
            'feed_category' => $request->feed_category,
            'feed_desc' => $request->feed_desc,
        ];

        if($request->hasFile('feed_image')){
            if (Storage::get($feed->feed_image)) {
                Storage::delete($feed->feed_image);
            }

            $feed_image = $request->file('feed_image');
            $path = Storage::putFile('public/feeds', $feed_image);
            $data['feed_image'] = $path;
        }

        $feed->update($data);

        if ($feed) {
            return Redirect()->to('/feed')->withSuccess('Data berhasil Diupdate');
        } else {
            return back()->withErrors('Data gagal Diupdate');
        }
    }

    public function destroy(Feed $feed)
    {
        if (Storage::get($feed->feed_image)) {
            Storage::delete($feed->feed_image);
        }

        $feed->delete();

        if ($feed) {
            return back()->withSuccess('Data berhasil Dihapus');
        } else {
            return back()->withErrors('Data gagal Dihapus');
        }
    }
}
