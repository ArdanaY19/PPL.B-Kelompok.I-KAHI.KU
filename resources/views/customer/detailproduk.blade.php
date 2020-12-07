@extends('customer.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
            <a href="{{ url('/customer/produk') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/customer/produk') }}">Produk</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $produk->nama_barang }}</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ url('gambar') }}/{{ $produk->gambar }}" class="rounded mx-auto d-block" width="100%" alt="">
                        </div>
                        <div class="col-md-6 mt-3">
                            <h2>{{ $produk->nama_barang }}</h2>
                            <table class="table text-justify">
                                <tbody>
                                    <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($produk->harga) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td>{{ number_format($produk->stok) }} kg </td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td>:</td>
                                        <td>{{ $produk->deskripsi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Pesan (dalam kg)</td>
                                        <td>:</td>
                                        <td>
                                            <form action="{{ url('/customer/detailproduk') }}/{{ $produk->id }}" method="post">
                                            @csrf
                                                <input type="text" name="jumlah_pesan" class="form-control" required>
                                                <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
