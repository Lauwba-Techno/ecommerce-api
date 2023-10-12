<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Help;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HelpController extends Controller
{
    public function index()
    {
        $help = Help::all();
        return view('admin.help.index', compact('help'));
    }

    public function create()
    {
        return view('admin.help.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'help_name' => 'required',
            'help_desc' => 'required',
            'help_image' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->messages());
        }

        $help_image = $request->file('help_image');
        if ($path = Storage::putFile('public/helps', $help_image)) {
            $help = Help::create([
                'help_name' => $request->help_name,
                'help_desc' => $request->help_desc,
                'help_image' => $path
            ]);

            if ($help) {
                return Redirect()->to('/help')->withSuccess('Data berhasil ditambah');
            } else {
                return back()->withInput()->withErrors('Data gagal ditambah');
            }
        } else {
            return back()->withInput()->withErrors(['error' => ['Image tidak bisa di simpan']]);
        }
    }

    public function edit(Help $help)
    {
        return view('admin.help.edit', compact('help'));
    }

    public function update(Request $request, Help $help)
    {
        $validator = Validator::make($request->all(), [
            'help_name' => 'required',
            'help_desc' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->messages());
        }

        $data = [
            'help_name' => $request->help_name,
            'help_desc' => $request->help_desc,
        ];

        if ($request->hasFile('help_image')) {
            if (Storage::get($help->help_image)) {
                Storage::delete($help->help_image);
            }

            $help_image = $request->file('help_image');
            $path = Storage::putFile('public/helps', $help_image);
            $data['help_image'] = $path;
        }

        $help->update($data);

        if ($help) {
            return Redirect()->to('/help')->withSuccess('Data berhasil Diupdate');
        } else {
            return back()->withErrors('Data gagal Diupdate');
        }
    }

    public function destroy(Help $help)
    {
        if (Storage::get($help->help_image)) {
            Storage::delete($help->help_image);
        }

        $help->delete();

        if ($help) {
            return back()->withSuccess('Data berhasil Dihapus');
        } else {
            return back()->withErrors('Data gagal Dihapus');
        }
    }
}
