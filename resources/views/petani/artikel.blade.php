@extends('petani.layouts.master')

@section('content')
<div class="container">
    <div class="col-md-12 mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/petani/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Artikel</li>
            </ol>
        </nav>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 mb-2 mt-2">
            <h2 class="text-center font-weight-bold">Artikel</h2>
        </div>
        @foreach($artikels as $artikel)
        <div class="col-md-6 mb-4 mt-2">
            <div class="card" style="width: 30rem;">
                <img class="card-img-top" src="{{ url('foto_artikel') }}/{{ $artikel->foto_artikel }}" height="300" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $artikel->judul_artikel }}</h5>
                    <p class="card-text text-justify">
                        <strong>Deskripsi :</strong> <?php
                        echo substr_replace($artikel->deskripsi_artikel, "...", 300);
                        ?>
                        <a href="{{ url('/petani/showartikel') }}/{{ $artikel->id }}">Read More</a>
                    </p>
                    
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection