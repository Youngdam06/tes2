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
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Koleksi Buku kamu</h2>
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
                            </tr>
                            @foreach ($koleksi as $item)
                            <tr>
                                <td class="align-middle text-center text-sm">{{ $loop->iteration }}</td>
                                <td class="align-middle text-center text-sm text-dark" width="10" style="white-space: pre-wrap;"><img src="{{ asset('images/'.$item->buku->image) }}" width="100px" alt="Cover Buku"></td>
                                <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $item->buku->judul }}</td>
                                <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $item->buku->penulis }}</td>
                            </tr>
                            @endforeach
                        </table>
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
