<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    public function index()
    {
        //tampilkan daftar buku yang dipinjam berdasarkan user tertentu
        $userID = auth()->id();
        
        // Mengambil data peminjaman berdasarkan ID pengguna
        $koleksi = Koleksi::orderBy('created_at', 'DESC')->where('userid', $userID)->with('buku')->get();
        return view('koleksi.index', compact('koleksi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bukuid' => 'required',
            'userid' => 'required',
        ]);

        $koleksi = new Koleksi([
            'bukuid' => $validated['bukuid'],
            'userid' => $validated['userid'],
        ]);

        $koleksi->save();

        return redirect('/home')->with('success-koleksi', 'Buku di koleksi!');
    }
}
