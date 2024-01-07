@extends('index')
@section('title', 'Admin')

@section('isihalaman')
<p>
    <h3><center>Admin Perpustakaan Sukses</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPetugasTambah"> 
        Tambah Admin 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>

         <!-- RINCIAN JUDUL KOLOM PADA DATA ADMIN -->
            <tr>
                <td align="center">No</td>
                <td align="center">ID Admin</td>
                <td align="center">Nama Admin</td>
                <td align="center">Email Admin</td>
                <td align="center">Password</td>
                <td align="center">Action</td>
            </tr>
        </thead>

        <!-- ISIAN KOLOM DI ATAS -->
        <tbody>
            @foreach ($dataadmin as $index=>$p)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$p->id_admin}}</td>
                    <td>{{$p->nama_admin}}</td>
                    <td>{{$p->email_admin}}</td>
                    <td>{{$p->password}}</td>
                    <td align="center">
                        
                        <!-- CODE UNTUK BUTTON DELETE BESERTA MESSAGE BOX KONFIRMASI -->
                        <a href="admin/hapus/{{$p->id_admin}}" onclick="return confirm('Data admin akan dihapus, lanjutkan?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Awal Modal tambah data Petugas -->
    <div class="modal fade" id="modalPetugasTambah" tabindex="-1" role="dialog" aria-labelledby="modalPetugasTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPetugasTambahLabel">Form Pendaftaran Admin</h5>
                </div>
                <div class="modal-body">
                    <form name="formpetugastambah" id="formpetugastambah" action="/admin/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_admin" class="col-sm-4 col-form-label">Nama Admin</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_admin" name="nama_admin" placeholder="Masukan Nama Admin">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="email_admin" class="col-sm-4 col-form-label">Email Admin</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="email_admin" name="email_admin" placeholder="Masukan Email Admin">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="password" name="password" placeholder="Masukan Password">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="petugastambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data buku -->
    
@endsection