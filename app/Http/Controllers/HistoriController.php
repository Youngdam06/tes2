<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use Illuminate\Http\Request;

class HistoriController extends Controller
{
    public function index()
    {
        // ini kudu ditambahin buat nyongkronin si id user sama bukunyahhhh
        $histori = Koleksi::all();
        return view('histori.index', compact('histori'));
    }
}
