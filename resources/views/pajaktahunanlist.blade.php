<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pajak Tahunan - SIMANIS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Daftar Pajak Tahunan Pengguna</h2>

        <div class="mb-3">
            <span class="badge badge-danger">Merah</span> = Pajak sudah habis atau kurang dari 0 hari<br>
            <span class="badge badge-warning">Oranye</span> = Pajak habis dalam 30 hari<br>
            <span class="badge badge-success">Hijau</span> = Pajak aktif (lebih dari 30 hari)
        </div>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Tanggal Pajak Tahunan</th>
                    <th>Status Pajak</th>
                    <th>Bukti</th>
                    <th>Ubah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($aset as $item)
                <tr>
                    <td>{{ $item->username }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tgl_pajaktahunan)->format('d-m-Y') }}</td>
                    <td>
                        @php
                        $today = \Carbon\Carbon::now();
                        $dueDate = \Carbon\Carbon::parse($item->tgl_pajaktahunan);
                        $daysRemaining = $today->diffInDays($dueDate, false);
                        @endphp
                        @if($daysRemaining > 30)
                        <span class="badge badge-success">Aktif ({{ $daysRemaining }} hari lagi)</span>
                        @elseif($daysRemaining <= 30 && $daysRemaining>= 0)
                            <span class="badge badge-warning">Akan Habis ({{ $daysRemaining }} hari lagi)</span>
                            @else
                            <span class="badge badge-danger">Sudah Habis</span>
                            @endif
                    </td>
                    <td>
                        @if($item->uploadbukti)
                        @php
                        $buktiTahunan = $item->uploadbukti->firstWhere('jenis_pajak', 'tahunan');
                        $bukti5Tahunan = $item->uploadbukti->firstWhere('jenis_pajak', '5tahunan');
                        @endphp

                        <!-- Pajak Tahunan -->
                        @if($buktiTahunan && $buktiTahunan->file_path)
                        <div>
                            <strong>Pajak Tahunan:</strong>
                            <a href="{{ asset('storage/' . $buktiTahunan->file_path) }}" target="_blank">
                                <img src="{{ asset('storage/' . $buktiTahunan->file_path) }}" alt="Bukti Tahunan" style="width: 100px; height: auto;">
                            </a>
                        </div>
                        @else
                        <span class="text-muted">Bukti Tahunan Tidak Ada</span>
                        @endif

                        <!-- Pajak 5 Tahunan -->
                        @if($bukti5Tahunan && $bukti5Tahunan->file_path)
                        <div>
                            <strong>Pajak 5 Tahunan:</strong>
                            <a href="{{ asset('storage/' . $bukti5Tahunan->file_path) }}" target="_blank">
                                <img src="{{ asset('storage/' . $bukti5Tahunan->file_path) }}" alt="Bukti 5 Tahunan" style="width: 100px; height: auto;">
                            </a>
                        </div>
                        @else
                        <span class="text-muted">Bukti 5 Tahunan Tidak Ada</span>
                        @endif
                        @else
                        <span class="text-muted">Tidak ada bukti</span>
                        @endif
                    </td>


                    <td>
                        @if($daysRemaining >= 0)
                        <a href="{{ route('showUploadBukti', $item->id) }}"
                            class="btn {{ $daysRemaining <= 30 ? 'btn-warning' : 'btn-success' }} btn-sm">
                            {{ $daysRemaining <= 30 ? 'Lihat Bukti' : 'Pajak Aktif' }}
                        </a>
                        @else
                        <a href="{{ route('showUploadBukti', $item->id) }}" class="btn btn-danger btn-sm">Upload Bukti</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</body>


</html>