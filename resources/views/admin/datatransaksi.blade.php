@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <h3><i class="text-center"></i> Data Transaksi </h3>
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($transaksis as $transaksi)
                            <tr class="text-center">
                                <td>{{ $no++ }}</td>
                                <td class="text-uppercase">{{ $transaksi->user->customer->nama }}</td>
                                <td>{{ $transaksi->user->email }}</td>
                                <td>{{ date("d F Y", strtotime($transaksi->tanggal)) }}</td>
                                <td>
                                    @if($transaksi->status == 1)
                                    Belum Dibayar
                                    @elseif($transaksi->status == 2)
                                    Sudah Dibayar
                                    @else
                                    Pembayaran Tidak Terverifikasi
                                    @endif
                                </td>
                                <td>Rp. {{ number_format($transaksi->jumlah_harga + $transaksi->kode) }}</td>
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
