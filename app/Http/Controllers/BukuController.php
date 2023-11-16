<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\Buku;
use Image;
class BukuController extends Controller
{
    
    //fungsi index
    public function index(){
        //$data_buku = Buku::all();
        $batas = 5;
        $no = 0;
        //$data_buku = Buku::all()->sortByDesc('id');
        $jumlahData = Buku::count();
        $totalHarga = Buku::sum('harga');
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        $nomor = $batas * ($data_buku->currentPage()-1);
        return view('dashboard', compact('data_buku','no','nomor','jumlahData','totalHarga'));
    }

    public function search(Request $request){
        //$data_buku = Buku::all();
        $batas = 5;
        $cari = $request-> kata;
        $no = 0;
        //$data_buku = Buku::all()->sortByDesc('id');
        $jumlahData = Buku::count();
        $totalHarga = Buku::sum('harga');
        $data_buku = Buku::where('judul', 'like',"%".$cari."%")->orwhere('penulis','like',"%".$cari."%")->paginate($batas);
        $nomor = $batas * ($data_buku->currentPage()-1);
        return view('dashboard', compact('data_buku','no','nomor','jumlahData','totalHarga', 'cari'));
    }

    public function create(){
        return view('buku.create');
    }

    public function store(Request $request) {
        $this->validate($request,[
            'judul' => 'required|string',
            'penulis' => 'required|string|max:30',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date',
            'thumbnail' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($request->hasFile('thumbnail')) {
            $fileName = time().'_'.$request->thumbnail->getClientOriginalName();
            $filePath = $request->file('thumbnail')->storeAs('uploads', $fileName, 'public');
    
            Image::make(storage_path() . '/app/public/uploads/' . $fileName)
                ->fit(240, 320)
                ->save();
    
            // Simpan informasi buku ke database
            Buku::create([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'harga' => $request->harga,
                'tgl_terbit' => $request->tgl_terbit,
                'filename' => $fileName,
                'filepath' => '/storage/' . $filePath
            ]);
        } else {
            // Simpan informasi buku tanpa thumbnail jika tidak ada thumbnail yang diunggah
            Buku::create([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'harga' => $request->harga,
                'tgl_terbit' => $request->tgl_terbit,
            ]);
        }

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

        $request->validate([
            'thumbnail' => 'image|mimes:jpeg,jpg,png|max:2048',
            'gallery.*' => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $fileName = time().'_'.$request->thumbnail->getClientOriginalName();
        $filePath = $request->file('thumbnail')->storeAs('uploads', $fileName, 'public');

        Image::make(storage_path().'/app/public/uploads/'.$fileName)
            ->fit(240,320)
            ->save();

        $buku->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
            'tgl_terbit' => $request->tgl_terbit,
            'filename' => $fileName,
            'filepath' => '/storage/' . $filePath
        ]);

        if ($request->file('gallery')) {
            foreach($request->file('gallery') as $key => $file) {
                $fileName = time().'_'.$file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $fileName, 'public');

                $gallery = Gallery::create([
                    'nama_galeri'   => $fileName,
                    'path'          => '/storage/' . $filePath,
                    'foto'          => $fileName,
                    'buku_id'       => $id
                ]);
            }
        }
        

        return redirect('/buku')->withErrors(['gallery' => 'Gagal mengunggah file galeri.'])->with('succes-perbarui', 'Data buku berhasil diperbarui.');

    }
    

    public function destroy($id) {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('succes-hapus', 'Data buku berhasil dihapus.');
    }

    public function _construct() {
        $this->middleware('auth');        
    }
}
