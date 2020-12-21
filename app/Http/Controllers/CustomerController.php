<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Artikel;

class CustomerController extends Controller
{
    public function profile($id)
    {
        $customer = \App\customer::find($id);
        return view('customer.profile', ['customer' => $customer]);
    }

    public function editprofile($id)
    {
        $users = \App\User::find($id);
        return view('customer.edit', ['users' => $users]);
    }

    public function updateprofile(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'min:11', 'max:13'],
            'tanggal_lahir' => ['required'],
            'foto' => ['required', 'mimes:jpg,jpeg,png'],
        ]);

        $user = \Auth::user()->id;
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
            DB::table('users as u')
                ->join('customer as p', 'u.id', '=', 'p.user_id')->where('u.id', $user)
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
                ->join('customer as p', 'u.id', '=', 'p.user_id')->where('u.id', $user)
                ->update([
                    "nama" => $request->nama,
                    "username" => $request->username,
                    "email" => $request->email,
                    "no_hp" =>  $request->no_hp,
                    "tanggal_lahir" => $request->tanggal_lahir,
                    "alamat" => $request->alamat,
                ]);
        }
        return redirect(url('/customer/{{auth()->user()->customer->id}}/profile'))->with('success', 'Data Berhasil Diubah');
    }

    public function artikel()
    {
        $artikels = Artikel::paginate(30);
        return view('customer.artikel', compact('artikels'));
    }

    public function show($id)
    {
        $artikel = Artikel::where('id', $id)->first();
        return view('customer.showartikel', compact('artikel'));
    }
}
