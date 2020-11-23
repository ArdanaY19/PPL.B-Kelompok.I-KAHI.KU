<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function profile()
    {
        return view('profile');
    }
    public function edit($id)
    {
        $users = \app\user::findorfail($id);
        return view('edit', compact('users'));
    }
    public function update(Request $request, $id)
    {
        $users = \app\user::findorfail($id);
        $users->update($request->all());
        return redirect('profile')->with('sukses', 'data berhasil diubah');
    }
    public function produk()
    {
        return view('produk');
    }
    public function datapetani()
    {
        return view('datapetani');
    }
    public function datacustomer()
    {
        return view('datacustomer');
    }
    public function artikel()
    {
        return view('artikel');
    }
    public function showartikel()
    {
        return view('showartikel');
    }
}
