<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegistertamuController extends Controller
{
    public function index()
    {
        return view('auth.registertamu');
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

        $validated['level'] = 'tamu';

        $validated['password'] = Hash::make($validated['password']);


        User::create($validated);

        if($validated) {
            return redirect()->route('login')->with('success', 'Berhasil Register!');
        }else{
            return redirect()->route('login')->with('Gagal Register! Periksa kembali data anda!');
        }

    }
}
