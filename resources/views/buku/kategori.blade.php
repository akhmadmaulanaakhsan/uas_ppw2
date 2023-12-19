@extends('layouts.master')

@section('title', 'Daftar Kategori Buku')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kategori Buku') }}
        </h2>
    </x-slot>
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
            margin-top: 50px;
        }

        .table {
            border: 0px solid #dee2e6; 
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            max-width: 1230px;
            margin: 0 auto;
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
        
        .h1 {
            color: white;
        }
    </style>


    <div class="container mt-10">
        <a href="{{ route('buku.create-kategori') }}" class="btn btn-success mb-3" style="margin-left: 140px;">Tambah Kategori</a>
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Aksi</th>
                    <!-- Tambahkan kolom lain jika diperlukan -->
                </tr>
            </thead>
            <tbody>
                @foreach($kategoris as $kategori)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $kategori->nama_kategori }}</td>
                        <!-- Tambahkan kolom lain jika diperlukan -->
                        <td><button class="btn-warning">Lihat Buku</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    
</x-app-layout>

@endsection






