@extends('layout.template')
@section('judulh1', 'produk umkm')
@section('konten')
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-3">
                <a href="{{ route('barang.create') }}" class="btn btn-md btn-success">Tambah Data produk</a>
            </div>
            <div class="col-lg-9">
                <form action="{{ route('caribarang') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari..." name="cari"
                            value="{{ request('cari') }}">
                        <button class="btn btn-outline-secondary" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- atas --}}
        <div class="row mt-5" >
        @foreach ($data as $barang)
            <div class="col-lg-6" >
                <div class="card mb-3" style="max-width: 500px;" >
                    <div class="row g-0" >
                        <div class="col-md-4 d-flex align-items-center">
                            @if($barang->foto)
                        <img src="{{ asset('storage/' . $barang->foto) }}" class="img-fluid rounded-start ml-3" style="height: 250px; object-fit: foto;">
                        @else
                        <img src="{{ asset('img/logo.png') }}" class="img-fluid rounded-start ml-3" style="height: 250px; object-fit: foto;">      
                        @endif
                    </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                
                                <p class="card-text">nama produk : {{ $barang->name }}</p>
                                <p class="card-text">jenis produk : {{ $barang->jenis_barang }}</p>
                                <p class="card-text">stok : {{ $barang->stok }}</p>
                               
                                <p class="card-text">harga : {{ $barang->harga }}</p>
                                
                                <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('barang.show',$barang->id) }}" class="btn btn-sm btn-success">Show</a>
                                <a href="{{ route('barang.create',$barang->id) }}" class="btn btn-sm btn-success">Beli</a>
                                <form action="{{ route('barang.destroy', $barang->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-sm btn-danger" value="Delete" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <br>
        {{ $data->links() }}
    </div>
@endsection