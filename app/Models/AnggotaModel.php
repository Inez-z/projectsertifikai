<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaModel extends Model
{
    use HasFactory;
    public $table        = "tbl_anggota";
    protected $primaryKey   = "id_anggota";
    protected $fillable     = ['id_anggota','nim','nama_anggota','email_anggota'];
}