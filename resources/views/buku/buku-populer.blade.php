@extends('layouts.master')

@section('title', 'Buku Populer')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buku Populer') }}
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

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Gambar Buku</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Rating</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($populerBooks as $buku)
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
                        <td>
                            <p class="card-text">Rating: {{ $buku->ratings->avg('rating') }}</p>
                        </td>
                        <td>
                            <form action="{{ route('galeri.buku', $buku->id) }}" style="display: inline;">
                                @csrf
                                <button class="btn btn-warning">Lihat </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    
</x-app-layout>

@endsection

