<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'namalengkap' => 'required',
            'alamat' => 'required',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        if($validated) {
            return redirect()->route('login')->with('register', 'Berhasil Register!');
        }else{
            return redirect()->back()->with('Gagal Register! Periksa kembali data anda!');
        }

    }
}
