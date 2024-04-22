<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Petugas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah pengguna masuk dan apakah level pengguna adalah petugas
        if (Auth::check() && Auth::user()->level == 'petugas') {
            return $next($request);
        }

        // Jika bukan petugas, kembalikan pengguna ke halaman sebelumnya
        return back();
    }
}
