@extends('layouts.allP')

@section('konten')
<div class="content">
    <h3>Daftar Kategori Buku</h3>
    <div class="row">
        <div class="col-12">
        <div class="card my-4">
            <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0 mt-1">
                <tbody>
                
                @if ($message = Session::get('success'))
                    <div class="alert alert-info alert-dismissable text-white">
                        <p>{{ $message }}</p><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        
                    </div>
                @endif
                
                <table class="table table-bordered">
                    <tr>
                        <th class="align-middle text-center text-sm">No</th>
                        <th class="align-middle text-center text-sm">Nama Kategori</th>
                        <th class="align-middle text-center text-sm" width="300px">Action</th>
                    </tr>
                    @foreach ($kategori as $kategori)
                    <tr>
                        <td class="align-middle text-center text-sm">{{ $loop->iteration }}</td>
                        <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $kategori->nama_kategori }}</td>
                        <td>
                            <form action="{{ route('kelolaKategorii.destroy',$kategori->id) }}" method="POST">
                            <div class="align-middle text-center text-sm">
                                <a class="btn btn-info" href="{{ route('kelolaKategorii.edit',$kategori->id) }}">Edit</a>
                            
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
                    <a class="btn bg-primary btn-dark" href="{{ route('kelolaKategorii.create') }}">Tambah data</a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    
</div>
@endsection