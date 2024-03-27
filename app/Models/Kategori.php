<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable = [
        'nama_kategori',
    ];

    /**
     * The buku that belong to the Kategori
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bukus(): BelongsToMany
    {
        return $this->belongsToMany(Buku::class, 'kategori_relasi', 'kategoriid', 'bukuid');
    }
}
