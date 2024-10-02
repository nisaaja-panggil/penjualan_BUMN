@extends('layout.template')
@section('judulh1',' - barang')

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

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Tambah Data barang</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('barang.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class=" card-body">
              <div class="form-group">
                <label for="penjual" class="form-label">Penjual</label>
                <select class="form-control" name="id_penjual">
                    <option hidden>--Pilih penjual--</option>
                    @foreach($penjual as $dt)
                        <option value="{{ $dt->id }}">{{ $dt->name }}</option>
                    @endforeach
                </select>
            </div>
              <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="mb-3">
                <label for="jenis_barang" class="form-label">jenis_barang</label>
                <select class="form-control" name="jenis_barang">
                    <option hidden>--Pilih jenis_barang--</option>
                    <option value="makanan_dan_minuman">makanan dan minuman</option>
                    <option value="kerajinan_tangan">kerajinan tangan </option>
                </select>
              <div class="mb-3">
                <label for="stok" class="form-label">stok</label>
                <input type="number" class="form-control" id="stok" name="stok">
              </div>
              <div class="mb-3">
                <label for="harga" class="form-label">harga</label>
                <input type="number" class="form-control" id="harga" name="harga">
              </div>
              <div class="mb-3">
                <label for="foto" class="form-label">foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
              </div>
                        
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
