<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
class BukuController extends Controller
{
    //fungsi index
    public function index(){
        $data_buku = Buku::all();
        $no = 0;
        //$data_buku = Buku::all()->sortByDesc('id');
        $jumlahData = Buku::count();
        $totalHarga = Buku::sum('harga');

        return view('buku.index', compact('data_buku','no','jumlahData','totalHarga'));


    }
}
