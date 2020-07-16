@extends('layouts.master')

@section('title')
<title>Ubah Data Karyawan</title>
@endsection

@section('content')

<section class="create" id="create">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <h1 class="mt-4 font-weight-normal">Ubah Data Karyawan</h1>

        <form method="POST" action="/karyawan/{{ $karyawan->id_krywn }}">
        @method('patch')
          @csrf
            <div class="form-row form-group col-md-10 mt-3">
                <label for="nm_krywn">Nama Karyawan</label>
                <input type="text" class="form-control @error('nm_krywn') is-invalid @enderror" id="nm_krywn" placeholder="Masukkan Nama Karyawan" name="nm_krywn" value="{{ $karyawan->nm_krywn }}">
                @error('nm_krywn')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-row form-group col-md-10">
                <label for="telp_krywn">Nomor Telepon Karyawan</label>
                <input type="text" class="form-control @error('telp_krywn') is-invalid @enderror" id="telp_krywn" placeholder="Masukkan Nomor Telepon Karyawan" name="telp_krywn" value="{{ $karyawan->telp_krywn }}">
                @error('telp_krywn')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-row form-group col-md-10">
                <label for="email_krywn">Email Karyawan</label>
                <input type="email" class="form-control @error('email_krywn') is-invalid @enderror" id="email_krywn" placeholder="Masukkan Email Karyawan" name="email_krywn" value="{{ $karyawan->email_krywn }}">
                @error('email_krywn')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-row form-group col-md-10">
                <label for="tugas">Tugas Karyawan</label>
                <input type="text" class="form-control @error('tugas') is-invalid @enderror" id="tugas" placeholder="Masukkan Tugas Karyawan" name="tugas" value="{{ $karyawan->tugas }}">
                @error('tugas')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            
          <button type="submit" class="btn btn-primary mx-5 mb-3">Submit</i></button>
          <a href="/karyawan" class="btn btn-info mx-5 mb-3">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection