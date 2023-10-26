<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
class BukuController extends Controller
{
    //fungsi index
    public function index(){
        $data_buku = Buku::all();
        $batas = 10;
        $no = 0;
        //$data_buku = Buku::all()->sortByDesc('id');
        $jumlahData = Buku::count();
        $totalHarga = Buku::sum('harga');
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        $nomor = $batas * ($data_buku->currentPage()-1);
        return view('buku.index', compact('data_buku','no','nomor','jumlahData','totalHarga'));
    }

    public function search(Request $request){
        $data_buku = Buku::all();
        $batas = 10;
        $cari = $request-> kata;
        $no = 0;
        //$data_buku = Buku::all()->sortByDesc('id');
        $jumlahData = Buku::count();
        $totalHarga = Buku::sum('harga');
        $data_buku = Buku::where('judul', 'like',"%".$cari."%")->orwhere('penulis','like',"%".$cari."%")->paginate($batas);
        $nomor = $batas * ($data_buku->currentPage()-1);
        return view('buku.search', compact('data_buku','no','nomor','jumlahData','totalHarga', 'cari'));
    }

    public function create(){
        return view('buku.create');
    }

    public function store(Request $request) {
        $this->validate($request,[
            'judul' => 'required|string',
            'penulis' => 'required|string|max:30',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date'
        ]);
        //$buku = new Buku;
        //$buku->judul = $request->judul;
        //$buku->penulis = $request->penulis;
        //$buku->harga = $request->harga;
        //$buku->tgl_terbit = $request->tgl_terbit;
        //$buku->save();
        //return redirect('/buku');
        return redirect('/buku')->with('succes-simpan', 'Data buku berhasil disimpan.');

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
        return redirect('/buku')->with('succes-perbarui', 'Data buku berhasil diperbarui.');
    }
    

    public function destroy($id) {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('succes-hapus', 'Data buku berhasil dihapus.');
    }
}
