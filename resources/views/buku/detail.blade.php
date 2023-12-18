@extends('layouts.master')

@section('title', 'detail')

@section('content')
    <div class="text-center mt-5">
        <h2 class="mb-4">Detail Buku</h2>
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
                    </table>
                </div>
            </div>
        </div>

        <div class="text-left mt-3">
            <h4 class="mb-4">Gallery Buku:</h4>
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

        <div class="text-center mt-2">
            <a href="{{ route('buku.index') }}" class="btn btn-warning">Kembali</a>
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