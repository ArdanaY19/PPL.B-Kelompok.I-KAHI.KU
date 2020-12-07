@extends('petani.layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header"><h3>{{ __('Edit Produk') }}</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/petani/produk') }}/{{ $produks->id }}" enctype="multipart/form-data" name="form">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="">Nama Produk</label>
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ $produks->nama_barang }}">
                        </div>
                        <div class="form-group">
                            <label for="">Harga Produk</label>
                            <input type="number" name="harga" id="harga" class="form-control" value="{{ $produks->harga }}">
                        </div>

                        <div class="form-group">
                            <label for="">Stok Produk</label>
                            <input type="number" name="stok" id="stok" class="form-control" value="{{ $produks->stok }}">
                        </div>

                        <div class="form-group">
                            <label for="">Deskripsi Produk</label>
                            <textarea type="text" name="deskripsi" id="deskripsi" class="form-control" cols="83" rows="5" >{{ $produks->deskripsi }}</textarea>
                        </div>

                        <div class="form-group">
                            <input id="gambar" type="file" name="gambar">
                        </div>
                        <div class="form-group">
                            <img src="{{ url('gambar') }}/{{ $produks->gambar }}" width="50%" alt="">
                        </div>

                        <div class="form-group">
                            <a href="/petani/produk" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

@endsection