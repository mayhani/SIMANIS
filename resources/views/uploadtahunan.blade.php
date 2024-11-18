<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Bukti Pembayaran - SIMANIS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Upload Bukti Pembayaran Pajak</h2>

        <div class="card mt-3">
            <div class="card-body">
                <h5>Username: {{ $user->username }}</h5>
                <p>No Plat: {{ $user->no_plat }}</p>
                <p>Tanggal Pajak 5 Tahunan: {{ \Carbon\Carbon::parse($user->tgl_pajak5tahunan)->format('d-m-Y') }}</p>
            </div>
        </div>

        <!-- Form upload bukti pembayaran -->
        <form action="{{ route('uploadBukti', $user->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            <div class="form-group">
                <label for="bukti_pembayaran">Upload Bukti Pembayaran</label>
                <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>

</html>