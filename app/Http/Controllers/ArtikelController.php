<?php

namespace App\Http\Controllers;

use App\Artikel;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $artikels = Artikel::paginate(30);
        return view('admin.artikel', compact('artikels'));
    }

    public function buatartikel()
    {
        return view('admin.buatartikel');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'judul_artikel' => ['required', 'string', 'max:100'],
            'deskripsi_artikel' => ['required'],
            'foto_artikel' => ['required', 'mimes:jpg,jpeg,png'],
        ]);
        //insert ke tabel user
        $artikel = new \App\Artikel;
        $artikel->judul_artikel = $request->judul_artikel;
        $artikel->deskripsi_artikel = $request->deskripsi_artikel;
        if ($request->hasFile('foto_artikel')) {
            $request->file('foto_artikel')->move('foto_artikel/', $request->file('foto_artikel')->getClientOriginalName());
            $artikel->foto_artikel = $request->file('foto_artikel')->getClientOriginalName();
            $artikel->save();
        }
        $artikel->save();

        Alert::success('Success', 'Artikel Berhasil Disimpan');
        return redirect('/admin/artikel')->with('sukses', 'Data Berhasil Dibuat');
    }

    public function delete($id)
    {
        $artikel = artikel::where('id', $id)->first();

        $artikel->delete();
        
        Alert::error('Delete', 'Artikel Sukses Dihapus');
        return redirect('/admin/artikel');
    }

    public function editartikel($id)
    {
        $artikels = artikel::findorfail($id);
        return view('admin.editartikel', compact('artikels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'judul_artikel' => ['required', 'string', 'max:100'],
            'deskripsi_artikel' => ['required'],
            'foto_artikel' => ['required', 'mimes:jpg,jpeg,png'],
        ]);
        
        $ubah = artikel::findorfail($id);
        $awal = $ubah->foto_artikel;

        $artikels = [
            'judul_artikel' => $request->judul_artikel,
            'deskripsi_artikel' => $request->deskripsi_artikel,
            'foto_artikel' => $awal,
        ];

        $request->foto_artikel->move(public_path().'/foto_artikel', $awal);
        $ubah->update($artikels);

        Alert::success('Success', 'Artikel Berhasil Dirubah');
        return redirect('/admin/artikel');
    }
}
