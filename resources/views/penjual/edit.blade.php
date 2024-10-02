@extends('layout.template')
@section('judulh1','Admin - penjual')

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
            <h3 class="card-title">Ubah Data penjual</h3>
        </div>
        <form action="{{route('penjual.update',$penjual->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class=" card-body">
                <div class="form-group">
                    <label for="name">Nama penjual</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ $penjual->name }}">
                </div>
                <div class="form-group">
                    <label for="no_hp">No hp</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $penjual->no_hp}}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="alamat" class="form-control" id="alamat" name="alamat" value="{{ $penjual->alamat }}">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-warning float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
