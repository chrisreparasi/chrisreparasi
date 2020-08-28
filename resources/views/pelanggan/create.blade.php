@extends('layouts.master')

@section('title')
<title>Tambah Data Pelanggan</title>
@endsection

@section('content')

<section class="create" id="create">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <h1 class="mt-4 font-weight-normal">Tambah Data Pelanggan Baru</h1>

        <form method="POST" action="/pelanggan">
          @csrf
            <div class="form-row form-group col-md-10 mt-3">
              <label for="nama">Nama Pelanggan Baru</label>
              <input type="text" class="form-control @error('nm_plgn') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" name="nm_plgn" value="{{ old('nm_plgn') }}">
              @error('nm_plgn')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-row form-group col-md-10">
              <label for="no_telp">Nomor Telepon Pelanggan Baru</label>
              <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="Masukkan Nomor Telepon" name="no_telp" value="{{ old('no_telp') }}">
              @error('no_telp')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-row form-group col-md-10">
              <label for="email">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Email" value="{{ old('email') }}">
              @error('email') <div class="invalid-feedback">{{$message}}</div> @enderror
            </div>
            <div class="form-row form-group col-md-10">
                <label for="alamat">Alamat Pelanggan Baru</label>
                <textarea class="form-control" id="alamat"  name="alamat" rows="3" placeholder="Masukkan Alamat (optional)">{{ old('alamat') }}</textarea>
            </div>

            <div class="modal fade" id="tambah-barang" aria-hidden="true">
              <div class="modal-dialog ">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modal-judul">Tambah Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      <strong>Apakah anda ingin menambah data barang?</strong>
                  </div>
                  <div class="modal-footer">
                    <a href="/barang/create" class="btn btn-info">Ya, tambah data barang</a>
                    <button type="submit" class="btn btn-danger">Tidak</button>
                  </div>
                </div>
              </div>
            </div>
          <button type="submit" class="btn btn-primary mx-5 mb-3">Tambah</i></button>
          <a href="/pelanggan" class="btn btn-info mx-5 mb-3">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection