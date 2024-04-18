@extends('layouts.all')

@section('konten')

<style>
    #preview-image {
        max-width: 300px;
        max-height: 300px;
        margin-top: 10px;
    }
</style>
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
                                <h3 class="text-center">Tambah Buku</h3>
                                <form role="form" action="{{ route('kelolaBuku.store') }}" enctype="multipart/form-data" class="text-start"
                                    method="POST">
                                    @csrf
                                    <label class="form-label text-dark">JUDUL</label>
                                    <div class="input-group input-group-outline my-3">
                                        <input type="text" name="judul" class="form-control" required>
                                        @error('judul')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <label class="form-label text-dark"">PENULIS</label>
                                    <div class="input-group input-group-outline my-3">
                                        <input type="text" name="penulis" class="form-control" required>
                                        @error('penulis')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <label class="form-label text-dark">PENERBIT</label>
                                    <div class="input-group input-group-outline my-3">
                                        <input type="text" name="penerbit" class="form-control" required>
                                        @error('penerbit')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <label class="form-label text-dark">TAHUN TERBIT</label>
                                    <div class="input-group input-group-outline my-3">
                                        <input type="number" name="tahunterbit" class="form-control" required >
                                        @error('tahunterbit')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <label class="form-label text-dark">IMAGE</label>
                                    <div class="input-group input-group-outline my-3">
                                        <input type="file" name="image" id="image" required>
                                        @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div id="preview-container">
                                        <img id="preview-image" src="#" alt="Preview" />
                                    </div>
                                    <button type="submit"
                                        class="btn bg-gradient-primary w-100 my-4 mb-2">Tambahkan</button>
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
<script>
    $(document).ready(function() {
        // Ketika input file berubah
        $("#image").change(function() {
            previewImage(this);
        });
    });

    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#preview-image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // membaca data URL gambar
        }
    }
</script>
@endsection
