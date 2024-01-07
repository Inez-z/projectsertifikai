@extends('index')
@section('title', 'Buku')

@section('isihalaman')
<p>
    <h3><center>Daftar Buku Perpustakaan Sukses</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBukuTambah"> 
        Tambah Buku 
    </button>

    <p>
    <table class="table table-bordered table-striped";>
        <thead>
            
        <!-- RINCIAN JUDUL KOLOM PADA DATA KATALOG -->
            <tr>
                <td align="center">No</td>
                <td align="center">ID Buku</td>
                <td align="center">Judul Buku</td>
                <td align="center">Pengarang</td>
                <td align="center">Tahun</td>
                <td align="center">Cover</td>
                <td align="center">Jumlah Stok</td>
                <td align="center">Action</td>
            </tr>
        </thead>

        <!-- ISIAN KOLOM DI ATAS -->
        <tbody>
            @foreach ($databuku as $index=>$bk)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$bk->id_buku}}</td>
                    <td>{{$bk->judul}}</td>
                    <td>{{$bk->pengarang}}</td>
                    <td>{{$bk->tahun}}</td>
                    <td><img src="{{url('storage/images/' . $bk->cover)}}"></td>
                    <td>{{$bk->stok}}</td>
                    <td align="center">
                        
                        <!-- CODE UNTUK BUTTON DELETE BESERTA MESSAGE BOX KONFIRMASI -->
                        <a href="buku/hapus/{{$bk->id_buku}}" onclick="return confirm('Buku akan dihapus, lanjutkan?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- MENAMBAH DATA BUKU -->
    <div class="modal fade" id="modalBukuTambah" tabindex="-1" role="dialog" aria-labelledby="modalBukuTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBukuTambahLabel">Form Pendaftaran Buku</h5>
                </div>
                <div class="modal-body">
                    <form name="formbukutambah" id="formbukutambah" action="/buku/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_buku" class="col-sm-4 col-form-label">Kode Buku</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kode_buku" name="kode_buku" placeholder="Masukan Kode Buku">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="judul" class="col-sm-4 col-form-label">Judul Buku</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul Buku">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="pengarang" class="col-sm-4 col-form-label">Nama Pengarang</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Masukan Nama Pengarang">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="tahun" class="col-sm-4 col-form-label">Tahun Terbit</label>
                            <div class="col-sm-8">
                                <input type="year" class="form-control" id="tahun" name="tahun" placeholder="Masukan Tahun Terbit">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="cover" class="col-sm-4 col-form-label">Cover Buku</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control-file" id="cover" name="cover">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="stok" class="col-sm-4 col-form-label">Stok Buku</label>
                            <div class="col-sm-8">
                                <input type="int" class="form-control-file" id="stok" name="stok">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="bukutambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection