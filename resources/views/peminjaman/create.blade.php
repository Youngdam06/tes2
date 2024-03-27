@extends('layouts.navhome')
@section('konten')
<section class="page-section text-dark">
    <div class="container">
        <div class="row">
            <div class="mx-auto col-md-4 mt-5">
                <div class="card">
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
                    <form role="form" action="{{route('pinjambuku.store')}}" method="POST">
                        @csrf
                        <!-- Menyertakan input field tersembunyi untuk menyimpan nilai userID -->
                        <input type="hidden" name="userID" value="{{ $userID }}">
                        <!-- Menyertakan input field tersembunyi untuk menyimpan nilai bukuID -->
                        <input type="hidden" name="bukuID" value="{{ $bukuID }}">
                        <div class="card-header">
                            <h3 class="text-center">Pinjam Buku</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="tanggalpinjam" class="form-label">Tanggal Pinjam</label>
                                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggalpinjam" min="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggalkembali" class="form-label">Tanggal Kembali</label>
                                <input type="date" class="form-control" id="tanggal_kembali" name="tanggalkembali" readonly>
                            </div>
                        </div>
                        <button class="btn btn-primary col-md-12" type="submit">Pinjam Buku</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('tanggal_pinjam').addEventListener('input', function() {
        const tanggalKembali = new Date(this.value);
        tanggalKembali.setDate(tanggalKembali.getDate() + 7);
        const tanggalKembaliValue = tanggalKembali.toISOString().slice(0, 10);
        document.getElementById('tanggal_kembali').value = tanggalKembaliValue;
    });
    </script>
</section>
@endsection