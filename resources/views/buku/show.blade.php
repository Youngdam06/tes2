@extends('layouts.navhome')
@section('konten')
<section class="page-section text-dark">
    <div class="container">
        <div class="row">
            <div class="mx-auto col-md-4">
                <div class="card mt-4">
                    @csrf
                    <div class="card-header">
                        <h3 class="text-center">Cover Buku</h3>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('images/'.$buku->image) }}" class="img-fluid align-items-center" alt="Buku Image">
                    </div>
                </div>
            </div>
            <div class="mx-auto col-md-6">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="text-center">Detail Buku</h3>
                    </div>
                    <div class="card-header">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $buku->judul }}</h5>
                            <p class="card-text">Penulis: {{ $buku->penulis }}</p>
                            <p class="card-text">Penerbit: {{ $buku->penerbit }}</p>
                            <p class="card-text">Tahun Terbit: {{ $buku->tahunterbit }}</p>
                            <p class="card-text">Kategori: 
                                @foreach($buku->kategoris as $kategori)
                                {{ $kategori->nama_kategori }}
                                    @if(!$loop->last)
                                        , {{-- Tambahkan koma jika bukan kategori terakhir --}}
                                    @endif
                                @endforeach
                            </p>
                        </div>
                        @if($peminjaman)
                        <a href="/daftar-pinjam" class="btn btn-primary col-md-12">Kembalikan Buku</a>
                        @else
                            <form action="{{ route('bukupinjam.create') }}" method="GET">
                                <input type="hidden" name="userID" value="{{ auth()->id() }}">
                                <input type="hidden" name="bukuID" value="{{ $buku->id }}">
                                <button type="submit" class="btn btn-primary col-md-12">Pinjam Buku</button>
                            </form>
                        @endif
                        {{-- <div class="mt-3">
                            <form action="{{ route('koleksiStore') }}" method="POST">
                            <input type="hidden" name="userID" value="{{ auth()->id() }}">
                            <input type="hidden" name="bukuID" value="{{ $buku->id }}">
                            <button type="submit" class="btn btn-primary">Tambahkan ke koleksi</button>
                        </form>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
