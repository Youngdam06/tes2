<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::orderBy('created_at', 'DESC')->get();
        return view('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('buku.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunterbit' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'judul.required' => 'Field judul wajib diisi!',
            'penulis.required' => 'Field penulis wajib diisi!',
            'penerbit.required' => 'Field penerbit wajib diisi!',
            'tahunterbit.required' => 'Field tahunterbit wajib diisi!',
            'image.required' => 'Field image wajib diisi!',

        ]);

        $buku = new Buku();
        
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahunterbit = $request->tahunterbit;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $buku->image = $imageName;
        }

        $buku->save();

        return redirect()->route('kelolaBuku.index')->with('success', 'Buku berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Temukan buku berdasarkan ID yang diterima
        $buku = Buku::findOrFail($id);

        // Periksa apakah buku sudah dipinjam oleh user tertentu
        $userID = auth()->id();
        $peminjaman = Peminjaman::where('bukuid', $id)
                                ->where('userid', $userID)
                                ->first();

        // Tentukan tipe status berdasarkan apakah buku sudah dipinjam
        $tipeStatus = ($peminjaman) ? 'Dipinjam' : 'Dikembalikan';

        // Tampilkan view dan kirimkan variabel $tipeStatus
        return view('buku.show', compact('buku', 'peminjaman', 'tipeStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::firstWhere('id', $id);
        $kategori = Kategori::all();
        return view('buku.edit', compact('buku', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunterbit' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required|array',
        ]);

        // Temukan buku berdasarkan ID yang diterima
        $buku = Buku::findOrFail($id);

        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            // Menghapus gambar lama
            if (File::exists(public_path('images/' . $buku->image))) {
                File::delete(public_path('images/' . $buku->image));
            }

            // Upload dan menyimpan gambar baru
            $image = $request->file('image');
            $uploadFile = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $uploadFile);
            $buku->image = $uploadFile;
        }

        // Update properti buku
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahunterbit = $request->tahunterbit;

        // Simpan perubahan ke dalam database
        $updated = $buku->save();

        // Ambil kategori yang dipilih dari formulir
        $selectedCategories = $request->kategori;

        // Sync kategori yang dipilih ke buku menggunakan relasi many-to-many
        $buku->kategoris()->sync($selectedCategories);

        if ($updated) {
            return redirect()->route('kelolaBuku.index')->with('success', 'Data berhasil diperbarui');
        } else {
            return redirect()->route('kelolaBuku.index')->with('error', 'Gagal memperbarui data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect()->route('kelolaBuku.index');
    }
}
