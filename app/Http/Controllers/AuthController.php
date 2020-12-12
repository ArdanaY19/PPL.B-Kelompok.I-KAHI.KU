<?php

namespace App\Http\Controllers;

use Redirect; 
use App\User;
use App\petani;
use App\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('page.login');
    }

    public function postlogin(Request $request)
    {
        // if (Auth::attempt($request->only('email', 'password'))) {
        //     return redirect('/home');
        $user = \App\User::All();
        if(Auth::attempt($request->only('email','password'))){
            $user = \App\User::where('email', $request->email)->first();
            if($user->role == 'admin'){
                    //Auth::guard('admin')->LoginUsingId($user->id);
                    return redirect('/home');
                } elseif($user->role == 'petani'){
                    //Auth::guard('master')->LoginUsingId($user->id);
                    return redirect('/petani/dashboard');
                }elseif ($user->role == 'customer') {
                // Auth::guard('art')->LoginUsingId($user->id);
                    return redirect('/customer/index');
                    //dd($request->all());
                }
            }
        return redirect('/login')->with('status', 'Maaf, email dan password anda tidak sesuai. Harap periksa kembali');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('logout', 'Anda yakin ingin keluar ?');
    }

    //homenya admin
    public function setviewhomeadmin ()
    {
        return view('home');

    }

    //homenya master
    public function setviewhomepetani ()
    {
        return view('petani.dashboard');

    }

  //homenya art
     public function setviewhomecustomer (){         
        return view ('customer.index');
    }
}
