<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//MEMANGGIL MODEL ADMIN
use App\Models\PetugasModel;

class PetugasController extends Controller
{
    //METHOD UNTUK MENAMPILKAN DATA ADMIN
    public function petugastampil()
    {
        $dataadmin = PetugasModel::orderby('id_admin', 'ASC')
        ->paginate(5);

        return view('pages.view_admin',compact('dataadmin'));
    }

    //METHOD MENAMBAH DATA ADMIN
    public function petugastambah(Request $request)
    {
        $this->validate($request, [
            'nama_admin' => 'required',
            'email_admin' => 'required',
            'password' => 'required'
        ]);

        PetugasModel::create([
            'nama_admin' => $request->nama_admin,
            'email_admin' => $request->email_admin,
            'password' => $request->password
        ]);

        return redirect('/admin');
    }

     //METHOD UNTUK DELETE DATA ADMIN
     public function petugashapus($id_admin)
     {
         $dataadmin=PetugasModel::find($id_admin);
         $dataadmin->delete();
 
         return redirect()->back();
     }

     //METHOD UNTUK EDIT DATA ADMIN
    public function petugasedit($id_admin, Request $request)
    {
        $this->validate($request, [
            'nama_admin' => 'required',
            'email_admin' => 'required',
            'password' => 'required'
        ]);

        $id_admin = PetugasModel::find($id_admin);
        $id_admin->nama_admin      = $request->nama_admin;
        $id_admin->email_admin   = $request->email_admin;
        $id_admin->password   = $request->password;

        $id_admin->save();

        return redirect()->back();
    }
}