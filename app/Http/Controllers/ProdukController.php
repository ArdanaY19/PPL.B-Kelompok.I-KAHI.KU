<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Transaksi;
use App\TransaksiDetail;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $produks = Produk::paginate(30);
        return view('customer.produk', compact('produks'));
    }

    public function detail($id)
    {
        $produk = Produk::where('id', $id)->first();
        return view('customer.detailproduk', compact('produk'));
    }

    public function produk(Request $request, $id)
    {
        $produk = Produk::where('id', $id)->first();
        $tanggal = Carbon::now();

        //validasi melebihi stok
        if($request->jumlah_pesan > $produk->stok)
        {
            return redirect('/customer/detailproduk/'.$id);
        }

        //cek validasi
        $cek_transaksi = Transaksi::where('user_id', Auth::user()->id)->where('status', 0)->first();
        //simpan ke database transaksi
        if(empty($cek_transaksi))
        {
            $transaksi = new Transaksi;
            $transaksi->user_id = Auth::user()->id;
            $transaksi->tanggal = $tanggal;
            $transaksi->status = 0;
            $transaksi->jumlah_harga = 0;
            $transaksi->kode = mt_rand(100, 999);
            $transaksi->save();
        }
        

        //simpan ke database transaksi_detail
        $transaksi_baru = Transaksi::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //cek transaksi detail
        $cek_transaksi_detail = TransaksiDetail::where('produk_id', $produk->id)->where('transaksi_id', $transaksi_baru->id)->first();
        if(empty($cek_transaksi_detail))
        {
            $transaksi_detail = new TransaksiDetail;
            $transaksi_detail->produk_id = $produk->id;
            $transaksi_detail->transaksi_id = $transaksi_baru->id;
            $transaksi_detail->jumlah = $request->jumlah_pesan;
            $transaksi_detail->jumlah_harga = $produk->harga*$request->jumlah_pesan;
            $transaksi_detail->save();
        }else
        {
            $transaksi_detail = TransaksiDetail::where('produk_id', $produk->id)->where('transaksi_id', $transaksi_baru->id)->first();
            $transaksi_detail->jumlah = $transaksi_detail->jumlah+$request->jumlah_pesan;

            //harga sekarang
            $harga_transaksi_detail_baru = $produk->harga*$request->jumlah_pesan;
            $transaksi_detail->jumlah_harga = $transaksi_detail->jumlah_harga+$harga_transaksi_detail_baru;
            $transaksi_detail->update();
        }

        $transaksi = Transaksi::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $transaksi->jumlah_harga = $transaksi->jumlah_harga+$produk->harga*$request->jumlah_pesan;
        $transaksi->update();
        
        Alert::success('Success', 'Produk Berhasil Dimasukkan Keranjang');
        return redirect('/customer/check_out');
    }

    public function check_out()
    {
        $transaksi = Transaksi::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if(!empty($transaksi))
        {
            $transaksi_details = TransaksiDetail::where('transaksi_id', $transaksi->id)->get();
        }

        return view('customer.check_out', compact('transaksi', 'transaksi_details'));
    }

    public function delete($id)
    {
        $transaksi_detail = TransaksiDetail::where('id', $id)->first();

        $transaksi = Transaksi::where('id', $transaksi_detail->transaksi_id)->first();
        $transaksi->jumlah_harga = $transaksi->jumlah_harga - $transaksi_detail->jumlah_harga;
        $transaksi->update();

        $transaksi_detail->delete();
        
        Alert::error('Delete', 'Pesanan Sukses Dihapus');
        return redirect('/customer/check_out');
    }

    public function konfirmasi()
    {
        $transaksi = Transaksi::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $transaksi_id = $transaksi->id;
        $transaksi->status = 1;
        $transaksi->update();

        $transaksi_details = TransaksiDetail::where('transaksi_id', $transaksi_id)->get();
        foreach ($transaksi_details as $transaksi_detail){
            $produk = Produk::where('id', $transaksi_detail->produk_id)->first();
            $produk->stok = $produk->stok - $transaksi_detail->jumlah;
            $produk->update();
        }

        return redirect('/customer/history');
    }

    public function history()
    {
        $transaksis = Transaksi::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();

        return view('customer.history', compact('transaksis'));
    }

    public function historyDetail($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        $transaksi_details = TransaksiDetail::where('transaksi_id', $transaksi->id)->get();

        return view('customer.historyDetail', compact('transaksi', 'transaksi_details'));
    }
}
