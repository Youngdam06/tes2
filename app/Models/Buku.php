<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'image',
        'kategori',
        'tahunterbit',
    ];

    // Definisikan relasi dengan model peminjaman
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'bukuid', 'id');
    }

    /**
     * The kategori that belong to the Buku
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function kategoris(): BelongsToMany
    {
        return $this->belongsToMany(Kategori::class, 'kategori_relasi', 'bukuid', 'kategoriid');
        return $this->belongsToMany(Kategori::class)->detach();
    }
}
