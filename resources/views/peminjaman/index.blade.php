@extends('layouts.all')
@section('konten')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.4/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.2/css/dataTables.dateTime.min.css">
<div class="content">
    <h3>Daftar Pinjaman Buku</h3>
    <div class="row">
        <div class="col-12">
        <div class="card my-4">
            <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <table border="0" cellspacing="5" cellpadding="5">
                <tbody>
                    <h4>Filter Range Tanggal</h4>
                    <tr>
                        <td>Tanggal Pinjam:</td>
                        <td><input type="text" id="min" name="min"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Kembali:</td>
                        <td><input type="text" id="max" name="max"></td>
                    </tr>
                </tbody>
                </table>
                @if ($message = Session::get('success'))
                    <div class="alert alert-info alert-dismissable text-white">
                        <p>{{ $message }}</p>

                    </div>
                @endif

                <table id="list" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="align-middle text-center text-sm">No</th>
                            <th class="align-middle text-center text-sm">Judul Buku</th>
                            <th class="align-middle text-center text-sm">Penulis</th>
                            <th class="align-middle text-center text-sm">Username</th>
                            <th class="align-middle text-center text-sm">Tanggal Pinjam</th>
                            <th class="align-middle text-center text-sm">Tanggal Kembali</th>
                            <th class="align-middle text-center text-sm">Status Buku</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjaman as $pinjam)
                        <tr>
                            <td class="align-middle text-center text-sm">{{ $loop->iteration }}</td>
                            <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $pinjam->buku->judul }}</td>
                            <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $pinjam->buku->penulis }}</td>
                            <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $pinjam->user->username }}</td>
                            <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $pinjam->tanggalpinjam }}</td>
                            <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $pinjam->tanggalkembali }}</td>
                            <td class="align-middle text-center text-sm" style="white-space: pre-wrap;">{{ $pinjam->status }}</td>
                        </tr>
                        @endforeach
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
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<!-- DataTables script -->
<script src="https://cdn.datatables.net/2.0.4/js/dataTables.js"></script>

<!-- Buttons plugin script -->
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<!-- dll -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.5.2/js/dataTables.dateTime.min.js"></script>


<script>
    let minDate, maxDate;
     // Custom filtering function which will search data in column four between two values
    DataTable.ext.search.push(function (settings, data, dataIndex) {
        let min = minDate.val();
        let max = maxDate.val();
        let tanggalPinjam = new Date(data[4]); // Indeks 4 untuk kolom Tanggal Pinjam
        let tanggalKembali = new Date(data[5]); // Indeks 5 untuk kolom Tanggal Kembali

        if (
            (min === null && max === null) || // Tidak ada batasan tanggal
            (min === null && tanggalPinjam <= max && tanggalKembali <= max) || // Tidak ada batasan tanggal bawah
            (min <= tanggalPinjam && max === null && min <= tanggalKembali) || // Tidak ada batasan tanggal atas
            (min <= tanggalPinjam && tanggalPinjam <= max && min <= tanggalKembali && tanggalKembali <= max) // Rentang tanggal yang valid
        ) {
            return true;
        }
        return false;
    });
    
    // Create date inputs
    minDate = new DateTime('#min', {
        format: 'MMMM Do YYYY'
    });
    maxDate = new DateTime('#max', {
        format: 'MMMM Do YYYY'
    });
    
    // DataTables initialisation
    let table = new DataTable('#list', {
        dom: 'Bfrtip',  
        buttons: [
            'pdf'
        ]
    });
    
    // Refilter the table
    document.querySelectorAll('#min, #max').forEach((el) => {
        el.addEventListener('change', () => table.draw());
    });
</script>

@endsection