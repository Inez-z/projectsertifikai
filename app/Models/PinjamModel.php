<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamModel extends Model
{
    use HasFactory;
    public $table        = "tbl_peminjaman";
    protected $primaryKey   = "id_peminjaman";
    protected $casts = [
        'tanggal_pinjam' => 'date',
        'tanggal_kembali' => 'date'
    ];
    protected $fillable     = ['id_pinjam','id_admin','id_anggota','id_buku','tanggal_pinjam','tanggal_kembali'];

    //relasi ke petugas
    public function admin()
    {
        return $this->belongsTo('App\Models\PetugasModel', 'id_admin');
    }

    //relasi ke siswa
    public function anggota()
    {
        return $this->belongsTo('App\Models\AnggotaModel', 'id_anggota');
    }

    //relasi ke buku
    public function buku()
    {
        return $this->belongsTo('App\Models\BukuModel', 'id_buku');
    }
}