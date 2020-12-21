@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header"><h3>{{ __('Buat Artikel') }}</h3></div>

                <div class="card-body">
                    <form method="POST" action="/admin/artikel" enctype="multipart/form-data" name="form" onsubmit="return validateForm()">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="">Judul Artikel</label>
                            <input type="text" name="judul_artikel" id="judul_artikel" class="form-control @error('judul_artikel') is-invalid @enderror" value="{{ old('judul_artikel') }}" autocomplete="judul_artikel" autofocus>
                            @error('judul_artikel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Deskripsi Artikel</label>
                            <textarea type="text" name="deskripsi_artikel" id="deskripsi_artikel"  cols="83" rows="5" class="form-control @error('deskripsi_artikel') is-invalid @enderror" value="{{ old('deskripsi_artikel') }}" autocomplete="deskripsi_artikel" autofocus></textarea>
                            @error('deskripsi_artikel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Foto Artikel</label>
                            <input id="foto_artikel" type="file" class="form-control @error('foto_artikel') is-invalid @enderror" name="foto_artikel" value="{{ old('foto_artikel') }}" autocomplete="foto_artikel" autofocus>
                            @error('foto_artikel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <a href="/admin/artikel" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
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
        var a = document.forms["form"]["judul_artikel"].value;
        var b = document.forms["form"]["deskripsi_artikel"].value;
        var c = document.forms["form"]["foto_artikel"].value;
        if (a == null || a == "", b == null || b == "", c == null || c == "") {
            alert("Data Tidak Boleh Kosong");
            return false;
        }
    }
</script> -->

@endsection