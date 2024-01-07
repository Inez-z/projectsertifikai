<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

//Route untuk Data Buku
Route::get('/buku', 'BukuController@bukutampil');
Route::post('/buku/tambah','BukuController@bukutambah');
Route::get('/buku/hapus/{id_buku}','BukuController@bukuhapus');
Route::put('/buku/edit/{id_buku}', 'BukuController@bukuedit');

Route::get('/homepage', function(){return view('view_homepage');});

//Route untuk Data Anggota
Route::get('/anggota', 'AnggotaController@anggotatampil');
Route::get('/anggota/tambah', 'AnggotaController@anggotatampil');
Route::post('/anggota/tambah', 'AnggotaController@anggotatambah');
Route::get('/anggota/hapus/{id_anggota}', 'AnggotaController@anggotahapus');
Route::put('/anggota/edit/{id_anggota}', 'AnggotaController@anggotaedit');

//Route untuk Data Admin
Route::get('/admin', 'PetugasController@petugastampil');
Route::post('/admin/tambah', 'PetugasController@petugastambah');
Route::get('/admin/hapus/{id_admin}', 'PetugasController@petugashapus');
Route::put('/admin/edit/{id_admin}', 'PetugasController@petugasedit');

//Route untuk Data Peminjaman
Route::get('/pinjam', 'PinjamController@pinjamtampil');
Route::post('/pinjam/tambah','PinjamController@pinjamtambah')->name('pinjamtambah');
Route::get('/pinjam/hapus/{id_pinjam}','PinjamController@pinjamhapus');
Route::put('/pinjam/edit/{id_pinjam}', 'PinjamController@pinjamedit');