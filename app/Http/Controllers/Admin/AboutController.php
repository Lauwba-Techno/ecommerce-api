<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.index', compact('about'));
    }


    public function update(Request $request, About $about)
    {
        $validator = Validator::make($request->all(), [
            'app_name' => 'required',
            'app_desc' => 'required',
            'contact' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->messages());
        }

        $about->update([
            'app_name' => $request->app_name,
            'app_desc' => $request->app_desc,
            'contact' => $request->contact
        ]);

        if ($about) {
            return back()->withSuccess('Data berhasil diubah');
        } else {
            return back()->withInput()->withErrors('Data gagal diubah');
        }
    }
}
