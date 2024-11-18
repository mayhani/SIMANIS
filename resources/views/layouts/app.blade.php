<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi SIMANIS')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Ubah sesuai dengan lokasi CSS Anda -->
</head>

<body>
    <header>
        <h1>Selamat Datang di Aplikasi SIMANIS</h1>
        <!-- Tambahkan navigasi jika diperlukan -->
    </header>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Aplikasi SIMANIS</p>
    </footer>
</body>

</html>