@extends('layout.template')
@section('judulh1','Admin - barang')

@section('konten')
<div class="col-md-6">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Ubah Data barang</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('barang.update', $barang->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class=" card-body">
            <div class="form-group">
              <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$barang->name}}">
              </div>
              <div class="mb-3">
                <label for="stok" class="form-label">stok</label>
                <input type="number" class="form-control" id="stok" name="stok" value="{{$barang->stok}}">
              </div>
              <div class="mb-3">
                <label for="harga" class="form-label">harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{$barang->harga}}">
              </div>
              <div class="mb-3">
                <label for="foto" class="form-label">foto</label>
                <input type="file" class="form-control" id="foto" name="foto" value="{{$barang->foto}}">
              </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-warning float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
