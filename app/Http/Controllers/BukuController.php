<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//CODE MEMANGGIL BukuModel
use App\Models\BukuModel;

class BukuController extends Controller
{
    //METHOD MENAMPILKAN DATA BUKU
    public function bukutampil()
    {
        $databuku = BukuModel::all();
        // dd($databuku);
        return view('pages.view_katalog',compact('databuku'));
    }

    //METHOD MENAMBAH DATA BUKU
    public function bukutambah(Request $request)
    {
        $this->validate($request, [
            'kode_buku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'tahun' => 'required',
            'cover' => 'required',
            'stok' => 'required'
        ]);

        $imageName = time().'.'.$request->cover->extension();
        $request->cover->storeAs('public/images', $imageName);

        BukuModel::create([
            'id' => $request->kode_buku,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'tahun' => $request->tahun,
            'cover' => $imageName,
            'stok' => $request->stok
        ]);

        return redirect('/buku');
    }

     //METHOD DELETE DATA BUKU
     public function bukuhapus($id_buku)
     {
         $databuku=BukuModel::find($id_buku);
         $databuku->delete();
 
         return redirect()->back();
     }

     //METHOD EDIT DATA BUKU
    public function bukuedit($id_buku, Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'tahun' => 'required',
            'cover' => 'required',
            'stok' => 'required'
        ]);

        $id_buku = BukuModel::find($id_buku);
        $id_buku->kode_buku   = $request->kode_buku;
        $id_buku->judul      = $request->judul;
        $id_buku->pengarang  = $request->pengarang;
        $id_buku->tahun   = $request->tahun;
        $id_buku->cover   = $request->cover;
        $id_buku->stok   = $request->stok;

        $id_buku->save();

        return redirect()->back();
    }
}