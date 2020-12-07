<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{

    protected $fillable = [
        'judul_artikel', 'deskripsi_artikel', 'foto_artikel'
    ];
}
