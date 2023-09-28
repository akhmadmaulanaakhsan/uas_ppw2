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

    public function create(){
        return view('buku.create');
    }

    public function store(Request $request) {
        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();
        return redirect('/buku');

       // Buku::create([
       //     'judul' => $request->judul,
       //     'penulis' => $request->penulis,
       //     'harga' => $request->harga,
       //     'tgl_terbit' => $request->tgl_terbit,
       //     save()
       // ]);
       // return redirect('/buku');
    }

    public function edit($id) {
        $buku = Buku::find($id);
        return view('buku.edit', compact('buku'));
    }


     //update
     public function update(Request $request, $id){
        $buku =  Buku::find($id);
        $buku->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
            'tgl_terbit' => $request->tgl_terbit,
        ]);
        return redirect('/buku')->with('success', 'Data buku berhasil diperbarui.');
    }
    

    public function destroy($id) {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku');
    }
}
