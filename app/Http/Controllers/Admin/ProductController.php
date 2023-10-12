<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('admin.product.index', compact('product'));
    }

    public function create()
    {
        $subcategory = Subcategory::all();
        return view('admin.product.create', compact('subcategory'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subcategory_id' => 'required',
            'product_name' => 'required',
            'product_stock' => 'required',
            'product_price' => 'required',
            'product_desc' => 'required',
            'product_image' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->messages());
        }

        $product_image = $request->file('product_image');
        if ($path = Storage::putFile('public/products', $product_image)) {
            $product = Product::create([
                'subcategory_id' => $request->subcategory_id,
                'product_name' => $request->product_name,
                'product_stock' => $request->product_stock,
                'product_price' => $request->product_price,
                'product_desc' => $request->product_desc,
                'product_image' => $path
            ]);

            if ($product) {
                return Redirect()->to('/product')->withSuccess('Data berhasil ditambah');
            } else {
                return back()->withInput()->withErrors('Data gagal ditambah');
            }
        } else {
            return back()->withInput()->withErrors(['error' => ['Image tidak bisa di simpan']]);
        }
    }

    public function edit(Product $product)
    {
        $subcategory = Subcategory::all();
        return view('admin.product.edit', compact('product', 'subcategory'));
    }

    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'subcategory_id' => 'required',
            'product_name' => 'required',
            'product_stock' => 'required',
            'product_price' => 'required',
            'product_desc' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->messages());
        }

        $data = [
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_stock' => $request->product_stock,
            'product_price' => $request->product_price,
            'product_desc' => $request->product_desc,
        ];


        if ($request->hasFile('product_image')) {
            if (Storage::get($product->product_image)) {
                Storage::delete($product->product_image);
            }

            $product_image = $request->file('product_image');
            $path = Storage::putFile('public/products', $product_image);
            $data['product_image'] = $path;
        }

        $product->update($data);

        if ($product) {
            return Redirect()->to('/product')->withSuccess('Data berhasil Diupdate');
        } else {
            return back()->withErrors('Data gagal Diupdate');
        }
    }

    public function destroy(Product $product)
    {
        if (Storage::get($product->product_image)) {
            Storage::delete($product->product_image);
        }

        $product->delete();

        if ($product) {
            return back()->withSuccess('Data berhasil Dihapus');
        } else {
            return back()->withErrors('Data gagal Dihapus');
        }
    }
}
