<?php

namespace App\Http\Controllers;
use App\Models\penjual;
use Illuminate\Http\Request;
use illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class penjualcontroller extends Controller
{
    //
    public function index()
    {
        return view('penjual.tabel', [
            "title" => "penjual",
            "data" => penjual::all()
        ]);
    }
    public function create():View{
        return view('penjual.tambah')->with(["title"=>"tambah data penjual"]);
    }
    public function store(Request $request):RedirectResponse{
        $request->validate([
            "name"=>"required",
            "no_hp"=>"required",
            "alamat"=>"required",
        ]);
       penjual::create($request->all());
       return redirect()->route('penjual.index')->with('success data','data customer berhasil ditambahkan');
    }
    public function edit(penjual $penjual): View {
    return view('penjual.edit', compact('penjual'))->with(["title"=>"ubah data penjual"]);
}

public function update(Request $request, penjual $penjual): RedirectResponse {
    $request->validate([
        "name"=>"required",
        "no_hp"=>"required",
        "alamat"=>"required",
    ]);
    $penjual->update($request->all());
    return redirect()->route('penjual.index')->with('updated', 'data umkm berhasil di ubah');
}

    public function destroy($id){
        penjual::where('id',$id)->Delete();
        return redirect()->route(('penjual.index'))->with('success', 'produk berhasil dihapus');;
    }
}
