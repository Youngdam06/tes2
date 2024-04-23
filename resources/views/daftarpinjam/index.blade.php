@extends('layouts.navhome')
@section('konten')
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">Perpustakaan Daring</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Baca Buku - Dapat Ilmu - Jadi Tau!</p>
    </div>
</header>
<section class="page-section text-dark">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">daftar buku yang kamu pinjam</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <div class="card my-4">
                    <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0 mt-1">
                        <tbody>
        
                        @if ($message = Session::get('success'))
                            <div class="alert alert-info alert-dismissable text-white">
                                <p>{{ $message }}</p>
        
                            </div>
                        @endif
        
                        <table class="table table-bordered">
                            <tr>
                                <th class="align-middle text-center text-sm">No</th>
                                <th class="align-middle text-center text-sm">Cover Buku</th>
                                <th class="align-middle text-center text-sm">Judul</th>
                                <th class="align-middle text-center text-sm">Penulis</th>
                                <th class="align-middle text-center text-sm">Tanggal Pinjam</th>
                                <th class="align-middle text-center text-sm">Tanggal Kembali</th>
                                <th class="align-middle text-center text-sm">Status</th>
                                <th class="align-middle text-center text-sm" width="300px">Action</th>
                            </tr>
                            {{-- ambil variabel dari daftarpinjam controller --}}
                            @foreach ($daftarpinjam as $peminjaman)
                            <tr>
                                <td class="align-middle text-center text-sm">{{ $loop->iteration }}</td>
                                <td class="align-middle text-center text-sm text-dark" width="10" style="white-space: pre-wrap;"><img src="{{ asset('images/'.$peminjaman->buku->image) }}" width="100px" alt="Cover Buku"></td>
                                <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $peminjaman->buku->judul }}</td>
                                <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $peminjaman->buku->penulis }}</td>
                                <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $peminjaman->tanggalpinjam }}</td>
                                <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $peminjaman->tanggalkembali }}</td>
                                <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $peminjaman->status }}</td>
                                <td>
                                    @if($peminjaman->status == 'Dipinjam')
                                    <form action="{{ route('bukuKembali',$peminjaman->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <div class="align-middle text-center mt-5 mx-auto">
                                            <button type="submit" onclick="return confirm('Apakah Anda yakin?')" class=" d-inline btn btn-danger">Kembalikan</button>
                                        </div>
                                    </form>
                                    @elseif($peminjaman->buku->sudahDiberiUlasan)
                                    <div class="align-middle text-center mt-5 mx-auto">
                                        <button class="btn btn-secondary disabled">Anda sudah memberikan ulasan</button>
                                    </div>
                                    @else
                                        {{-- @if($peminjaman->buku->sudahDiberiUlasan)
                                            <div class="align-middle text-center mt-5 mx-auto">
                                                <button class="btn btn-secondary disabled">Anda sudah memberikan ulasan</button>
                                            </div>
                                        @else
                                            <form action="{{ route('ulasan.create', $peminjaman->id) }}" method="GET">
                                                <input type="hidden" name="userID" value="{{ auth()->id() }}">
                                                <input type="hidden" name="bukuID" value="{{ $peminjaman->buku->id }}">
                                                <div class="align-middle text-center mt-5 mx-auto">
                                                    <button type="submit" class="btn btn-primary d-inline">Berikan Ulasan</button>
                                                </div>
                                            </form>
                                        @endif --}}
                                    <form action="{{ route('ulasan.create', $peminjaman->id) }}" method="GET">
                                        <input type="hidden" name="userID" value="{{ auth()->id() }}">
                                        <input type="hidden" name="bukuID" value="{{ $peminjaman->buku->id }}">
                                        <div class="align-middle text-center mt-5 mx-auto">
                                            <button type="submit" class="btn btn-primary d-inline">Berikan Ulasan</button>
                                        </div>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        </tbody>
                        </table>
                        {{-- <div class="container">
                            <a class="btn bg-primary btn-dark" href="{{ route('kelolaPetugas.create') }}">Tambah data</a>
                        </div> --}}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    @if (session()->has('success-ulasan'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session()->get('success-ulasan') }}'
        });
    @endif
    @if (session()->has('success'))
        Swal.fire({
            icon: 'success',
            title: 'Selesai!',
            text: '{{ session()->get('success') }}'
        });
    @endif
</script>
@endsection
