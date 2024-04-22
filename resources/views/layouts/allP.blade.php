<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="/assets/img/favicon.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>
    E Library
</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
<!-- CSS Files -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="/assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />


</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
        <div class="logo-image-small">
            <img src="/assets/img/logo-small.png">
        </div>
        <!-- <p>CT</p> -->
        </a>
        <a href="/petugasdash" class="simple-text logo-normal">
            Halo, {{Auth::user()->username}}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="active">
                <a href="{{Route('kelolaBukuu.index')}}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>Kelola Buku</p>
                </a>
            </li>
            <li class="active">
                <a href="{{Route('kelolaPinjamm.index')}}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>Daftar Pinjam Buku</p>
                </a>
            </li>
            <li class="active">
                <a href="{{Route('kelolaKategorii.index')}}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>Kelola Kategori Buku</p>
                </a>
            </li>
            {{-- <li class="active">
                <a href="{{Route('laporan.index')}}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>Laporan Peminjaman</p>
                </a>
            </li> --}}
        {{-- @if (auth()->user()->level == 'petugas' ||auth()->user()->level == 'admin') --}}
        {{-- @endif --}}
    </div>
    </div>
    <div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
            <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
            </div>
        {{-- <b>{{ Auth::user()->level }}</b> --}}
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <a class="nav-link" href="/home" >Home</a>
            <a class="nav-link" href="/logout" id="logOutButton" >Logout</a>
        </div>
        </div>
    </nav>
    <!-- End Navbar -->

    @yield('konten')

</div>
<!--   Core JS Files   -->
</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const logOutButton = document.querySelector('#logOutButton');

        logOutButton.addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin ingin keluar?',
                text: "Anda akan logout dari akun Anda.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Logout',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // aksi logout
                    window.location.href = '/logout';
                }
                else {
                    // Jika pengguna membatalkan, tidak ada tindakan yang diambil
                    Swal.fire(
                        'Dibatalkan',
                        'Tidak jadi logout',
                        'info'
                    );
                }
            });
        });
    });

    @if (session()->has('success'))
        Swal.fire({
            icon: 'success',
            title: 'Terkonfirmasi',
            text: '{{ session()->get('success') }}'
        });
    @endif
</script>
<script>
    
</script>
</html>
