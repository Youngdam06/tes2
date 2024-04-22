<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use Carbon\Carbon;
use App\Models\Peminjaman;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DaftarpinjamController extends Controller
{
    public function index()
    {

        //tampilkan daftar buku yang dipinjam berdasarkan user tertentu
        $userID = auth()->id();
        
        // Mengambil data peminjaman berdasarkan ID pengguna
        $daftarpinjam = Peminjaman::where('userid', $userID)->with('buku')->orderBy('created_at', 'desc')->get();

         // Memeriksa apakah pengguna sudah memberikan ulasan untuk setiap buku yang dipinjam
        foreach ($daftarpinjam as $peminjaman) {
            $peminjaman->buku->sudahDiberiUlasan = Ulasan::where('userid', $userID)
                                                            ->where('bukuid', $peminjaman->buku->id)
                                                            ->exists();
        }

        return view('daftarpinjam.index', compact('daftarpinjam'));
    }

    public function kembali(Request $request, $id)
    {
        $peminjaman = Peminjaman::find($id);

        // Periksa apakah buku sedang dipinjam
        if ($peminjaman->status == 'Dipinjam') {
            $peminjaman->status = 'Dikembalikan';
            $peminjaman->tanggalkembali = now(); // Mengatur tanggal pengembalian saat ini
            $peminjaman->save();
            
            Session::flash('success-kembali', 'Buku berhasil dikembalikan.');
        } else {
            Session::flash('error', 'Buku ini tidak sedang dipinjam.');
        }

        return redirect()->route('daftarpinjam')->with('Buku yang kamu pinjam telah dikembalikan!');
    }
}
