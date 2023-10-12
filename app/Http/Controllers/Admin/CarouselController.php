<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CarouselController extends Controller
{
    public function index()
    {
        $carousel = Carousel::all();
        return view('admin.carousel.index', compact('carousel'));
    }

    public function create()
    {
        return view('admin.carousel.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'carousel_image' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->messages());
        }

        $carousel_image = $request->file('carousel_image');
        if ($path = Storage::putFile('public/carousels', $carousel_image)) {
            $carousel = Carousel::create([
                'carousel_image' => $path
            ]);

            if ($carousel) {
                return Redirect()->to('/carousel')->withSuccess('Data berhasil ditambah');
            } else {
                return back()->withInput()->withErrors('Data gagal ditambah');
            }
        } else {
            return back()->withInput()->withErrors(['error' => ['Image tidak bisa di simpan']]);
        }
    }

    public function edit(Carousel $carousel)
    {
        return view('admin.carousel.edit', compact('carousel'));
    }

    public function update(Request $request, Carousel $carousel)
    {
        $validator = Validator::make($request->all(), [
            'carousel_image' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->messages());
        }

        if (Storage::get($carousel->carousel_image)) {
            Storage::delete($carousel->carousel_image);
        }

        $carousel_image = $request->file('carousel_image');
        $path = Storage::putFile('public/carousels', $carousel_image);

        $carousel->update(['carousel_image' => $path]);

        if ($carousel) {
            return Redirect()->to('/carousel')->withSuccess('Data berhasil Diupdate');
        } else {
            return back()->withErrors('Data gagal Diupdate');
        }
    }

    public function destroy(Carousel $carousel)
    {
        if (Storage::get($carousel->carousel_image)) {
            Storage::delete($carousel->carousel_image);
        }

        $carousel->delete();

        if ($carousel) {
            return back()->withSuccess('Data berhasil Dihapus');
        } else {
            return back()->withErrors('Data gagal Dihapus');
        }
    }
}
