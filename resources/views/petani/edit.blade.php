@extends('petani.layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
            <a href="/petani/{{auth()->user()->petani->id}}/profile" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                    <h1 class="row d-flex align-items-center">
                    <span class="col-md-10"><i class="fas fa-user-edit"></i> Edit Profile</span> 
                    </h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="/petani/{{auth()->user()->petani->id}}/update" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input id="nama" type="text" class="form-control" name="nama" placeholder="Nama" value="{{auth()->user()->petani->nama}}">
                                </div>
                                <div class="form-group">
                                    <input id="username" type="text" class="form-control" name="username" placeholder="username" value="{{auth()->user()->username}}">
                                </div>
                                <div class="form-group">
                                    <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{auth()->user()->petani->tanggal_lahir}}">
                                </div>
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{auth()->user()->email}}">
                                </div>
                                <div class="form-group">
                                    <input id="no_hp" type="number" class="form-control" name="no_hp" placeholder="No HP" value="{{auth()->user()->petani->no_hp}}">
                                </div>
                                <div class="form-group">
                                    <input id="alamat" type="text" class="form-control" name="alamat" placeholder="Alamat" value="{{auth()->user()->petani->alamat}}">
                                </div>
                                <div class="form-group">
                                    <input id=" foto" type="file" name="foto" value="{{asset('foto/'.auth()->user()->petani->foto)}}">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection