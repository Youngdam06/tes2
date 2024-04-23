@extends('layouts.allP')
@section('konten')
<div class="content">
    <h3>Daftar Relasi Kategori Buku</h3>
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
                        <th class="align-middle text-center text-sm">ID Buku</th>
                        <th class="align-middle text-center text-sm">ID Kategori</th>
                        <th class="align-middle text-center text-sm" width="300px">Action</th>
                    </tr>
                    @foreach ($rel_kategori as $item)
                    <tr>
                        <td class="align-middle text-center text-sm">{{ $loop->iteration }}</td>
                        <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $item->bukuid }}</td>
                        <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $item->kategoriid }}</td>
                        <td>
                            <form action="{{ route('relasiKategorii.destroy',$item->id) }}" method="POST">
                            <div class="align-middle text-center text-sm">
                                <a class="btn btn-info" href="{{ route('relasiKategori.edit',$item->id) }}">Edit</a>

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
                    <a class="btn bg-primary btn-dark" href="{{ route('relasiKategori.create') }}">Tambah data</a>
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
