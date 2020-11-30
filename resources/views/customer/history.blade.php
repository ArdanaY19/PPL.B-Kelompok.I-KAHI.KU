@extends('customer.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
            <a href="{{ url('/customer/produk') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-history"></i> Riwayat Pemesanan </h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($transaksis as $transaksi)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $transaksi->tanggal }}</td>
                                <td>
                                    @if($transaksi->status == 1)
                                    Sudah Melakukan Pemesanan Namun Belum Dibayar
                                    @else
                                    Sudah Melakukan Pemesanan Dan Sudah Dibayar
                                    @endif
                                </td>
                                <td>Rp. {{ number_format($transaksi->jumlah_harga + $transaksi->kode) }}</td>
                                <td><a href="{{ url('/customer/history') }}/{{ $transaksi->id }}" class="btn btn-primary"><i class="fa fa-info"></i> Detail</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
