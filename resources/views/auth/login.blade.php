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
        <h5>email : admin@tes2.email</h5>
        <h5>password : 123</h5>
        <div class="card-header">
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
            <h2>Login</h2>
        </div>
        <div class="card-body">
            <form class="form" action="{{ Route('poslog') }}" method="POST">
                @csrf
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
                <button type="submit" class="btn btn-primary mt-2">Login</button>

            </form>
        </div>
    </div>
</div>
</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    @if (session()->has('register'))
        Swal.fire({
            icon: 'success',
            title: 'Anda Berhasil Register!',
            text: '{{ session()->get('register') }}'
        });
    @endif
</script>
</html>
