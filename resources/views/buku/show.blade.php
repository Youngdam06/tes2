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
                            <h5 class="card-title text-center">Rating</h5>
                            <div class="row">
                                <div class=" mt-3 col-md-4 col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title text-center">Sangat Buruk</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-center"> {{$ulasan1}} </p>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mt-3 col-md-4 col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title text-center">Buruk</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-center"> {{$ulasan2}} </p>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mt-3 col-md-4 col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title text-center">Biasa</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-center"> {{$ulasan3}} </p>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mt-3 col-md-4 col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title text-center">Bagus</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-center"> {{$ulasan4}} </p>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mt-3 col-md-4 col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title text-center">Sangat Bagus</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-center"> {{$ulasan5}} </p>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-4 col-lg-4">tes</div>
                                <div class="col-md-4 col-lg-4">tes</div>
                                <div class="col-md-4 col-lg-4">tes</div>
                                <div class="col-md-4 col-lg-4">tes</div> --}}
                            </div>
                        </div>
                        {{-- kondisi jika tipe status dikembalikan --}}
                        @if($tipeStatus === 'Dikembalikan')
                        <form action="{{ route('pinjambuku.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="bukuID" value="{{ $buku->id }}">
                            <button type="submit" class="btn btn-primary col-md-12">Pinjam Buku</button>
                        </form>
                        {{-- kondisi jika tipe status dipinjam --}}
                        @elseif($tipeStatus === 'Dipinjam')
                        <a href="/daftar-pinjam" class="btn btn-primary col-md-12">Kembalikan</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
