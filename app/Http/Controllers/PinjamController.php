<?php

namespace App\Http\Controllers;

// use App\Models\BukuModel;
// use App\Models\PetugasModel;
use Illuminate\Http\Request;

//MEMANGGIL PinjamModel
use App\Models\PinjamModel;

//MEMANGGIL PetugasModel
use App\Models\PetugasModel;

//MEMANGGIL AnggotaModel
use App\Models\AnggotaModel;

//MEMANGGIL BukuModel
use App\Models\BukuModel;

class PinjamController extends Controller
{
    //METHOD MENAMPILKAN DATA PEMINJAMAN
    public function pinjamtampil()
    {
        $datapinjam = PinjamModel::orderby('id_peminjaman', 'ASC')
            ->paginate(5);

        $dataadmin    = PetugasModel::all();
        $dataanggota      = AnggotaModel::all();
        $databuku       = BukuModel::all();

        return view('pages/view_peminjaman', ['pinjam' => $datapinjam, 'admin' => $dataadmin, 'anggota' => $dataanggota, 'buku' => $databuku]);
    }

    //METHOD UNTUK ADD DATA PINJAM
    public function pinjamtambah(Request $request)
    {


        $this->validate($request, [
            'id_admin' => 'required',
            'id_anggota' => 'required',
            'id_buku' => 'required',
        ]);

        $book = BukuModel::find($request->id_buku);

        if ($book->status_peminjaman === false) {

            $book->update([
                'status_peminjaman' => true
            ]);

            $book->peminjaman()->create([
                'id_admin' => $request->id_admin,
                'id_anggota' => $request->id_anggota,
                'id_buku' => $request->id_buku,
                'tanggal_pinjam' => now(),
                'tanggal_kembali' => now()->addWeek()
            ]);

            return redirect('/pinjam');
        }
    }

    //METHOD UNTUK DELETE DATA PINJAM
    public function pinjamhapus($id_pinjam)
    {
        $datapinjam = PinjamModel::find($id_pinjam);
        $datapinjam->delete();

        return redirect()->back();
    }

    //METHOD EDIT DATA PEMINJAMAN
    public function pinjamedit($id_pinjam, Request $request)
    {

        $this->validate($request, [
            'id_admin' => 'required',
            'id_anggota' => 'required',
            'id_buku' => 'required',
            'status_peminjaman' => 'required|numeric|min:0|max:1'
        ]);


        $id_pinjam = PinjamModel::find($id_pinjam);
        $id_pinjam->id_admin    = $request->id_admin;
        $id_pinjam->id_anggota  = $request->id_anggota;
        $id_pinjam->id_buku     = $request->id_buku;
        
        BukuModel::find($request->id_buku)->update([
            'status_peminjaman' => $request->status_peminjaman
        ]);

        $id_pinjam->save();

        return redirect()->back();
    }
}
