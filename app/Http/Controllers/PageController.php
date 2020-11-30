<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function home()
    {
        return view('page.login');
    }

    public function registercustomer()
    {
        return view('page.registercustomer');
    }

    public function registerpetani()
    {
        return view('page.registerpetani');
    }

    public function postregistercustomer(Request $request)
    {
        $this->validate($request, [
            'username' => ['required', 'string', 'max:15'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'alamat' => ['required', 'string', 'max:32'],
            'no_hp' => ['required'],
        ]);
        //insert ke tabel user
        $user = new \App\User;
        $user->role = 'customer';
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();
        //insert ke tabel customer
        $request->request->add(['user_id' => $user->id]);
        $customer = \App\customer::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
            $customer->foto = $request->file('foto')->getClientOriginalName();
            $customer->save();
        }
        return redirect('/registercustomer')->with('sukses', 'Data Berhasil Dibuat');
    }

    public function postregisterpetani(Request $request)
    { {
            $this->validate($request, [
                'username' => ['required', 'string', 'max:15'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
                'alamat' => ['required', 'string', 'max:32'],
                'no_hp' => ['required'],
            ]);
            //insert ke tabel user
            $user = new \App\User;
            $user->role = 'petani';
            $user->email = $request->email;
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->remember_token = Str::random(60);
            $user->save();
            //insert ke tabel petani
            $request->request->add(['user_id' => $user->id]);
            $petani = \App\petani::create($request->all());
            if ($request->hasFile('foto')) {
                $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
                $petani->foto = $request->file('foto')->getClientOriginalName();
                $petani->save();
            }
            return redirect('/registerpetani')->with('sukses', 'Data Berhasil Dibuat');
        }
    }
}
