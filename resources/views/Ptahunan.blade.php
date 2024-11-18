<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Bukti Pajak Tahunan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
        }

        .container h2 {
            color: #333;
        }

        .container input[type="file"] {
            display: none;
        }

        .custom-file-upload {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .container button {
            margin-top: 10px;
            padding: 10px;
            width: 100%;
            border: none;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    @extends('layouts.app')

    @section('content')
    <h1>Bukti Pajak Tahunan</h1>
    @foreach($uploads as $upload)
    <p>User ID: {{ $upload->user_id }}</p>
    <p>File Path: <a href="{{ asset('storage/' . $upload->file_path) }}" target="_blank">Lihat File</a></p>
    <p>Uploaded At: {{ $upload->created_at }}</p>
    <hr>
    @endforeach
    @endsection

</body>

</html> -->