@extends('customer.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/customer/index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Produk</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mb-2 mt-2">
            <h2 class="text-center font-weight-bold">PRODUK</h2>
        </div>
        @foreach($produks as $produk)
        <div class="col-md-4 mb-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ url('gambar') }}/{{ $produk->gambar }}" width="100" height="250" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $produk->nama_barang }}</h5>
                    <p class="card-text">
                        <strong>Harga :</strong> Rp. {{ number_format($produk->harga) }} <br>
                        <strong>Stok :</strong> {{ number_format($produk->stok) }} kg <br>
                    </p>
                    <a href="{{ url('/customer/detailproduk') }}/{{ $produk->id }}" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
