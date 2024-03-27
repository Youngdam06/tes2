<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Mendapatkan nilai userID dan bukuID dari request
        $userID = $request->input('userID');
        $bukuID = $request->input('bukuID');

        return view('ulasan.create', compact('userID', 'bukuID'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validasi input
        $validated = $request->validate([
            'rating' => 'required',
            'ulasan' => 'required',
            'userID' => 'required', 
            'bukuID' => 'required', 
        ]);

        // Membuat peminjaman baru
        $peminjaman = new Ulasan([
            'rating' => $validated['rating'],
            'ulasan' => $validated['ulasan'],
            'userid' => $validated['userID'],
            'bukuid' => $validated['bukuID'],
        ]);

        // Menyimpan peminjaman ke database
        $peminjaman->save();

        // Redirect ke halaman yang home
        return redirect('/daftar-pinjam')->with('success-ulasan', 'Berhasil memberikan ulasan!');
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
