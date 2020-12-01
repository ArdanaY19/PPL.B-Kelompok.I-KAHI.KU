<?php

namespace App\Http\Controllers;


use Redirect; 
use App\User;
use App\petani;
use App\customer;
use App\Produk;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datacustomer()
    {
        $customers = customer::all();
        return view('admin.datacustomer', compact('customers'));
    }

    public function datapetani()
    {
        $petanis = petani::all();
        return view('admin.datapetani', compact('petanis'));
    }

    public function dataproduk()
    {
        $produks = Produk::paginate(30);
        return view('admin.dataproduk', compact('produks'));
    }

    public function datatransaksi()
    {
        $transaksis = Transaksi::where('status', '!=', 0)->get();

        return view('admin.datatransaksi', compact('transaksis'));
    }
    public function artikel()
    {
        return view('admin.artikel');
    }
    public function showartikel()
    {
        return view('admin.showartikel');
    }
}
