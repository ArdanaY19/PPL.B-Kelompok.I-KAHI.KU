<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    public function produk()
    {
        return $this->belongsTo('App\Produk','produk_id','id');
    }

    public function transaksi()
    {
        return $this->belongsTo('App\Transaksi','transaksi_id','id');
    }
}
