<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Aset</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <h3 class="text-center mb-4">Kelola Aset Kendaraan</h3>

        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Detail Motor</th>
                    <th>No. Plat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($aset as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->detail_motor }}</td>
                    <td>{{ $item->no_plat }}</td>
                    <td>
                        <a href="{{ route('edit_aset', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('hapus_aset', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="info-card">
            <a href="{{ route('tambah_aset') }}" class="btn btn-primary">Tambah Aset</a>
        </div>
    </div>
</body>

</html>