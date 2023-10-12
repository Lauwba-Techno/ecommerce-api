<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
            'category_desc' => 'required',
            'category_image' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->messages());
        }

        $category_image = $request->file('category_image');
        if ($path = Storage::putFile('public/categories', $category_image)) {
            $category = Category::create([
                'category_name' => $request->category_name,
                'category_desc' => $request->category_desc,
                'category_image' => $path
            ]);

            if ($category) {
                return Redirect()->to('/category')->withSuccess('Data berhasil ditambah');
            } else {
                return back()->withInput()->withErrors('Data gagal ditambah');
            }
        } else {
            return back()->withInput()->withErrors(['error' => ['Image tidak bisa di simpan']]);
        }
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
            'category_desc' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->messages());
        }

        $data = [
            'category_name' => $request->category_name,
            'category_desc' => $request->category_desc,
        ];

        if ($request->hasFile('category_image')) {
            if (Storage::get($category->category_image)) {
                Storage::delete($category->category_image);
            }

            $category_image = $request->file('category_image');
            $path = Storage::putFile('public/categories', $category_image);
            $data['category_image'] = $path;
        }

        $category->update($data);

        if ($category) {
            return Redirect()->to('/category')->withSuccess('Data berhasil Diupdate');
        } else {
            return back()->withErrors('Data gagal Diupdate');
        }
    }

    public function destroy(Category $category)
    {
        if (Storage::get($category->category_image)) {
            Storage::delete($category->category_image);
        }

        $category->delete();

        if ($category) {
            return back()->withSuccess('Data berhasil Dihapus');
        } else {
            return back()->withErrors('Data gagal Dihapus');
        }
    }
}
