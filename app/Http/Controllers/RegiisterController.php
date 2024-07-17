<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegiisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            // 'name' => 'required|max:255',
            'name' => 'required',
            'nik' => 'required',
            'role_id' => 'required',
            'no_telepon' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register.index')->withErrors($validator, 'register');
        }

        User::create([
            // 'name' => $request->name,
            'name' => $request->name,
            'nik' => $request->nik,
            'no_telepon' => $request->no_telepon,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index');
    }
}
