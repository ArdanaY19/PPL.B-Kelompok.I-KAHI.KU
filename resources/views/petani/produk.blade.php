@extends('petani.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-2 mt-2">
            <h2 class="text-center font-weight-bold">PRODUK</h2>
        </div>
        @foreach($produks as $produk)
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ url('images') }}/{{ $produk->gambar }}" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $produk->nama_barang }}</h5>
                    <p class="card-text">
                        <strong>Harga :</strong> Rp. {{ number_format($produk->harga) }} <br>
                        <strong>Stok :</strong> {{ number_format($produk->stok) }} <br>
                    </p>
                    
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection