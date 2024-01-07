<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// MEMANGGIL AnggotaModel
use App\Models\AnggotaModel;

class AnggotaController extends Controller
{
    // public function view(){
    //     return view('view_anggota');
    // }
    //method untuk tampil data anggota
    public function anggotatampil()
    {
        $dataanggota = AnggotaModel::orderby('id_anggota', 'ASC')
        ->paginate(5);

        return view('pages.view_anggota',compact('dataanggota'));
    }

    //METHOD UNTUK MENAMBAH DATA ANGGOTA
    public function anggotatambah(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required',
            'nama_anggota' => 'required',
            'email_anggota' => 'required'
        ]);

        AnggotaModel::create([
            'nim' => $request->nim,
            'nama_anggota' => $request->nama_anggota,
            'email_anggota' => $request->email_anggota
        ]);

        return redirect('/anggota');
    }

     //METHOD UNTUK DELETE DATA ANGGOTA
     public function anggotahapus($id_anggota)
     {
         $dataanggota=AnggotaModel::find($id_anggota);
         $dataanggota->delete();
 
         return redirect()->back();
     }

     //METHOD UNTUK EDIT DATA ANGGOTA
    public function anggotaedit($id_anggota, Request $request)
    {
        $this->validate($request, [
            'nim' => 'required',
            'nama_anggota' => 'required',
            'email' => 'required'
        ]);

        $id_anggota = AnggotaModel::find($id_anggota);
        $id_anggota->nim   = $request->nim;
        $id_anggota->nama_anggota      = $request->nama_anggota;
        $id_anggota->email_anggota  = $request->email_anggota;

        $id_anggota->save();

        return redirect()->back();
    }
}