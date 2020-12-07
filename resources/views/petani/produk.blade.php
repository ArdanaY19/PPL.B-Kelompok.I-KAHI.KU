@extends('petani.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-2 mt-2">
            <h2 class="text-center font-weight-bold">PRODUK</h2>
            <a class="btn btn-primary" href="/petani/buatproduk"><i class="fas fa-plus"></i> Tambah Data Produk</a>
        </div>
        @foreach($produks as $produk)
        <div class="col-md-4 mb-4 mt-2">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ url('gambar') }}/{{ $produk->gambar }}" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $produk->nama_barang }}</h5>
                    <p class="card-text text-justify">
                        <strong>Harga :</strong> Rp. {{ number_format($produk->harga) }} <br>
                        <strong>Stok :</strong> {{ number_format($produk->stok) }} kg <br>
                        <br>
                        <strong>Deskripsi :</strong> {{ $produk->deskripsi }}
                    </p>
                    <a href="{{ url('/petani/editproduk') }}/{{ $produk->id }}" class="btn btn-success btn-sm"><i class="fas fa-edit"> Ubah Data</i></a>
                    <form action="{{ url('/petani/produk') }}/{{ $produk->id }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm mt-2"><i class="fa fa-trash"> Delete</i></button>
                    </form>
                    
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection