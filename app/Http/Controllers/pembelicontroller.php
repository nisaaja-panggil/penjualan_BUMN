<?php

namespace App\Http\Controllers;
use App\Models\pembeli;
use Illuminate\Http\Request;
use illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class pembelicontroller extends Controller
{
    //
    public function index()
    {
        return view('pembeli.tabel', [
            "title" => "pembeli",
            "data" => pembeli::all()
        ]);
    }
    public function create():View{
        return view('pembeli.tambah')->with(["title"=>"tambah data pembeli"]);
    }
    public function store(Request $request):RedirectResponse{
        $request->validate([
            "name"=>"required",
            "no_hp"=>"required",
            "alamat"=>"required",
        ]);
       pembeli::create($request->all());
       return redirect()->route('pembeli.index')->with('success data','data customer berhasil ditambahkan');
    }
    public function edit(pembeli $pembeli): View {
    return view('pembeli.edit', compact('pembeli'))->with(["title"=>"ubah data pembeli"]);
}

public function update(Request $request, pembeli $pembeli): RedirectResponse {
    $request->validate([
        "name"=>"required",
        "no_hp"=>"required",
        "alamat"=>"required",
    ]);
    $pembeli->update($request->all());
    return redirect()->route('pembeli.index')->with('updated', 'data umkm berhasil di ubah');
}

    public function destroy($id){
        pembeli::where('id',$id)->Delete();
        return redirect()->route(('pembeli.index'))->with('success', 'produk berhasil dihapus');;
    }
}
