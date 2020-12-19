@extends('customer.layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/customer/index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/customer/history') }}">Riwayat Pemesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                </ol>
            </nav>
        </div>
        @if($errors->any())
        <div class="btn btn-danger col-md-6">
            <ul>
                @foreach($errors->all() as $error)
                <li class="text-center">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Sukses Melakukan Check Out</h3>
                    <h5>Pesanan sudah berhasil, Selanjutnya untuk pembayaran silahkan melakukan tranfer di 
                    <strong>BANK BRI Nomer Rekening : 31248-23182-129318</strong> dengan nominal <strong>Rp. {{ number_format($transaksi->jumlah_harga + $transaksi->kode) }}</strong></h5>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Detail Pemesanan </h3>
                    @if(!empty($transaksi))
                    <p align="right">Tanggal Pesan : {{ $transaksi->tanggal }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Foto Produk</th>
                                <th>Jumlah</th>
                                <th>Resi Pembayaran</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($transaksi_details as $transaksi_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td class="text-capitalize">{{ $transaksi_detail->produk->nama_barang }}</td>
                                <td>
                                    <img src="{{ url('gambar') }}/{{ $transaksi_detail->produk->gambar }}" width="100" height="100" alt="...">
                                </td>
                                <td>{{ $transaksi_detail->jumlah }} kg</td>
                                
                                @if($transaksi_detail->transaksi->bukti_resi != "")
                                <td><img src="{{ url('bukti_resi') }}/{{ $transaksi_detail->transaksi->bukti_resi }}" width="100" height="100" alt="..."></td>
                                @else
                                <td>Menunggu Resi Diupload</td>
                                @endif
                                <td >Rp. {{ number_format($transaksi_detail->produk->harga) }}</td>
                                <td >Rp. {{ number_format($transaksi_detail->jumlah_harga) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td><td></td><td></td><td></td><td></td>
                                <td ><strong>Total Harga :</strong></td>
                                <td ><strong>Rp. {{ number_format($transaksi->jumlah_harga) }}</strong></td>
                            </tr>
                            <tr>
                                <td></td><td></td><td></td><td></td><td></td>
                                <td ><strong>Kode Unik :</strong></td>
                                <td ><strong>Rp. {{ number_format($transaksi->kode) }}</strong></td>
                            </tr>
                            <tr>
                                <td></td><td></td><td></td><td></td><td></td>
                                <td ><strong>Total Bayar :</strong></td>
                                <td ><strong>Rp. {{ number_format($transaksi->jumlah_harga + $transaksi->kode) }}</strong></td>
                            </tr>
                            <tr>
                                @if($transaksi->bukti_transfer == '')
                                <td colspan="6" ><strong></strong></td>
                                <td align="right"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-upload"></i> Upload Bukti Transfer</button></td>
                                @else
                                <td colspan="6" ><strong></strong></td>
                                <td align="right"><button type="button" class="btn btn-danger" readonly title="Bukti Transfer Telah Diupload" ><i class="fas fa-upload"></i> Upload Bukti Transfer</button></td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Upload Bukti Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
                <p>Pembayaran ke rek BNI senilai <strong>Rp. {{ number_format($transaksi->jumlah_harga + $transaksi->kode) }}</strong></p>
				<p>Nomer Rekening : 31248-23182-129318 a.n. </p>
            </div>
        <form action="{{ url('/customer/history') }}/{{ $transaksi->id }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input id="bukti_transfer" type="file" name="bukti_transfer" required>
            </div>
            <div class="form-group text-right">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Upload Bukti</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

@endsection
