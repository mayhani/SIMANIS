<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pajak 5 Tahunan - SIMANIS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Daftar Pajak 5 Tahunan Pengguna</h2>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>No Plat</th>
                    <th>Tanggal Pajak 5 Tahunan</th>
                    <th>Status Pajak</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($aset as $item)
                <tr>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->no_plat }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tgl_pajak5tahunan)->format('d-m-Y') }}</td>
                    <td>
                        @php
                        $today = \Carbon\Carbon::now();
                        $dueDate = \Carbon\Carbon::parse($item->tgl_pajak5tahunan);
                        $daysRemaining = $today->diffInDays($dueDate, false);
                        @endphp
                        @if($daysRemaining <= 30 && $daysRemaining>= 0)
                            <span class="badge badge-danger">Akan Habis {{ $daysRemaining }} hari lagi</span>
                            <!-- Tombol untuk melihat bukti pembayaran -->
                            <a href="{{ route('showUploadBukti', $item->id) }}" class="btn btn-warning btn-sm">Lihat Bukti</a>
                            @elseif($daysRemaining > 30)
                            <span class="badge badge-success">Aktif</span>
                            @else
                            <span class="badge badge-secondary">Sudah Habis</span>
                            <!-- Tombol untuk upload bukti pembayaran -->
                            <a href="{{ route('showUploadBukti', $item->id) }}" class="btn btn-danger btn-sm">Upload Bukti</a>

                            @endif
                    </td>
                    <td>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>