<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string',
            'username' => 'required|unique:users',
            'password' => 'required|string|min:6|max:60',
        ]);

        if ($validator->fails()) {
            return new PostResource(false, "Registrasi gagal", []);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        
        if($user){
            return new PostResource(true, "Registrasi berhasil", $user);
        }else{
            return new PostResource(true, "Registrasi gagal", []);
        }
    }

    public function authentication(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|string|min:6|max:60',
        ]);

        if ($validator->fails()) {
            return new PostResource(false, "Login gagal", []);
        }

        if ($user = User::where('email', $request->email)->first()) {
            if (!Hash::check($request->password, $user->password)) {
                return new PostResource(false, "Invalid Password.", $user);
            }
            return new PostResource(true, "Login berhasil", $user);
        } else {
            return new PostResource(false, "Email Address not found", $user);
        }
    }
}
