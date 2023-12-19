@extends('layouts.master')

@section('title', 'Tambah Kategori Buku')

@section('content')
    <div class="container mt-5">
        <h2>Tambah Kategori Buku</h2>

        <form action="{{ route('kategori.store') }}" method="post">
            @csrf
            <div class="form-group mt-4">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
            </div>

            <!-- Tambahkan input untuk kolom lain jika diperlukan -->

            <button type="submit" class="btn btn-primary mt-3">Tambah Kategori</button>
        </form>
    </div>
@endsection

