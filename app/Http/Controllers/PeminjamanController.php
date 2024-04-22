<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\Koleksi;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //tampilkan daftar buku yang dipinjam berdasarkan user tertentu
        $userID = auth()->id();
        
        // Mengambil data peminjaman berdasarkan ID pengguna
        // $peminjaman = Peminjaman::where('userid', $userID)->with('buku')->get();
        $peminjaman = Peminjaman::with('user', 'buku')->orderBy('created_at', 'DESC')->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bukuID = $request->input('bukuID');
        $user = Auth::user();
        $buku = Buku::findOrFail($request->input('bukuID'));

        // if($user->peminjaman()->count())
    
        // Membuat peminjaman baru  
        Peminjaman::create([
            'tanggalpinjam' => Carbon::now(),
            'tanggalkembali' => Carbon::now()->addDay(7),
            'userid' => $user->id,
            'bukuid' => $bukuID,
            'status' => 'Dipinjam',
        ]);

        // Membuat koleksi baru

        Koleksi::create([
            'userid' => $user->id,
            'bukuid' => $bukuID,
        ]);

        return redirect('/home')->with('success-pinjam', 'Buku telah dipinjam');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
