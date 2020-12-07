<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{

    protected $fillable = [
        'nama_barang', 'harga',  'stok', 'deskripsi', 'gambar'
    ];

    public function transaksi_detail()
    {
        return $this->hasMany('App\TransaksiDetail','produk_id','id');
    }
}
