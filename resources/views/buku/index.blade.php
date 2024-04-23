@extends('layouts.all')
@section('konten')
<div class="content">
    <h3>Daftar Buku</h3>
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
                        <th class="align-middle text-center text-sm">Cover</th>
                        <th class="align-middle text-center text-sm">Judul</th>
                        <th class="align-middle text-center text-sm">Penulis</th>
                        <th class="align-middle text-center text-sm">Penerbit</th>
                        <th class="align-middle text-center text-sm">Kategori</th>
                        <th class="align-middle text-center text-sm">Tahun Terbit</th>
                        <th class="align-middle text-center text-sm" width="200px">Action</th>
                    </tr>
                    @foreach ($buku as $buku)
                    <tr>
                        <td class="align-middle text-center text-sm">{{ $loop->iteration }}</td>
                        <td class="align-middle text-center text-sm text-dark" width="170px" style="white-space: pre-wrap;"><img src="{{ asset('images/'.$buku->image) }}" alt="Cover Buku"></td>
                        <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $buku->judul }}</td>
                        <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $buku->penulis }}</td>
                        <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $buku->penerbit }}</td>
                        <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">
                            {{-- menampilkan kategori dari setiap buku yang ada --}}
                            @foreach ($buku->kategoris as $kategori)
                                {{ $kategori->nama_kategori }},
                            @endforeach
                        </td>
                        <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $buku->tahunterbit }}</td>
                        <td>
                            <form action="{{ route('kelolaBuku.destroy',$buku->id) }}" method="POST">
                            <div class="align-middle text-center text-sm">
                                <a class="btn btn-info" href="{{ route('kelolaBuku.edit',$buku->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger">Delete</button>
                            </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                </tbody>
                </table>
                <div class="container">
                    <a class="btn bg-primary btn-dark" href="{{ route('kelolaBuku.create') }}">Tambah Buku</a>
                    <a class="btn bg-primary btn-dark" href="{{ route('relasiKategori.create') }}">Tambahkan Kategori</a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    @if (session()->has('success'))
        Swal.fire({
            icon: 'success',
            title: 'Selesai!',
            text: '{{ session()->get('success') }}'
        });
    @endif
</script>
@endsection