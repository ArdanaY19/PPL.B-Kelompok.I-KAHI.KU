@extends('petani.layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header"><h3>{{ __('Edit Produk') }}</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/petani/produk') }}/{{ $produks->id }}" enctype="multipart/form-data" name="form" onsubmit="return validateForm()">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="">Nama Produk</label>
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" value="{{ $produks->nama_barang }}" autocomplete="nama_barang" autofocus>
                            @error('nama_barang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Harga Produk</label>
                            <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ $produks->harga }}" autocomplete="harga" autofocus>
                            @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Stok Produk</label>
                            <input type="number" name="stok" id="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ $produks->stok }}" autocomplete="stok" autofocus>
                            @error('stok')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Deskripsi Produk</label>
                            <textarea type="text" name="deskripsi" id="deskripsi"  cols="83" rows="5" class="form-control @error('deskripsi') is-invalid @enderror"autocomplete="deskripsi" autofocus>{{ $produks->deskripsi }}</textarea>
                            @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Foto Produk</label>
                            <input id="gambar" type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" value="{{ url('gambar') }}/{{ $produks->gambar }}" autocomplete="gambar" autofocus>
                            @error('gambar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <img src="{{ url('gambar') }}/{{ $produks->gambar }}" width="50%" alt="">
                        </div>

                        <div class="form-group">
                            <a href="/petani/produk" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<!-- <script type="text/javascript">
    function validateForm() {
        var a = document.forms["form"]["nama_barang"].value;
        var b = document.forms["form"]["harga"].value;
        var c = document.forms["form"]["stok"].value;
        var d = document.forms["form"]["deskripsi"].value;
        var e = document.forms["form"]["gambar"].value;
        if (a == null || a == "", b == null || b == "", c == null || c == "", d == null || d == "",
            e == null || e == "") {
            alert("Data Tidak Boleh Kosong");
            return false;
        }
    }
</script> -->

@endsection