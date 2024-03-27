<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah pengguna masuk dan apakah level pengguna adalah admin
        if (Auth::check() && Auth::user()->level == 'admin') {
            return $next($request);
        }

        // Jika bukan admin, kembalikan pengguna ke halaman sebelumnya
        return back();
    }
}
