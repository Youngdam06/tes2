<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>E-Library</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
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
                    <form role="form" action="{{route('ulasan.store')}}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h3 class="text-center">Ulasan Buku</h3>
                        </div>
                        <!-- Menyertakan input field tersembunyi untuk menyimpan nilai userID -->
                        <input type="hidden" name="userID" value="{{ $userID }}">
                        <!-- Menyertakan input field tersembunyi untuk menyimpan nilai bukuID -->
                        <input type="hidden" name="bukuID" value="{{ $bukuID }}">
                        <div class="mb-3">
                            <label class="form-label">RATING</label>
                            <div class="input-group input-group-outline my-3">
                                <select name="rating" class="form-select" aria-label="Default select example">
                                    <option value="1">Sangat Buruk</option>
                                    <option value="2">Buruk</option>
                                    <option value="3">Biasa</option>
                                    <option value="4">Bagus</option>
                                    <option value="5">Sangat Bagus</option>
                                </select>
                                @error('rating')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="ulasan" class="form-label">ULASAN</label>
                                <textarea type="text" class="form-control" rows="4" name="ulasan" required></textarea>
                                @error('rating')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary col-md-12" type="submit">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    {{-- <script src="js/scripts.js"></script> --}}
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    {{-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> --}}
</body>
</html>
