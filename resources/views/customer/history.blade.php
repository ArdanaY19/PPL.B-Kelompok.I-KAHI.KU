@extends('customer.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/customer/index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
                </ol>
            </nav>
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
                                <th>Bukti Transfer</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($transaksis as $transaksi)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ date("d F Y", strtotime($transaksi->tanggal)) }}</td>
                                <td>
                                    @if($transaksi->status == 1 && $transaksi->bukti_transfer == "")
                                    Belum Dibayar
                                    @elseif($transaksi->status == 2)
                                    Sudah Dibayar
                                    @elseif($transaksi->bukti_transfer != "")
                                    Menunggu Verifikasi
                                    @else
                                    Pembayaran Tidak Terverifikasi
                                    @endif
                                </td>
                                <td>Rp. {{ number_format($transaksi->jumlah_harga + $transaksi->kode) }}</td>
                                @if($transaksi->bukti_transfer != "")
                                <td><img src="{{ url('bukti_transfer') }}/{{ $transaksi->bukti_transfer }}" width="100" height="100" alt="..."></td>
                                @else
                                <td>Bukti Transfer Belum Diupload</td>
                                @endif
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
