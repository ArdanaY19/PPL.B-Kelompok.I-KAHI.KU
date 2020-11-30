@extends('customer.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
            <a href="{{ url('/customer/produk') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
        </div>
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Check Out </h3>
                    @if(!empty($transaksi))
                    <p align="right">Tanggal Pesan : {{ $transaksi->tanggal }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Foto Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($transaksi_details as $transaksi_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $transaksi_detail->produk->nama_barang }}</td>
                                <td>
                                    <img src="{{ url('images') }}/{{ $transaksi_detail->produk->gambar }}" width="100" alt="...">
                                </td>
                                <td>{{ $transaksi_detail->jumlah }} kg</td>
                                <td " align="right">Rp. {{ number_format($transaksi_detail->produk->harga) }}</td>
                                <td " align="right">Rp. {{ number_format($transaksi_detail->jumlah_harga) }}</td>
                                <td>
                                    <form action="{{ url('/customer/check_out') }}/{{ $transaksi_detail->id }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5 " align="right"><strong>Total Harga :</strong></td>
                                <td " align="right"><strong>Rp. {{ number_format($transaksi->jumlah_harga) }}</strong></td>
                                <td>
                                    <a href="{{ url('/customer/konfirmasi_check_out') }}" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Check Out</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
