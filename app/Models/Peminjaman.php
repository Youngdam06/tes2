<?php

namespace App\Models;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $fillable = [
        'bukuid',
        'userid',
        'tanggalpinjam',
        'tanggalkembali',
        'status',
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'bukuid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }
}
