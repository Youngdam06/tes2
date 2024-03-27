<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Perpustakaan Daring</title>
</head>
<body>
<div class="container">
    <div class="card mx-auto mt-5 col-md-4">
        <div class="card-header">
            <h2>Register Akun</h2>
        </div>
        <div class="card-body">
            <form action="{{ Route('posregtamu') }}" method="POST">
                @csrf
                {{-- input username --}}
                <div class="mb-3">
                    <label for="userame" class="form-label">USERNAME</label>
                    <input type="text" class="form-control mb-2" name="username">
                    @error('username')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                {{-- input email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">EMAIL</label>
                    <input type="email" class="form-control mb-2" name="email">
                    @error('email')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                {{-- input password --}}
                <div class="mb-3">
                    <label for="password" class="form-label">PASSWORD</label>
                    <input type="password" class="form-control mb-2" name="password">
                    @error('password')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                {{-- input nama lengkap --}}
                <div class="mb-3">
                    <label for="namalengkap" class="form-label">NAMA LENGKAP</label>
                    <input type="namalengkap" class="form-control mb-2" name="namalengkap">
                    @error('namalengkap')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                {{-- input alamat --}}
                <div class="mb-3">
                    <label for="alamat" class="form-label">ALAMAT</label>
                    <input type="alamat" class="form-control mb-2" name="alamat">
                    @error('alamat')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-2">Register</button>

            </form>
        </div>
    </div>
</div>
</body>
</html>
