<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;
    public $table        = "tbl_buku";
    protected $primaryKey   = "id_buku";

    protected $casts = [
        'status_peminjaman' => 'bool'
    ];

    protected $fillable     = ['id_buku','kode_buku','judul','pengarang','tahun','cover','stok', 'status_peminjaman'];


    public function peminjaman() {
        return $this->hasMany(PinjamModel::class, 'id_buku');
    }

}