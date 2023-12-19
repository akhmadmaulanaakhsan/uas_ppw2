@extends('layouts.master')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cheltenham:wght@400;700&display=swap">
    <title>Latihan Pertemuan</title>
    <style>
        *{
            font-family: 'Cheltenham', sans-serif;
        }

        th {
            background-color: #343a40;
            color: white;
            text-align: center;
            font-size: 16px; 
            padding: 12px; 
            border: 2px solid #dee2e6; 
        }

        td {
            font-size: 14px; 
            border: 2px solid #dee2e6; 
            padding: 10px; 
        }

        .aksi-buku {
            font-size: 16px; 
        }

        .container {
            margin-top: 30px;
        }

        .table {
            border: 1px solid #dee2e6; 
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }

        .table th,
        .table td {
            text-align: left; 
        }

        .table-responsive {
            overflow-x: auto; 
        }

        .btn-custom {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-custom:hover {
            background-color: #218838;
            border-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }
    </style>
</head>
<body>
    @if(Session::has('succes-simpan'))
        <div class="alert alert-success text-center mt-3">{{ Session::get('succes-simpan') }}</div>
    @elseif(Session::has('succes-perbarui'))
        <div class="alert alert-success text-center mt-3">{{ Session::get('succes-perbarui') }}</div>
    @elseif(Session::has('succes-hapus'))
        <div class="alert alert-success text-center mt-3">{{ Session::get('succes-hapus') }}</div>
    @endif

    <div class="d-flex justify-content-between navbar navbar-expand-lg bg-white py-3 px-5 mb-5">
        <div class="col-auto ms-5">
            <p class="fs-3 m-0">Buku Perpustakaan</p>
        </div>
        <div class="col-auto me-5">
            <a href="{{ route('buku.buku-populer') }}" class="btn btn-light border me-2">Buku Populer</a>
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-light border">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-light border me-2">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-light border">Register</a>
                @endif
            @endauth
        </div>
    </div>
    <div class="container mt-4">
        <h1 class="text-center">Data Buku</h1>
        <form action="{{ route('buku.search') }}" method="get">@csrf
            <input type="text" name="kata" class="form-control" placeholder="Cari ..." style="width: 30%;
                display: inline; margin-bottom: 10px; float: right;">
        </form>
        @if(Auth::check() && Auth::user()->level == 'admin')
        <a href="{{ route('buku.create') }}" class="btn btn-success mb-2">Tambah Buku</a>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Gambar Buku</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Tgl. Terbit</th>
                    <th class="aksi-buku">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_buku as $buku)
                    <tr>
                        <td>{{ $buku->id }}</td>
                        @if ( $buku->filepath )
                        <td>
                            <div class="relative h-100 w-50">
                                <img 
                                class="h-full w-full object-cover object-center"
                                src="{{ asset($buku->filepath) }}"
                                alt=""
                                />
                            </div>
                        </td>
                        @endif
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ number_format($buku->harga, 0, ',', '.') }}</td>
                        <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                @if (Auth::check() && Auth::user()->level == 'admin')
                                    <form method="put" action="{{ route('buku.edit', $buku->id) }}" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                    <br>
                                    <br>
                                    <form action="{{ route('buku.destroy', $buku->id) }}" method="post" style="display: inline;">
                                        @csrf
                                        <button onClick="return confirm('Yakin mau dihapus?')" class="btn btn-danger">Hapus</button>
                                    </form>
                                @endif
                                <a href="{{ route('galeri.buku', $buku->id) }}" class="btn btn-warning">Lihat</a>
                            </div>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>Jumlah data buku: {{ $jumlahData }}</p> 
        <p>Jumlah total harga semua buku: Rp {{ number_format($totalHarga, 0, ',', '.') }}</p>
        <div>{{ $data_buku->links() }}</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
