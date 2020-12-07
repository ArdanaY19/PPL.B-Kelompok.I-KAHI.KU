@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header"><h3>{{ __('Edit Artikel') }}</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/admin/artikel') }}/{{ $artikels->id }}" enctype="multipart/form-data" name="form">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="">Nama artikel</label>
                            <input type="text" name="judul_artikel" id="judul_artikel" class="form-control" value="{{ $artikels->judul_artikel }}">
                        </div>

                        <div class="form-group">
                            <label for="">Deskripsi artikel</label>
                            <textarea type="text" name="deskripsi_artikel" id="deskripsi_artikel" class="form-control" cols="83" rows="5" >{{ $artikels->deskripsi_artikel }}</textarea>
                        </div>

                        <div class="form-group">
                            <input id="foto_artikel" type="file" name="foto_artikel">
                        </div>
                        <div class="form-group">
                            <img src="{{ url('foto_artikel') }}/{{ $artikels->foto_artikel }}" width="50%" alt="">
                        </div>

                        <div class="form-group">
                            <a href="/admin/artikel" class="btn btn-danger">Kembali</a>
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