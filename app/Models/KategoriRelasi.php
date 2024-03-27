<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class KategoriRelasi extends Model
{
    use HasFactory;
    protected $table = 'kategori_relasi';
    protected $fillable = [
        'bukuid',
        'kategoriid',
    ];

    // public function kategoris()
    // {
    //     return $this->belongsToMany(Kategori::class);
    // }

    /**
     * The kategori that belong to the Buku
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function kategoris(): BelongsToMany
    {
        return $this->belongsToMany(Kategori::class, 'kategori_relasi', 'bukuid', 'kategoriid');
    }
}
