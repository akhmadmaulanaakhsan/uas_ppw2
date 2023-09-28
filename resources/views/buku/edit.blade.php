@extends('layouts.layout')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/updatebook.css') }}">
    <title>Update Book</title>
</head>
<body>
    <div class="container">
        <h4>Update Buku</h4>
        <form method="post" action="{{ route('buku.update', $buku->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" id="judul" name="judul" value="{{ $buku->judul }}">
            </div>
            <div class="form-group">
                <label for="penulis">Penulis:</label>
                <input type="text" id="penulis" name="penulis" value="{{ $buku->penulis }}">
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="text" id="harga" name="harga" value="{{ $buku->harga }}">
            </div>
            <div class="form-group">
                <label for="tgl_terbit">Tgl. Terbit:</label>
                <input type="text" id="tgl_terbit" name="tgl_terbit" value="{{ $buku->tgl_terbit }}">
            </div>
            <div class="button-group">
                <button type="submit">Update</button>
                <a href="/buku" class="cancel-link">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>





