<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    use HasFactory;
    protected $table = 'koleksi';
    protected $fillable = [
        'userid',
        'bukuid',
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
