<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

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
        $peminjaman = Peminjaman::with('user', 'buku')->orderBy('created_at', 'desc')->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Mendapatkan nilai userID dan bukuID dari request
        $userID = $request->input('userID');
        $bukuID = $request->input('bukuID');

        // Di sini Anda dapat melakukan operasi lain yang diperlukan, misalnya:
        // Meneruskan nilai userID dan bukuID ke dalam view
        return view('peminjaman.create', compact('userID', 'bukuID'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'tanggalpinjam' => 'required',
            'tanggalkembali' => 'required',
            'userID' => 'required',
            'bukuID' => 'required', 
        ],[
            'tanggalpinjam.required' => 'field tanggal pinjam harus diisi!',
        ]);
    
        // Membuat peminjaman baru
        $peminjaman = new Peminjaman([
            'tanggalpinjam' => $validated['tanggalpinjam'],
            'tanggalkembali' => $validated['tanggalkembali'],
            'userid' => $validated['userID'],
            'bukuid' => $validated['bukuID'],
            'status' => 'Dipinjam',
        ]);

        // Menyimpan peminjaman ke database
        $peminjaman->save();

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
