@extends('layouts.master')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/updatebook.css') }}">
    <link href="{{ asset('dist/css/lightbox.min.css') }}" rel="stylesheet">
    <title>Detail Buku</title>
</head>
<body>
    <div class="container">
        <h4>Detail Buku</h4>
        <div class="book-details">
            <div class="form-group">
                <label for="judul">Judul:</label>
                <p>{{ $buku->judul }}</p>
            </div>
            <div class="form-group">
                <label for="penulis">Penulis:</label>
                <p>{{ $buku->penulis }}</p>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <p>{{ $buku->harga }}</p>
            </div>
            <div>
                <label for="tgl_terbit">Tgl. Terbit:</label>
                <p>{{ $buku->tgl_terbit }}</p>
            </div>

            <div class="container">
                <h2>Buku: {{ $bukus-> judul }}</h2>
                <hr>
                <div class="row">
                    @foreach ($galeris as $data)
                    <div class="col-md-4">
                    <a href="{{ asset('images/'.$data->foto) }}"
                    data-lightbox="image-1" data-title="{{ $data->keterangan }}">
                        <img src="{{ asset('images/'.$data->foto) }}" style="width:200px; height:150px"></a>
                        <p><h5>{{ $data->nama_galeri}}</h5></p>
                    </div>
                    @endforeach
                </div>
            <div>{{ $galeris->links() }}</div>
        </div>
    </div>
     <!-- file JavaScript Lightbox -->
     <script src="{{ asset('dist/js/lightbox-plus-jquery.min.js') }}"></script>
</body>
</html>
