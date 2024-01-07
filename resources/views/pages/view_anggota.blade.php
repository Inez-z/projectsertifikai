@extends('index')
@section('title', 'Anggota')

@section('isihalaman')
<p>
    <h3><center>Daftar Anggota Perpustakaan Sukses</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAnggotaTambah"> 
        Tambah Anggota 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>

         <!-- RINCIAN JUDUL KOLOM PADA DATA ANGGOTA -->
            <tr>
                <td align="center">No</td>
                <td align="center">ID Anggota</td>
                <td align="center">NIM</td>
                <td align="center">Nama Anggota</td>
                <td align="center">Email</td>
                <td align="center">Action</td>
            </tr>
        </thead>

        <!-- ISIAN KOLOM DI ATAS -->
        <tbody>
            @foreach ($dataanggota as $index=>$a)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$a->id_anggota}}</td>
                    <td>{{$a->nim}}</td>
                    <td>{{$a->nama_anggota}}</td>
                    <td>{{$a->email_anggota}}</td>
                    <td align="center">
                        

                        <!-- CODE UNTUK BUTTON DELETE BESERTA MESSAGE BOX KONFIRMASI -->
                        <a href="anggota/hapus/{{$a->id_anggota}}" onclick="return confirm('Anggota akan dihapus, lanjutkan?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Awal Modal tambah data anggota -->
    <div class="modal fade" id="modalAnggotaTambah" tabindex="-1" role="dialog" aria-labelledby="modalAnggotaTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAnggotaTambahLabel">Form Pendaftaran Anggota</h5>
                </div>
                <div class="modal-body">
                    <form name="formanggotatambah" id="formanggotatambah" action="/anggota/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_anggota" class="col-sm-4 col-form-label">NIM</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukan NIM">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="nama_anggota" class="col-sm-4 col-form-label">Nama Anggota</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" placeholder="Masukan Nama Anggota">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="email_anggota" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="email_anggota" name="email_anggota" placeholder="Masukan Email Anggota">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="anggotatambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data buku -->
    
@endsection