<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class PetaniController extends Controller
{
    public function profile($id)
    {
        $petani = \App\petani::find($id);
        return view('petani.profile', ['petani' => $petani]);
    }

    public function editprofile($id)
    {
        $users = \App\User::find($id);
        return view('petani.edit', ['users' => $users]);
    }

    public function updateprofile(Request $request, $id)
    {
        $user = \Auth::user()->id;
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('foto', $request->file('foto')->getClientOriginalName());
            DB::table('users as u')
                ->join('petani as p', 'u.id', '=', 'p.user_id')->where('u.id', $user)
                ->update([
                    "nama" => $request->nama,
                    "username" => $request->username,
                    "email" => $request->email,
                    "no_hp" =>  $request->no_hp,
                    "tanggal_lahir" => $request->tanggal_lahir,
                    "alamat" => $request->alamat,
                    "foto" => $request->file('foto')->getClientOriginalName(),
                ]);
        } else {
            DB::table('users as u')
                ->join('petani as p', 'u.id', '=', 'p.user_id')->where('u.id', $user)
                ->update([
                    "nama" => $request->nama,
                    "username" => $request->username,
                    "email" => $request->email,
                    "no_hp" =>  $request->no_hp,
                    "tanggal_lahir" => $request->tanggal_lahir,
                    "alamat" => $request->alamat,
                ]);
        }
        return redirect(url('/petani/{{auth()->user()->petani->id}}/profile'))->with('success', 'data berhasil diubah');
    }

    public function produk()
    {
        return view('petani.produk');
    }
}
