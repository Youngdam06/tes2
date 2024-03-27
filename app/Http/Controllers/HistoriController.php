<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use Illuminate\Http\Request;

class HistoriController extends Controller
{
    public function index()
    {
        $histori = Koleksi::all();
        return view('histori.index', compact('histori'));
    }
}
