@extends('layouts.all')
@section('konten')
<div class="content">
    <h3>Daftar Pinjaman Buku</h3>
    <div class="row">
        <div class="col-12">
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
                        <th class="align-middle text-center text-sm">Judul Buku</th>
                        <th class="align-middle text-center text-sm">Penulis</th>
                        <th class="align-middle text-center text-sm">Username</th>
                        <th class="align-middle text-center text-sm">Tanggal Pinjam</th>
                        <th class="align-middle text-center text-sm">Tanggal Kembali</th>
                        <th class="align-middle text-center text-sm">Status Buku</th>
                    </tr>
                    @foreach ($peminjaman as $pinjam)
                    <tr>
                        <td class="align-middle text-center text-sm">{{ $loop->iteration }}</td>
                        <td class="align-middle text-center text-sm text-dark" width="100px" style="white-space: pre-wrap;"><img src="{{ asset('images/'.$pinjam->buku->image) }}" width="200px" alt="Cover Buku"></td>
                        <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $pinjam->buku->judul }}</td>
                        <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $pinjam->buku->penulis }}</td>
                        <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $pinjam->user->username }}</td>
                        <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $pinjam->tanggalpinjam }}</td>
                        <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $pinjam->tanggalkembali }}</td>
                        <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $pinjam->status }}</td>
                        <td>
                            {{-- <form action="{{ route('kelolaPetugas.destroy',$petugas->id) }}" method="POST">
                            <div class="align-middle text-center text-sm">
                                <a class="btn btn-info" href="{{ route('kelolaPetugas.edit',$petugas->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger">Delete</button>
                            </div>
                            </form> --}}
                        </td>
                    </tr>
                    @endforeach
                </table>
                </tbody>
                </table>
                <div class="container">
                    {{-- <a class="btn bg-primary btn-dark" href="{{ route('kelolaPetugas.create') }}">Tambah data</a> --}}
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
</script>
@endsection