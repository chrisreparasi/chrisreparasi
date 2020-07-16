@extends('layouts.master')

@section('title')
<title>Tambah Data Barang</title>
@endsection

@section('content')

<section class="create" id="create">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <h1 class="mt-4 font-weight-normal">Tambah Data Barang</h1>

        <form method="POST" action="/barang">
          @csrf
          
          <div class="form-row mt-4 mb-3">
            <div class="col-md-6">
              <select value="{{ old('id_plgn') }}" name="id_plgn" class="form-control @error('id_plgn') is-invalid @enderror" id="id_plgn">
                <option selected disabled>Pilih Pelanggan</option>
                @foreach($pelanggan as $plgn)
                  <option value="{{ $plgn->id_plgn }}">ID {{ $plgn->id_plgn }} ({{ $plgn->nm_plgn }})</option>
                @endforeach
              </select>
              @error('id_plgn')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6">
              <select value="{{ old('id_krywn') }}" name="id_krywn" class="form-control @error('id_krywn') is-invalid @enderror" id="id_krywn">
                <option selected disabled>Pilih Karyawan</option>
                @foreach($karyawan as $krywn)
                  <option value="{{ $krywn->id_krywn }}">ID {{ $krywn->id_krywn }} ({{ $krywn->nm_krywn }})</option>
                @endforeach
              </select>
              @error('id_krywn')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nama_barang">Nama Barang</label>
              <select class="form-control @error('nm_brg') is-invalid @enderror" id="nm_brg" value="{{ old('nm_brg') }}" name="nm_brg" onchange="changeDropdown(this.value);">
                <option value="pilih" selected disabled>---Pilih Nama Barang---</option>
                <option value="Tas Ransel">Tas Ransel (Backpack)</option>
                <option value="Tas Slempang">Tas Slempang (Slingbag)</option>
                <option value="Tas Tangan">Tas Tangan (Handbag)</option>
                <option value="Tas Travelling">Tas Berpergian (Travellingbag)</option>
                <option value="Tas Jinjing">Tas Jinjing (Totebag)</option>
                <option value="Tas Pinggang">Tas Pinggang (Waistbag)</option>
                <option value="Sepatu Pantofel">Sepatu Pantofel</option>
                <option value="Sepatu Sports">Sepatu Sports</option>
                <option value="Sepatu Boots">Sepatu Boots</option>
                <option value="Sepatu Datar">Sepatu Datar (Flatshoes)</option>
                <option value="Sepatu Slip-on">Sepatu Slip-on</option>
                <option value="Sepatu Sneakers">Sepatu Sneakers</option>
                <option value="Sepatu Wedges/Heels">Sepatu Wedges/Heels</option>
                <option value="Koper Bahan Kuis">Koper Bahan Kuis</option>
                <option value="Koper Tempurung">Koper Tempurung</option>
                <option value="Koper Kayu">Koper Kayu</option>
                <option value="lainnya">Lainnya</option>
              </select>
              @error('nm_brg')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group col-md-6 d-flex align-items-end">
              <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" value="{{ old('nm_brg') }}" name="nm_brg" disabled>
              @error('nama_barang')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="uk_brg">Ukuran Barang</label>
              <select class="form-control @error('uk_brg') is-invalid @enderror" id="uk_brg" name="uk_brg" value="{{ old('uk_brg') }}">
                <option selected disabled>---Pilih Ukuran Barang---</option>
                <option value="Kecil">Kecil</option>
                <option value="Sedang">Sedang</option>
                <option value="Besar">Besar</option>
              </select>
              @error('uk_brg')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="jns_prbkn">Jenis Perbaikan</label>
              <input type="text" class="form-control @error('jns_prbkn') is-invalid @enderror" name="jns_prbkn" id="jns_prbkn" value="{{ old('jns_prbkn') }}" placeholder="Masukkan Jenis Perbaikan">
              @error('jns_prbkn')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="status">Status</label>
              <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="{{ old('status') }}">
                <option selected disabled>---Pilih Status---</option>
                <option value="Proses">Proses</option>
                <option value="Selesai">Selesai</option>
              </select>
              @error('status')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="harga">Harga</label>
              <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" placeholder="Masukkan Harga" value="{{ old('harga') }}">
              @error('harga')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="tgl_masuk">Tanggal Masuk</label>
              <input min="2000-01-01" name="tgl_masuk" id="tgl_masuk" value="{{ old('tgl_masuk') }}" type="date" class="form-control @error('tgl_masuk') is-invalid @enderror">
              @error('tgl_masuk')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="tgl_keluar">Tanggal Keluar</label>
              <input min="2000-01-01" name="tgl_keluar" id="tgl_keluar" value="{{ old('tgl_keluar') }}" type="date" class="form-control @error('tgl_keluar') is-invalid @enderror">
              @error('tgl_keluar')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
          </div>

          <button type="submit" class="btn btn-primary mx-5 my-3">Submit</button>
          <a href="/barang" class="btn btn-info mr-5 my-3">Tidak Input Barang</a>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection

@section('script')
<script>
  function changeDropdown(){
    var state=document.getElementById("nm_brg").value;
    if( state == "lainnya" ){
      document.getElementById("nama_barang").disabled=false;
    }else{
      document.getElementById("nama_barang").disabled=true;
      $('#nama_barang').val(''); //valuenya menjadi kosong
    }
  }
</script>
@endsection