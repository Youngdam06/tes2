@extends('layouts.all')

@section('konten')

<div class="content">
    <div class="row">
    <h3>Dashboard Admin/Petugas</h3>
    </div>
    {{-- <div class="row">
    <div class="col-md-12">
        <div class="card ">
        <div class="card-header ">
            <h5 class="card-title">E Library</h5>
        </div>
        <div class="card-body ">
            <canvas id=chartHours width="400" height="100"></canvas>
        </div>
        <div class="card-footer ">
            <hr>
            <div class="stats">
            <i class="fa fa-history"></i> Biaya SPP selama tahun 2022
            </div>
        </div>
        </div>
    </div>
    </div> --}}
    <div class="row">
    <div class="col-md-4 col-lg-4">
        <div class="card ">
        <div class="card-header ">
            <h5 class="card-title text-center">Daftar Buku</h5>
            <hr>
        </div>
        <div class="card-body mt">
            {{-- fungsi count nanti di sini --}}
            <h4 class="text-center">{{ $buku }}</h4>
        </div>
        <div class="card-footer ">

        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card ">
            <div class="card-header ">
                <h5 class="card-title text-center">Buku Dipinjam/Kembali</h5>
                <hr>
            </div>
            <div class="card-body ">
                <h4 class="text-center">{{ $peminjaman }}</h4>
            </div>
            <div class="card-footer ">
    
            </div>
            </div>
    </div>
    {{-- <div class="col-md-8">
        <div class="card card-chart">
        <div class="card-header">
            <h5 class="card-title">NASDAQ: AAPL</h5>
            <p class="card-category">Line Chart with Points</p>
        </div>
        <div class="card-body">
            <canvas id="speedChart" width="400" height="100"></canvas>
        </div>
        <div class="card-footer">
            <div class="chart-legend">
            <i class="fa fa-circle text-info"></i> Tesla Model S
            <i class="fa fa-circle text-warning"></i> BMW 5 Series
            </div>
            <hr />
            <div class="card-stats">
            <i class="fa fa-check"></i> Data information certified
            </div>
        </div>
        </div>
    </div> --}}
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    @if (session()->has('loginBerhasil'))
        Swal.fire({
            icon: 'success',
            title: 'Terkonfirmasi',
            text: '{{ session()->get('loginBerhasil') }}'
        });
    @endif
</script>
@endsection
