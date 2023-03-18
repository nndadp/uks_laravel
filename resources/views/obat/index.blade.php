@extends('layouts.master');

<?php $i=0; ?>

@section('content')
<div class="card mb-4 py-4">
    <h2 style="text-align: center">Daftar Obat</h2>
    <button width="0%"class="btn btn-primary" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalTambahObat">Tambah Obat</button>
<div class="card-body">
    {{-- <button type="button" class="btn btn-primary" disabled>Tambah Obat</button>
<div class="card-body"> --}}

<table class="table table-bordered">
    <tr>
        <td>NO</td>
        <td>Merk</td>
        <td>Jenis Obat</td>
        <td>Fungsi Obat</td>
        <td>Stok</td>
        <td>Aksi</td>
    </tr>
    @foreach ($obat as $skt)
    <tr>
        <td>{{ ++$i}}</td>
        <td>{{ $skt->nama_merk}}</td>
        <td>{{$skt->jenis_obat}}</td>
        <td>{{$skt->fungsi_obat}}</td>
        <td>{{$skt->stok_obat}}</td>
        <td>
            <form action="{{ route('obat.destroy', $skt->id) }}" method="POST">
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$skt->id}}">Ubah</a>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus {{$skt->nama_merk}} ?')">Hapus</button>
                @csrf
                @method('DELETE')
                </form>
        </td>
    </tr>

    <div class="modal fade" id="modalUpdate{{$skt->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Tambah Obat</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
          
                <form action="{{ route('obat.update', $skt->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  
                  @method('PUT')
                <div class="mb-3">
                  <label for="NIS" class="form-label">Merk Obat</label>
                  <input required type="text" name="nama_merk" class="form-control" id="NIS" placeholder="" value={{$skt->nama_merk}}>
                </div>
                <div class="mb-3">
                  <label for="Nama" class="form-label">Jenis Obat</label>
                  <select required class="form-select" name="jenis_obat" id="jenisObat">
                    <option selected value="">--Pilih--</option>
                    <option value="Cair">Cair</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Kapsul">Kapsul</option>
                    <option value="Oles">Oles</option>
                    <option value="Suppositoria">Suppositoria</option>
                    <option value="Tetes">Tetes</option>
                    <option value="Inhaler">Inhaler</option>
                    <option value="Suntik">Suntik</option>
                    <option value="Tempel">Tempel</option>
                </select>

                </div>
                <div class="mb-3">
                  <label for="Nama" class="form-label">Fungsi Obat</label>
                  <input required type="text" name="fungsi_obat" class="form-control" id="Nama" placeholder="" value={{$skt->fungsi_obat}}>
                </div>
                <div class="mb-3">
                  <label for="Nama" class="form-label">Stok Obat</label>
                  <input required type="number" min="0" name="stok_obat" class="form-control" id="Nama" placeholder="" value={{$skt->stok_obat}}>
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
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Obat</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="{{ route('obat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="mb-3">
            <label for="namaObat" class="form-label">Nama Obat</label>
            <input required type="text" name="nama_merk" class="form-control" id="namaObat" placeholder="xxx">
          </div>
          <div class="mb-3">
            <select required class="form-select" name="jenis_obat" id="jenisObat">
                <option selected value="">--Pilih--</option>
                <option value="Cair">Cair</option>
                <option value="Tablet">Tablet</option>
                <option value="Kapsul">Kapsul</option>
                <option value="Oles">Oles</option>
                <option value="Suppositoria">Suppositoria</option>
                <option value="Tetes">Tetes</option>
                <option value="Inhaler">Inhaler</option>
                <option value="Suntik">Suntik</option>
                <option value="Tempel">Tempel</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="fungsiObat" class="form-label">Fungsi Obat</label>
            <input required type="text" name="fungsi_obat" class="form-control" id="fungsiObat" placeholder="xxx">
          </div>
          <div class="mb-3">
            <label for="stokObat" class="form-label">Stok Obat</label>
            <input required type="number" min="0" name="stok_obat" class="form-control" id="stokObat" placeholder="xxx">
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
        
  </table>