<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategory = Subcategory::all();
        return view('admin.subcategory.index', compact('subcategory'));
    }

    public function create()
    {
        $category = Category::all();
        return view('admin.subcategory.create', compact('category'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'subcategory_name' => 'required',
            'subcategory_desc' => 'required',
            'subcategory_image' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->messages());
        }

        $subcategory_image = $request->file('subcategory_image');
        if ($path = Storage::putFile('public/subcategories', $subcategory_image)) {
            $subcategory = Subcategory::create([
                'category_id' => $request->category_id,
                'subcategory_name' => $request->subcategory_name,
                'subcategory_desc' => $request->subcategory_desc,
                'subcategory_image' => $path
            ]);

            if ($subcategory) {
                return Redirect()->to('/subcategory')->withSuccess('Data berhasil ditambah');
            } else {
                return back()->withInput()->withErrors('Data gagal ditambah');
            }
        } else {
            return back()->withInput()->withErrors(['error' => ['Image tidak bisa di simpan']]);
        }
    }

    public function edit(Subcategory $subcategory)
    {
        $category = Category::all();
        return view('admin.subcategory.edit', compact('subcategory', 'category'));
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'subcategory_name' => 'required',
            'subcategory_desc' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->messages());
        }

        $data = [
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_desc' => $request->subcategory_desc,
        ];


        if ($request->hasFile('subcategory_image')) {
            if (Storage::get($subcategory->subcategory_image)) {
                Storage::delete($subcategory->subcategory_image);
            }

            $subcategory_image = $request->file('subcategory_image');
            $path = Storage::putFile('public/subcategories', $subcategory_image);
            $data['subcategory_image'] = $path;
        }

        $subcategory->update($data);

        if ($subcategory) {
            return Redirect()->to('/subcategory')->withSuccess('Data berhasil Diupdate');
        } else {
            return back()->withErrors('Data gagal Diupdate');
        }
    }

    public function destroy(Subcategory $subcategory)
    {
        if (Storage::get($subcategory->subcategory_image)) {
            Storage::delete($subcategory->subcategory_image);
        }

        $subcategory->delete();

        if ($subcategory) {
            return back()->withSuccess('Data berhasil Dihapus');
        } else {
            return back()->withErrors('Data gagal Dihapus');
        }
    }
}
