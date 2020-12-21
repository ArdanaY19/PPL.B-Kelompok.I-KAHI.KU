<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Transaksi;
use App\TransaksiDetail;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetaniProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $produks = Produk::paginate(30);
        return view('petani.produk', compact('produks'));
    }

    public function buatproduk()
    {
        return view('petani.buatproduk');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nama_barang' => ['required', 'string', 'max:100'],
            'harga' => ['required', 'integer'],
            'stok' => ['required', 'integer'],
            'deskripsi' => ['required'],
            'gambar' => ['required', 'mimes:jpg,jpeg,png'],
        ]);
        //insert ke tabel user
        $produk = new \App\produk;
        $produk->nama_barang = $request->nama_barang;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->deskripsi = $request->deskripsi;
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('gambar/', $request->file('gambar')->getClientOriginalName());
            $produk->gambar = $request->file('gambar')->getClientOriginalName();
            $produk->save();
        }
        $produk->save();

        Alert::success('Success', 'Produk Berhasil Disimpan');
        return redirect('/petani/produk')->with('sukses', 'Data Berhasil Dibuat');
    }

    public function delete($id)
    {
        $produk = Produk::where('id', $id)->first();

        $produk->delete();
        
        Alert::error('Delete', 'Produk Sukses Dihapus');
        return redirect('/petani/produk');
    }

    public function editproduk($id)
    {
        $produks = Produk::findorfail($id);
        return view('petani.editproduk', compact('produks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_barang' => ['required', 'string', 'max:100'],
            'harga' => ['required', 'integer'],
            'stok' => ['required', 'integer'],
            'deskripsi' => ['required'],
            'gambar' => ['required', 'mimes:jpg,jpeg,png'],
        ]);
        
        $ubah = Produk::findorfail($id);
        $awal = $ubah->gambar;

        $produks = [
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'gambar' => $awal,
        ];

        $request->gambar->move(public_path().'/gambar', $awal);
        $ubah->update($produks);

        Alert::success('Success', 'Produk Berhasil Dirubah');
        return redirect('/petani/produk');
    }
    
    public function verif()
    {
        $transaksis = Transaksi::where('status', '!=', 0)->where('bukti_transfer', '!=', '')->orderBy('id', 'desc')->get();

        return view('petani.verifikasi', compact('transaksis'));
    }

    public function verifikasiDetail($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        $transaksi_details = TransaksiDetail::where('transaksi_id', $transaksi->id)->get();

        return view('petani.verifikasiDetail', compact('transaksi', 'transaksi_details'));
    }

    public function disetujui($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        if($transaksi->status == 1){
            $transaksi->status = 2;
            $transaksi->update();
        }elseif($transaksi->status == 2){
            $transaksi->status = 2;
            $transaksi->update();
        }else{
            $transaksi->status = 2;
            $transaksi->update();
        }
        
        Alert::success('Verifikasi Pembayaran Diterima');
        return redirect('/petani/verifikasi');
    }

    public function ditolak($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        if($transaksi->status == 1){
            $transaksi->status = 3;
            $transaksi->update();
        }elseif($transaksi->status == 2){
            $transaksi->status = 3;
            $transaksi->update();
        }else{
            $transaksi->status = 3;
            $transaksi->update();
        }

        Alert::error('Verifikasi Pembayaran Ditolak');
        return redirect('/petani/verifikasi');
    }

    public function pendapatan()
    {
        // $data = \DB::table('transaksis as t')
        // ->join('transaksi_details as td', 't.id', '=', 'td.transaksi_id')->where('status', '=', 2)
        // ->select([
        //     \DB::raw('sum(jumlah_harga) as Total'),
        //     \DB::raw('sum(kode) as jumlahkode'),
        //     \DB::raw('sum(jumlah) as keseluruhan')
        // ])
        // ->get()
        // ->toArray();

        // $coba = \DB::table('transaksi_details')
        // ->select([
        //     \DB::raw('sum(jumlah) as keseluruhan')
        // ])
        // ->get()
        // ->toArray();

        $data = DB::table('transaksi_details as td')
        ->join('transaksis as t', 't.id', '=', 'td.transaksi_id')
        ->join('produks as p', 'p.id', '=', 'td.produk_id')->where('t.status', '=', 2)
        ->select([
            DB::raw('sum(t.jumlah_harga) as total'),
            DB::raw('sum(t.kode) as kodeunik'),
            DB::raw('sum(td.jumlah) as produk'),
            DB::raw('DATE(t.tanggal) as tanggal_pesan'),
            DB::raw('p.nama_barang as nama_produk')
        ])
        ->groupBy('nama_produk', 'tanggal_pesan')
        ->orderBy('tanggal_pesan', 'desc')
        ->get();

        $total = DB::table('transaksis as t')
        ->join('transaksi_details as td', 't.id', '=', 'td.transaksi_id')->where('t.status', '=', 2)
        ->select([
            DB::raw('sum(t.jumlah_harga) as jumlah'),
            DB::raw('sum(t.kode) as unik'),
            DB::raw('sum(td.jumlah) as stok')
        ])
        ->get();

        return view('petani.pendapatan', compact('data', 'total'));
    }

    public function bukti(Request $request, $id)
    {
        $validation = $request->validate([
            'bukti_resi' => ['required', 'mimes:jpg,jpeg,png,bmp,tiff'],
        ]);

        $transaksi = Transaksi::where('id', $id)->first();
        $transaksi_details = TransaksiDetail::where('transaksi_id', $transaksi->id)->get();
        if ($request->hasFile('bukti_resi')) {
            $request->file('bukti_resi')->move('bukti_resi/', $request->file('bukti_resi')->getClientOriginalName());
            $transaksi->bukti_resi = $request->file('bukti_resi')->getClientOriginalName();
            $transaksi->save();
        }
        $transaksi->save();

        Alert::success('Bukti Resi Berhasil Diupload');
        return redirect('/petani/verifikasi');
    }
    
}
