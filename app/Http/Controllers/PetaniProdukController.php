<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Transaksi;
use App\TransaksiDetail;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
            'deskripsi' => ['required', 'string', 'max:255'],
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
    

    
}
