@extends('index')
@section('title', 'Peminjaman')

@section('isihalaman')
<p>
    <h3><center>Data Peminjaman Buku</center><h3>
    <h3><center>Perpustakaan Sukses</center></h3>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPinjamTambah"> 
        Tambah Peminjaman 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>

         <!-- RINCIAN JUDUL KOLOM PADA DATA PEMINJAMAN -->
            <tr>
                <td align="center">No</td>
                <td align="center">ID Pinjam</td>
                <td align="center">Tanggal Peminjaman</td>
                <td align="center">Tanggal Pengembalian</td>
                <td align="center">Nama Admin</td>
                <td align="center">Nama Anggota</td>
                <td align="center">Judul Buku</td>
                <td align="center">Action</td>
            </tr>
        </thead>

        <!-- ISIAN KOLOM DI ATAS -->
        <tbody>
            @foreach ($pinjam as $index=>$p)
        
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td align="center">{{$p->id_peminjaman}}</td>
                    <td>{{$p->tanggal_pinjam}}</td>
                    <td>{{$p->tanggal_kembali}}</td>
                    <td>{{$p->admin->nama_admin}}</td>
                    <td>{{$p->anggota->nama_anggota}}</td>
                    <td>{{$p->buku->judul}}</td>
                    <td align="center">

                    <!-- CODE UNTUK BUTTON EDIT -->
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPinjamEdit{{$p->id_pinjam}}"> 
                            Edit
                        </button>

                        <!-- CODE UNTUK MODAL EDIT PEMINJAMAN -->
                        <div class="modal fade" id="modalPinjamEdit{{$p->id_pinjam}}" tabindex="-1" role="dialog" aria-labelledby="modalPinjamEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPinjamEditLabel">Form Edit Data Peminjaman</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formpinjamedit" id="formpinjamedit" action="/pinjam/edit/{{$p->id_peminjaman}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}

                                            <div class="form-group row">
                                                <label for="id_pinjam" class="col-sm-4 col-form-label">ID Pinjam</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="id_pinjam" name="id_pinjam" value="{{ $p->id_peminjaman}}" readonly>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="admin" class="col-sm-4 col-form-label">Nama Petugas</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_admin" name="id_admin">
                                                        @foreach ($admin as $pt)
                                                            @if ($pt->id_admin == $p->id_admin)
                                                                <option value="{{ $pt->id_admin }}" selected>{{ $pt->nama_admin }}</option>
                                                            @else
                                                                <option value="{{ $pt->id_admin }}">{{ $pt->nama_admin }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="anggota" class="col-sm-4 col-form-label">Nama Anggota</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_anggota" name="id_anggota">
                                                        @foreach ($anggota as $a)
                                                            @if ($a->id_anggota == $p->id_anggota)
                                                                <option value="{{ $a->id_anggota }}" selected>{{ $a->nama_anggota }}</option>
                                                            @else
                                                                <option value="{{ $a->id_anggota }}">{{ $a->nama_anggota }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            
                                            <div class="form-group row">
                                                <label for="judul" class="col-sm-4 col-form-label">Judul Buku</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_buku" name="id_buku">
                                                        @foreach ($buku as $bk)
                                                            @if ($bk->id_buku == $p->id_buku)
                                                                <option value="{{ $bk->id_buku }}" selected>{{ $bk->judul }}</option>
                                                            @else
                                                                <option value="{{ $bk->id_buku }}">{{ $bk->judul }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                           
                                            <div class="form-group row">
                                                <label for="status_peminjaman" class="col-sm-4 col-form-label">Status Peminjaman</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="status_peminjaman" name="status_peminjaman">
                                                    <option value="1" {{ $p->buku->status_peminjaman ? 'selected' : ''}}>Dipinjam</option>
                                                    <option value="0" {{ !$p->buku->status_peminjaman ? 'selected' : ''}}>Tidak dipinjam</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                      <!-- CODE UNTUK BUTTON DELETE BESERTA MESSAGE BOX KONFIRMASI -->  
                        <a href="pinjam/hapus/{{$p->id_pinjam}}" onclick="return confirm('Data peminjaman akan dihapus, lanjutkan?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- CODE UNTUK MENAMBAH DATA PEMINJAMAN -->
    <div class="modal fade" id="modalPinjamTambah" tabindex="-1" role="dialog" aria-labelledby="modalPinjamTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPinjamTambahLabel">Form Pendaftaran Peminjaman</h5>
                </div>
                <div class="modal-body">

                    <form name="formpinjamtambah" id="formpinjamtambah" action="{{route('pinjamtambah')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_admin" class="col-sm-4 col-form-label">Nama Admin</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_admin" name="id_admin" placeholder="Pilih Nama Admin">
                                    <option></option>
                                    @foreach($admin as $pt)
                                        <option value="{{ $pt->id_admin }}">{{ $pt->nama_admin }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="id_anggota" class="col-sm-4 col-form-label">Nama Anggota</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_anggota" name="id_anggota" placeholder="Pilih Nama Anggota">
                                    <option></option>
                                    @foreach($anggota as $a)
                                        <option value="{{ $a->id_anggota }}">{{ $a->nama_anggota }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="id_buku" class="col-sm-4 col-form-label">Judul Buku</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_buku" name="id_buku" placeholder="Pilih Judul Buku">
                                    <option></option>
                                    @foreach($buku as $bk)
                                        <option value="{{ $bk->id_buku }}">{{ $bk->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal_pinjam" class="col-sm-4 col-form-label">Tanggal Peminjaman</label>
                            <div class="col-sm-8">
                                <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal_kembali" class="col-sm-4 col-form-label">Tanggal Pengembalian</label>
                            <div class="col-sm-8">
                                <input type="date" id="tanggal_kembali" name="tanggal_kembali" disabled>
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="pinjamtambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- CODE UNTUK MEMBUAT PEMINJAMAN MAKSIMAL 7 HARI -->
    <script>
        var tanggal_pinjam = document.getElementById("tanggal_pinjam");
        var tanggal_kembali = document.getElementById("tanggal_kembali");

        var date = new Date();
        date.setDate(date.getDate() + 7);
        tanggal_kembali.valueAsDate = date
        tanggal_pinjam.valueAsDate = new Date()

    </script>
    
@endsection