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

        if(Auth::attempt($credentials)){
            $user = Auth::user();
            switch($user->level) {
                case 'admin':
                case 'petugas':
                    return redirect('/');
                    break;
                case 'tamu':
                    return redirect('/home');
                    break;
                default:
                    return redirect()->back()->withErrors('Email atau password salah!');
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
