<!-- resources/views/dashboard_pengguna.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-size: 16px;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            width: 100%;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .info-card {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .status-btn-group {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .status-btn {
            padding: 8px 12px;
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: bold;
            width: 100%;
            margin-top: 10px;
        }

        .status-btn-danger {
            background-color: #dc3545;
        }

        .status-btn-success {
            background-color: #28a745;
        }

        .upload-form {
            margin-top: 10px;
        }

        .upload-form form {
            display: flex;
            flex-direction: column;
            gap: 5px;
            padding: 10px;
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3 class="text-center mb-4">Dashboard Pengguna</h3>

        <!-- Menampilkan Username -->
        <div class="info-card">
            <h5>Username:</h5>
            <p>{{ Auth::user()->username }}</p>
        </div>

        <!-- Menampilkan Pesan Error Jika Ada -->
        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Menampilkan Detail Motor dari Database -->
        @if($aset)
        <div class="info-card">
            <h5>Detail Motor:</h5>
            <p>Motor: {{ $aset->detail_motor }}</p>
            <p>No. Plat: {{ $aset->no_plat }}</p>
            <p>Tanggal Pajak Tahunan: {{ $aset->tgl_pajaktahunan }}</p>
            <p>Tanggal Pajak 5 Tahunan: {{ $aset->tgl_pajak5tahunan }}</p>
            <!-- Status Pajak Tahunan -->
            <div>
                @if($statusPajakTahunan['expired'] || $statusPajakTahunan['near_expiration'])
                <button class="status-btn btn btn-danger">
                    Pajak Tahunan {{ $statusPajakTahunan['expired'] ? 'Expired' : 'Habis dalam < 3 Bulan' }}
                </button>
                <div class="upload-form">
                    <form action="{{ route('pajaktahunanlist', ['user_id' => $aset->username]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="bukti_pajak_tahunan" required>
                        <button type="submit" class="btn btn-primary btn-sm">Upload Bukti Pajak Tahunan</button>
                    </form>
                </div>
                @else
                <button class="status-btn btn btn-success">Pajak Tahunan Masih Aman</button>
                @endif
            </div>
            <!-- Status Pajak 5 Tahunan -->
            <div>
                @if($statusPajak5Tahunan['expired'] || $statusPajak5Tahunan['near_expiration'])
                <button class="status-btn btn btn-danger">
                    Pajak 5 Tahunan {{ $statusPajak5Tahunan['expired'] ? 'Expired' : 'Habis dalam < 3 Bulan' }}
                </button>
                <div class="upload-form">
                    <form action="{{ route('pajak5tahunanlist', ['user_id' => $aset->username]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="bukti_pajak_5tahunan" required>
                        <button type="submit" class="btn btn-primary btn-sm">Upload Bukti Pajak 5 Tahunan</button>
                    </form>
                </div>
                @else
                <button class="status-btn btn btn-success">Pajak 5 Tahunan Masih Aman</button>
                @endif
            </div>
        </div>
    </div>
    </div>
    @else
    <div class="info-card">
        <p>Data motor tidak tersedia.</p>
    </div>
    @endif
    </div>
</body>

</html>