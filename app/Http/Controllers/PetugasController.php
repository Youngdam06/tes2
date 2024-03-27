<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = User::where('level', 'petugas')->get();
        return view('petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view( 'petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'namalengkap' => 'required',
            'alamat' => 'required',
        ],[
            'username.required' => 'Field username harus diisi!',
            'email.required' => 'Field email harus diisi!',
            'password.required' => 'Field password harus diisi!',
            'namalengkap.required' => 'Field namalengkap harus diisi!',
            'alamat.required' => 'Field alamat harus diisi!',
        ]);

        $validated['level'] = 'petugas';
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        if($validated){
            return redirect()->route('kelolaPetugas.index')->with('Data petugas berhasil ditambah!');
        }else{
            return redirect()->back()->withError('Salah masukin data!');
        }
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
        $petugas = User::firstWhere('id', $id);
        return view('petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $petugas = User::find($id);
        $petugas->username = $request->username;
        $petugas->email = $request->email;
        $petugas->namalengkap = $request->namalengkap;
        $petugas->alamat = $request->alamat;
        $petugas->save();

        return redirect()->route('kelolaPetugas.index')
            ->with('success', 'Data Petugas Berhasil Terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prakerin = User::find($id);
        $prakerin->delete();
        return redirect()->route('kelolaPetugas.index');
    }
}
