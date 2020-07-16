@extends('layouts.master')

@section('title')
<title>Ubah Data Pelanggan</title>
@endsection

@section('content')

<section class="create" id="create">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <h1 class="mt-4 font-weight-normal">Ubah Data Pelanggan</h1>

        <form method="POST" action="/pelanggan/{{ $pelanggan->id_plgn }}">
            @method('patch')
          @csrf
            <div class="form-row form-group col-md-10 mt-3">
              <label for="nama">Nama</label>
              <input type="text" class="form-control @error('nm_plgn') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" name="nm_plgn" value="{{ $pelanggan->nm_plgn }}">
              @error('nm_plgn')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-row form-group col-md-10">
              <label for="no_telp">Nomor Telepon</label>
              <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="Masukkan Nomor Telepon" name="no_telp" value="{{ $pelanggan->no_telp }}">
              @error('no_telp')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-row form-group col-md-10">
              <label for="email">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Email" value="{{ $pelanggan->email }}">
              @error('email') <div class="invalid-feedback">{{$message}}</div> @enderror
            </div>
            <div class="form-row form-group col-md-10">
              <label for="alamat">Alamat</label>
              <textarea class="form-control" id="alamat"  name="alamat" rows="3" placeholder="Masukkan Alamat (optional)">{{ $pelanggan->alamat }}</textarea>
            </div>

          <button type="submit" class="btn btn-primary mx-5 mb-3">Ubah</button>
          <a href="/pelanggan" class="btn btn-info mx-5 mb-3">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection