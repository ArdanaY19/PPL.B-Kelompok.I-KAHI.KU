@extends('petani.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
            <a href="{{ url('/petani/verifikasi') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/petani/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/petani/verifikasi') }}">Verifikasi Pembayaran</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Verifikasi Pembayaran</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-body">
                    <h3><i class="fas fa-info-circle"></i> Detail Pembayaran </h3>
                    @if(!empty($transaksi))
                    <p align="right">Tanggal Pesan : {{ $transaksi->tanggal }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Bukti Transfer</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($transaksi_details as $transaksi_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $transaksi_detail->produk->nama_barang }}</td>
                                <td>
                                    <button type="button" data-toggle="modal" data-target="#exampleModalCenter"><img src="{{ url('bukti_transfer') }}/{{ $transaksi_detail->transaksi->bukti_transfer }}" width="100" height="100" alt="..."></button>
                                </td>
                                <td>{{ $transaksi_detail->jumlah }} kg</td>
                                <td " align="right">Rp. {{ number_format($transaksi_detail->produk->harga) }}</td>
                                <td " align="right">Rp. {{ number_format($transaksi_detail->jumlah_harga) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                <td " align="right"><strong>Rp. {{ number_format($transaksi->jumlah_harga) }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="5" align="right"><strong>Kode Unik :</strong></td>
                                <td " align="right"><strong>Rp. {{ number_format($transaksi->kode) }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="5" align="right"><strong>Total Pembayaran :</strong></td>
                                <td " align="right"><strong>Rp. {{ number_format($transaksi->jumlah_harga + $transaksi->kode) }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="4" align="right"><strong></strong></td>
                                <td " align="right"><a href="{{ url('/petani/ditolakverifikasi') }}/{{ $transaksi->id }}" class="btn btn-danger"><i class=""></i> Ditolak</a></td>

                                <td " align="left"><a href="{{ url('/petani/disetujuiverifikasi') }}/{{ $transaksi->id }}" class="btn btn-success"><i class=""></i> Disetujui</a></td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold text-center" id="exampleModalLongTitle">Bukti Transfer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <img src="{{ url('bukti_transfer') }}/{{ $transaksi_detail->transaksi->bukti_transfer }}" width="475" height="500" alt="...">
      </div>
    </div>
  </div>
</div>
@endsection
