@extends('layouts.master')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/createbook.css') }}">
    <title>Create Book</title>
</head>
<body>
    @section('content')
        <div class="container">
            <h4>Tambah Buku</h4>
            @if(count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="post" action="{{ route('buku.store') }}" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="judul">Judul:</label>
                    <input type="text" id="judul" name="judul">
                </div>
                <div class="form-group">
                    <label for="penulis">Penulis:</label>
                    <input type="text" id="penulis" name="penulis">
                </div>
                <div class="form-group">
                    <label for="harga">Harga:</label>
                    <input type="text" id="harga" name="harga">
                </div>
                <div class="form-group">
                    <label for="tgl_terbit">Tgl. Terbit:</label>
                    <input type="date" id="tgl_terbit" name="tgl_terbit" class="date form-control" placeholder="yyyy/mm/dd">
                </div>
                <div class="form-group">
                    <label for="thumbnail">Thumbnail:</label>
                    <br>
                    <input type="file" name="thumbnail" id="thumbnail" >
                </div>
                
                <div class="button-group">
                    <br>
                    <button type="submit">Tambah</button>
                    <a href="/buku" class="cancel-link">Batal</a>
                </div>
            </from>
        </div>
        
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const form = document.querySelector('form');
                const submitButton = document.querySelector('button[type="submit"]');
        
                form.addEventListener('submit', function (e) {
                    const judulInput = document.querySelector('input[name="judul"]');
                    const penulisInput = document.querySelector('input[name="penulis"]');
                    const hargaInput = document.querySelector('input[name="harga"]');
                    const tglTerbitInput = document.querySelector('input[name="tgl_terbit"]');
            
                    if (!judulInput.value || !penulisInput.value || !hargaInput.value || !tglTerbitInput.value) {
                        e.preventDefault(); // Mencegah pengiriman formulir
                        alert('Harap isi semua kolom sebelum menyimpan data.');
                    }
                });
            });
        </script>

    @endsection
</body>
</html>


            