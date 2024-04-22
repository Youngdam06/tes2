<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\KategoriRelasi;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        $buku = Buku::count();
        $rel_kategori = KategoriRelasi::count();
        $peminjaman = Peminjaman::count();
        return view('dashboard', compact('buku', 'rel_kategori', 'peminjaman'));
    }
    
    public function indexx()
    {
        $buku = Buku::count();
        $rel_kategori = KategoriRelasi::count();
        $peminjaman = Peminjaman::count();
        return view('petugass/dashboard', compact('buku', 'rel_kategori', 'peminjaman'));
    }
}
