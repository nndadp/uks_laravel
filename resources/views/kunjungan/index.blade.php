@extends('layouts.master');

<?php $i=0; ?>

@section('content')
<div class="card mb-4 py-4">
    <h2 style="text-align: center">Daftar Pengunjung</h2>
    <button width="0%"class="btn btn-primary" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalTambahObat">Tambah Pengunjung</button>
<div class="card-body">

<table class="table table-bordered">
    <tr>
        <td>NO</td>
        <td>NIS</td>
        <td>Tanggal Kunjungan</td>
        <td>Keperluan</td>
        <td>Nama Obat</td>
        <td>Jumlah Obat</td>
        <td>Aksi</td>
    </tr>
    @foreach ($kunjungan as $a)
    <tr>
        <td>{{ ++$i}}</td>
        <td>{{$a->nis}}</td>
        <td>{{$a->tgl_kunjungan}}</td>
        <td>{{$a->keperluan}}</td>
        <td>{{$a->nama_obat}}</td>
        <td>{{$a->jumlah_obat}}</td>
        <td>
            <form action="{{ route('kunjungan.destroy', $a->id) }}" method="POST">
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$a->id}}">Edit</a>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus {{$a->nama_merk}} ?')">Hapus</button>
                @csrf
                @method('DELETE')
                </form>
        </td>
    </tr>

    <div class="modal fade" id="modalUpdate{{$a->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Tambah Kunjungan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
          
                <form action="{{ route('kunjungan.update', $a->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                
                  @method('PUT')
                <div class="mb-3">
                  <label for="NIS" class="form-label">NIS</label>
                  <input required type="number" min="0" name="nis" class="form-control" id="NIS" placeholder="" value={{$a->nis}}>
                </div>
                <div class="mb-3">
                  <label for="tgl_kunjungan" class="form-label">Tanggal Kunjungan</label>
                  <input required type="date" name="tgl_kunjungan" class="form-control" id="tgl_kunjungan" placeholder="" value={{$a->tgl_kunjungan}}>
                </div>
                <div class="mb-3">
                    <label for="keperluan" class="form-label">Keperluan</label>
                    <input required type="radio" name="keperluan" class="form-check-inout" value="butuh obat" onclick="enableBtn(this)">
                    <label for="">Butuh Obat</label>
                    <input required type="radio" name="keperluan" class="form-check-inout" value="Istirahat" onclick="disableBtn(this)">
                    <label for="">Istirahat</label>
                  </div>
                <div class="mb-3">
                  <label for="Nama" class="form-label">Nama Obat</label>
                  <select class="form-select" required name="nama_obat" id="ifselect">
                    <option value="" selected>-</option>
                    @foreach($obat as $o)
                    <option value="{{$o->name_merk}}">{{$o->name_merk}},stok:{{$o->stok_obat}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                    <label for="Nama" class="form-label">Jumlah Obat</label>
                    <input required type="number" min="0" name="jumlah_obat" class="form-control" id="Nama" placeholder="" value={{$a->jumlah_obat}}>
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
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Kunjungan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="{{ route('kunjungan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input required type="number" name="nis" class="form-control" id="nis" placeholder="xxx">
              </div>
          </div>
          <div class="mb-3">
            <label for="tgl_kunjungan" class="form-label">Tanggal Kunjungan</label>
            <input required type="date"  name="tgl_kunjungan" class="form-control" id="tgl_kunjungan" placeholder="xxx">
          </div>
          <div class="mb-3">
            <label for="keperluan" class="form-label">Keperluan</label>
            <input required type="radio" name="keperluan" class="form-check-inout" value="butuh obat" onclick="enableBtn(this)">
            <label for="">Butuh Obat</label>
            <input required type="radio" name="keperluan" class="form-check-inout" value="Istirahat" onclick="disableBtn(this)">
            <label for="">Istirahat</label>
          </div>
          <div class="mb-3">
            <label for="Nama" class="form-label">Nama Obat</label>
            <select class="form-select" required name="nama_obat" id="ifselect">
              <option value="" selected>-</option>
              @foreach($obat as $o)
              <option value="{{$o->nama_merk}}">{{$o->nama_merk}}   stok:{{$o->stok_obat}}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="jumlah_obat" class="form-label">Jumlah Obat</label>
            <input required type="number" min="0" name="jumlah_obat" class="form-control" id="jumlah_obat" placeholder="xxx">
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
      </div>
      </div>
    </div>
  </div>
</table>

  <script>
    function disableBtn(){
        document.getElementById("aya").disabled = true;
        document.getElementById("eweh").disabled = true;
    }

    function enableBtn(){
        document.getElementById("aya").disabled = false;
        document.getElementById("eweh").disabled = false;
    }
@endsection
        

