<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KategoriBuku;
use App\Models\Buku;


class KategoriBukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function kategori()
    {
        $kategoris = KategoriBuku::all();
        return view('buku.kategori', compact('kategoris'));
    }

    public function create()
    {
        return view('buku.create-kategori');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string',
        ]);

        KategoriBuku::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('buku.kategori')->with('success', 'Kategori buku berhasil ditambahkan.');
    }
}
