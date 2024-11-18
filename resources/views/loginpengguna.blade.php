<!-- login ini untuk pengguna aset kendaraan -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('{{ asset("gambar/biru.jpg") }}');
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;

            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .login-container h3 {
            margin-bottom: 20px;
            text-align: center;
        }

        .login-container .form-control {
            border-radius: 50px;
            padding-left: 20px;
        }

        .login-container .btn {
            border-radius: 50px;
        }

        /* Mobile-specific adjustments */
        @media (max-width: 768px) {
            .login-container {
                padding: 15px;
                box-shadow: none;
                border: 1px solid #ddd;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h3>Login Pengguna</h3>

        <!-- Tampilkan pesan error jika ada -->
        @if ($errors->has('loginError'))
        <div class="alert alert-danger">
            {{ $errors->first('loginError') }}
        </div>
        @endif

        <!-- Form login -->
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username"></label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan Username" required>
            </div>

            <div class="form-group">
                <label for="password"></label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </div>
</body>

</html>