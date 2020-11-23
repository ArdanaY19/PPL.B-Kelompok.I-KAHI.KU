@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12 col-lg-12 dark-bg our-vision light-color">
        <div class="block-title v-line mb-35" style="border-color: #0F8CBF">
            <h1 class="row d-flex align-items-center">
            <span class="col-md-10" style="color: #0000FF">Edit Profile</span> 
            </h1>
        </div>
    </div>
</div>

<div class="card-body">
    <form action="{{ url('update',auth()->user()->id) }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <input id="nama_depan" type="text" class="form-control" name="nama_depan" placeholder="Nama Depan" value="{{auth()->user()->nama_depan}}">
        </div>
        <div class="form-group">
            <input id="nama_belakang" type="text" class="form-control" name="nama_belakang" placeholder="Nama Belakang" value="{{auth()->user()->nama_belakang}}">
        </div>
        <div class="form-group">
            <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{auth()->user()->tanggal_lahir}}">
        </div>
        <div class="form-group">
            <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{auth()->user()->email}}">
        </div>
        <div class="form-group">
            <input id="no_hp" type="text" class="form-control" name="no_hp" placeholder="No HP" value="{{auth()->user()->no_hp}}">
        </div>
        <div class="form-group">
            <input id="alamat" type="text" class="form-control" name="alamat" placeholder="Alamat" value="{{auth()->user()->alamat}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Ubah Data</button>
        </div>
    </form>
</div>

@endsection