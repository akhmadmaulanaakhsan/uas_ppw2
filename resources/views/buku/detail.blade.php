@extends('layouts.master')

@section('title', 'detail')

@section('content')
    <div class="text-center mt-5">
        <h2 class="mb-4 weight-bold">Detail Buku</h2>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ $buku->filepath }}" class="img-fluid rounded" alt="Cover Buku">
            </div>
            <div class="col-md-10">
                <div class="details">
                    <h2 class="mb-3">{{ $buku->judul }}</h2>
                    <table class="table">
                        <tr>
                            <th>Penulis</th>
                            <td>{{ $buku->penulis }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Terbit</th>
                            <td>{{ $buku->tgl_terbit }}</td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td>{{ $buku->harga }}</td>
                        </tr>
                        <tr>
                            <th>Rating</th>
                            <td>
                                <p>
                                    @if($buku->ratings->count() > 0)
                                        Average Rating: {{ number_format($buku->ratings->avg('rating'), 2) }}
                                    @else
                                        Rating is not available.
                                    @endif
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="text-left mt-3">
            <h4 class="mb-2">Gallery Buku:</h4>
        </div>

        <div class="row">
            @foreach ($buku->galleries()->get() as $gallery)
                <div class="col-md-2 mb-4">
                    <a href="{{ asset($gallery->path) }}" data-lightbox="image-1" data-title="{{ $gallery->keterangan }}">
                        <img src="{{ asset($gallery->path) }}" alt="Gallery" style="width:200px">
                    </a>
                    <!--<h4>{{ $gallery->nama_galeri }}</h4>-->
                </div>
            @endforeach
        </div>


        <!-- Added rating form -->
        <div class="text-left mt-3">
            <h4 class="mb-2">Rating:</h4>
            @auth
                <form action="{{ route('buku.rate', $buku->id) }}" method="post">
                    @csrf
                    <label for="rating">Rate this book:</label>
                    <select name="rating" id="rating" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <button type="submit" class="btn btn" style="background-color: #d2b55b;">Submit Rating</button>
                </form>
            @else
                <p>Login untuk dapat memberi rate pada buku.</p>
            @endauth
        </div>
        <!-- End of rating form -->

        <div class="d-flex justify-content-end mt-2 mb-4">
            <a href="{{ route('buku.index') }}" class="btn btn-warning mr-3">Kembali</a>

            @auth
                <form action="{{ route('buku.addToFavourites', $buku->id) }}" method="post" style="margin-left: 12px;">
                @csrf
                    <button type="submit" class="btn btn-warning">Simpan ke Daftar Favorit</button>
                </form>
                @else
                    <p style="margin-left: 12px;">Login untuk menyimpan ke daftar favorit.</p>
            @endauth
        </div>
    </div>

    <style>
        *{
            font-family: 'Cheltenham', sans-serif;
        }

        .details {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
        }

        .details h2 {
            color: #B8860B;
        }

        .table th {
            width: 150px;
        }
    </style>
@endsection