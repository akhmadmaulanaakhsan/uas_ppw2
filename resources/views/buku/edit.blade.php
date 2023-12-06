@extends('layouts.master')

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
        <form method="post" action="{{ route('buku.update', $buku->id) }}" enctype="multipart/form-data">
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
            <div>
                <label for="tgl_terbit">Tgl. Terbit:</label>
                <input type="date" id="tgl_terbit" name="tgl_terbit" class="date form-control" value="{{ $buku->tgl_terbit }}">
            </div>
            <div class="form-group">
                <label for="thumbnail">Thumbnail:</label>
                <br>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            
            @if ($buku->filename)
                <p>Thumbnail Saat Ini:</p>
                <img src="{{ asset('/storage/uploads/' . $buku->filename) }}" alt="Current Thumbnail" width="150">
                <input type="hidden" name="current_thumbnail" value="{{ $buku->filename }}">
            @endif

            <div class="form-group">
                <label for="gallery">Gallery:</label>
                <br>
                <input type="file" name="gallery[]" id="gallery" >
            </div>
            <div class="form-group">
                <div class="mt-2" id="fileinput_wrapper">
                </div>
                <a href="javascript:void(0);" id="tambah" onclick="addFileInput()">Tambah Gallery</a>
                <script type="text/javascript">
                    function addFileInput () {
                        var div = document.getElementById('fileinput_wrapper');
                        div.innerHTML += '<input type="file" name="gallery[]" id="gallery" class="block w-full mb-5" style="margin-bottom:5px;">';
                    };
                </script>
            </div>
            <div class="gallery_items" style="display: flex;">
                @foreach($buku->galleries()->get() as $gallery)
                    <div class="gallery_item" style="margin-right: 10px;">
                        <img
                        class="rounded-full object-cover object-center"
                        src="{{ asset($gallery->path) }}"
                        alt=""
                        width="300">
                        <div class="mt-2">
                            <a href="{{ route('buku.deletegallery', $gallery->id) }}" class="btn btn-danger rounded-0">Hapus</a>
                        </div>
                    </div>
                @endforeach
            </div>

    
            <div class="button-group">
            <br>
                <button type="submit">Update</button>
                <a href="/buku" class="cancel-link">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>





