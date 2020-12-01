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

    
}
