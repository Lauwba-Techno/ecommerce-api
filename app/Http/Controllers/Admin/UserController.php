<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $user = User::first();
        return view('admin.user.index', compact('user'));
    }

    public function update(Request $request, User $user)
    {

        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'username' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->messages());
        }

        $data = [
            'fullname' => $request->fullname,
            'username' => $request->username,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        if ($user) {
            return back()->withSuccess('Data berhasil diubah');
        } else {
            return back()->withInput()->withErrors('Data gagal diubah');
        }
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->to('/');
        }

        return view('admin.login');
    }

    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors('Email atau Password anda salah!!.')->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
