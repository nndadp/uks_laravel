@extends('layouts.master');

<?php $i=0; ?>

@section('content')
<div class="card mb-4 py-4">
    <h2 style="text-align: center">Daftar Pengunjung</h2>
    <button width="0%"class="btn btn-primary" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalTambahObat">Tambah Pengunjung</button>
<div class="card-body">

    <table class="table table-bordered">
        <tr>
            <td>No</td>
            <td>NIS</td>
            <td>Nama</td>
            <td>Rombel</td>
            <td>Rayon</td>
            <td>Aksi</td>
        </tr>
        @foreach ($pengunjung as $p)
        <tr>
            <td>{{ ++$i}}</td>
            <td>{{$p->nis}}</td>
            <td>{{$p->nama}}</td>
            <td>{{$p->rombel}}</td>
            <td>{{$p->rayon}}</td>
            <td>
                <form action="{{ route('pengunjung.destroy', $p->id) }}" method="POST">
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$p->id}}">Edit</a>
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus {{$p->nama_merk}} ?')">Hapus</button>
                    @csrf
                    @method('DELETE')
                    </form>
            </td>
        </tr>

        <div class="modal fade" id="modalUpdate{{$p->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Edit Pengunjung</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('pengunjung.update', $p->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @method('PUT')
                        <div class="mb-3">
                          <label for="NIS" class="form-label">NIS</label>
                          <input required type="number" min="0" name="nama_merk" class="form-control" id="NIS" placeholder="" value={{$p->nis}}>
                        </div>
                        <div class="mb-3">
                          <label for="Nama" class="form-label">Nama</label>
                          <input required type="text" name="jenis_obat" class="form-control" id="Nama" placeholder="" value={{$p->nama}}>
                        </div>
                        <div class="mb-3">
                          <label for="Nama" class="form-label">Rombel</label>
                          <input required type="text" name="fungsi_obat" class="form-control" id="Nama" placeholder="" value={{$p->rombel}}>
                        </div>
                        <div class="mb-3">
                          <label for="Nama" class="form-label">Rayon</label>
                          <input required type="text" name="stok_obat" class="form-control" id="Nama" placeholder="" value={{$p->rayon}}>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
              
                </div>
              </div>
            </div>
          @endforeach
          
      </tbody>
    </table>
    </div>

    <div class="modal fade" id="modalTambahObat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Tambah Pengunjung</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('pengunjung.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="mb-3">
                    <label for="nis" class="form-label">NIS</label>
                    <input required type="number" name="nis" class="form-control" id="nis" placeholder="">
                  </div>
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input required type="text" name="nama" class="form-control" id="nama" placeholder="">
                  </div>
                  <div class="mb-3">
                    <label for="rombel" class="form-label">rombel</label>
                    <input required type="text" name="rombel" class="form-control" id="rombel" placeholder="">
                  </div>
                  <div class="mb-3">
                    <label for="rayon" class="form-label">Rayon</label>
                    <input required type="text" name="rayon" class="form-control" id="rayon" placeholder="">
                  </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
                
              </div>
            </div>
          </div>
        @endsection
                