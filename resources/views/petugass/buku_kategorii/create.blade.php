@extends('layouts.allP')

@section('konten')

    <div class="content">
        <main class="main-content  mt-0">
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">ISI DATA</h4>
                                    <div class="row mt-3">
                                        <div class="col-2 text-center ms-auto">
                                        </div>
                                        <div class="col-2 text-center px-1">
                                        </div>
                                        <div class="col-2 text-center me-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="card-body">
                                <h3 class="text-center">Tambah Data</h3>
                                <form role="form" action="{{ route('relasiKategorii.store') }}" enctype="multipart/form-data" class="text-start"
                                    method="POST">
                                    @csrf
                                    <label class="form-label text-dark">PILIH BUKU</label>
                                    <div class="input-group input-group-outline my-3">
                                        <select name="bukuid" id="bukuid" class="form-control select-multiple" required>
                                            @foreach ($buku as $item)
                                                <option value=" {{$item->id}} "> {{ $item->judul }} </option>
                                            @endforeach
                                        </select>
                                        @error('kategori')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <label class="form-label text-dark">KATEGORI</label>
                                    <div class="input-group input-group-outline my-3">
                                        <select name="kategoriid[]" id="kategori" class="form-control select-multiple" multiple required>
                                            @foreach ($kategori as $item)
                                                <option value=" {{$item->id}} "> {{ $item->nama_kategori }} </option>
                                            @endforeach
                                        </select>
                                        @error('kategori')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Tambahkan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-12 col-md-6 my-auto">
                </div>
            </div>
        </div>
    </footer>
    </div>
    </main>
    </div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select-multiple').select2();
    });
</script>
@endsection
