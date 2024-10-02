<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\penjual;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class barangcontroller extends Controller
{
    //
    public function index(){
        return view('barang.index',["title" => "barang umkm","data"=>barang::paginate(8)]);
       
    }

    public function cari(Request $request){
        $cari=$request->cari;
        $barang=barang::where('name','LIKE','%'.$cari.'%')
                      ->paginate(8);
        return view( 'barang.index',['data'=>$barang])->with(["title"=>"cari produk"]);
    }
    public function create(){
        $penjual = penjual::all(); // Ambil semua data penjual
        return view('barang.create', compact('penjual'))->with(["title"=>"tambah data produk"]);   
    }
    public function store(Request $request){
        $validasi = $request->validate([
            "name" => "required",
            "id_penjual" => "nullable",
            "jenis_barang" => "required",
            "stok" => "required",
            "harga" => "required",
            "foto" => "image|file" // Ubah ukuran maksimum
        ]);
    
        if ($request->file('foto')) {
            // Simpan gambar dan ambil path-nya
            $validasi['foto'] = $request->file('foto')->store('img');
        }
    
        barang::create($validasi);
        return redirect()->route('barang.index');
    }
    
    public function update(barang $barang, Request $request){
        $validasi = $request->validate([
            "name" => "required",
            "id_penjual" => "required",
            "jenis_barang" => "required",
            "stok" => "required",
            "harga" => "required",
            "foto" => "image|file|max:2048" // Ubah ukuran maksimum
        ]);
    
        if ($request->file('foto')) {
            $validasi['foto'] = $request->file('foto')->store('img');
        }
        
        $barang->update($validasi);
        return redirect()->route('barang.index')->with(["title" => "edit data produk"]);
    }
    
    public function destroy($id){
        barang::where('id',$id)->Delete();
        return redirect()->route(('barang.index'))->with('success', 'produk berhasil dihapus');;
    }
    public function show(barang $barang):View{
        return view('barang.tampil',compact('barang'))
                          ->with(["title"=>"data barang"]);
    }
}
