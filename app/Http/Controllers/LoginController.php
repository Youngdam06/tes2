<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        Session::flash('loginBerhasil', 'Selamat datang!');
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // dd($credentials);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if(Auth::user()->level == 'admin'){
                return redirect('/');
            }
            else if(Auth::user()->level == 'petugas'){
                return redirect('/petugasdash');
            }
            else if(Auth::user()->level == 'tamu'){
                return redirect('/home');
            }
        }else{
            return redirect()->back()->withErrors('Email atau password salah!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('berhasilLogout', 'Anda telah logout!');
    }
}
