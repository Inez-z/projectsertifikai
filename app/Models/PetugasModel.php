<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetugasModel extends Model
{
    use HasFactory;
    public $table        = "tbl_admin";
    protected $primaryKey   = "id_admin";
    protected $fillable     = ['id_admin','nama_admin','email_admin','password'];
}