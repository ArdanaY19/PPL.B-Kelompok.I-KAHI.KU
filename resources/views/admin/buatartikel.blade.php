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
                            <input type="text" name="judul_artikel" id="judul_artikel" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Deskripsi Artikel</label>
                            <textarea type="text" name="deskripsi_artikel" id="deskripsi_artikel" class="form-control" cols="83" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <input id="foto_artikel" type="file" name="foto_artikel">
                        </div>

                        <div class="form-group">
                            <a href="/admin/artikel" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<script type="text/javascript">
    function validateForm() {
        var a = document.forms["form"]["judul_artikel"].value;
        var b = document.forms["form"]["deskripsi_artikel"].value;
        var c = document.forms["form"]["foto_artikel"].value;
        if (a == null || a == "", b == null || b == "", c == null || c == "") {
            alert("Data Tidak Boleh Kosong");
            return false;
        }
    }
</script>

@endsection