<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\KategoriRelasi;
use Illuminate\Database\Eloquent\Builder; 

class KategoriRelasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rel_kategori = KategoriRelasi::all();
        return view('buku_kategori.index', compact('rel_kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        $buku = Buku::all();
        return view('buku_kategori.create', compact('kategori', 'buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bukuid' => 'required',
            'kategoriid' => 'required|array',
        ]);
    
        $buku = Buku::findOrFail($request->bukuid);
    
        // Check if the book already has a category
        if ($buku->kategoris()->exists()) {
            return redirect()->back()->withErrors(['kategoriid' => 'Buku ini sudah memiliki kategori!']);
        }
    
        // Simpan relasi antara buku dan kategori menggunakan sync
        $buku->kategoris()->sync($request->kategoriid);
    
        return redirect()->route('kelolaBuku.index')->with('success', 'Kategori buku sudah ditambah!');
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
