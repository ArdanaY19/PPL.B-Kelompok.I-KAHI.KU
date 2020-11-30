<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function transaksi_detail()
    {
        return $this->hasMany('App\TransaksiDetail','transaksi_id','id');
    }
}
