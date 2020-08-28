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
                  <option value="{{ $plgn->id_plgn }}" {{ (old('id_plgn') == $plgn->id_plgn ? "selected":"") }}>ID {{ $plgn->id_plgn }} ({{ $plgn->nm_plgn }})</option>
                @endforeach
              </select>
              @error('id_plgn')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6">
              <select value="{{ old('id_krywn') }}" name="id_krywn" class="form-control @error('id_krywn') is-invalid @enderror" id="id_krywn">
                <option selected disabled>Pilih Karyawan</option>
                @foreach($karyawan as $krywn)
                  <option value="{{ $krywn->id_krywn }}" {{ (old('id_krywn') == $krywn->id_krywn ? "selected":"") }}>ID {{ $krywn->id_krywn }} ({{ $krywn->nm_krywn }} - {{ $krywn->tugas }})</option>
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
                <option value="Tas Ransel" {{ (old('nm_brg') == "Tas Ransel" ? "selected":"") }}>Tas Ransel (Backpack)</option>
                <option value="Tas Slempang" {{ (old('nm_brg') == "Tas Slempang" ? "selected":"") }}>Tas Slempang (Slingbag)</option>
                <option value="Tas Tangan" {{ (old('nm_brg') == "Tas Tangan" ? "selected":"") }}>Tas Tangan (Handbag)</option>
                <option value="Tas Travelling" {{ (old('nm_brg') == "Tas Travelling" ? "selected":"") }}>Tas Berpergian (Travellingbag)</option>
                <option value="Tas Jinjing" {{ (old('nm_brg') == "Tas Jinjing" ? "selected":"") }}>Tas Jinjing (Totebag)</option>
                <option value="Tas Pinggang" {{ (old('nm_brg') == "Tas Pinggang" ? "selected":"") }}>Tas Pinggang (Waistbag)</option>
                <option value="Sepatu Pantofel" {{ (old('nm_brg') == "Sepatu Pantofel" ? "selected":"") }}>Sepatu Pantofel</option>
                <option value="Sepatu Sports" {{ (old('nm_brg') == "Sepatu Sports" ? "selected":"") }}>Sepatu Sports</option>
                <option value="Sepatu Boots" {{ (old('nm_brg') == "Sepatu Boots" ? "selected":"") }}>Sepatu Boots</option>
                <option value="Sepatu Datar" {{ (old('nm_brg') == "Sepatu Datar" ? "selected":"") }}>Sepatu Datar (Flatshoes)</option>
                <option value="Sepatu Slip-on" {{ (old('nm_brg') == "Sepatu Slip-on" ? "selected":"") }}>Sepatu Slip-on</option>
                <option value="Sepatu Sneakers" {{ (old('nm_brg') == "Sepatu Sneakers" ? "selected":"") }}>Sepatu Sneakers</option>
                <option value="Sepatu Wedges/Heels" {{ (old('nm_brg') == "Sepatu Wedges/Heels" ? "selected":"") }}>Sepatu Wedges/Heels</option>
                <option value="Koper Bahan" {{ (old('nm_brg') == "Koper Bahan" ? "selected":"") }}>Koper Bahan</option>
                <option value="Koper Tempurung" {{ (old('nm_brg') == "Koper Tempurung" ? "selected":"") }}>Koper Tempurung</option>
                <option value="Koper Kayu" {{ (old('nm_brg') == "Koper Kayu" ? "selected":"") }}>Koper Kayu</option>
                <option value="lainnya" {{ (old('nm_brg') == "lainnya" ? "selected":"") }}>Lainnya</option>
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
                <option value="Kecil" {{ (old('uk_brg') == "Kecil" ? "selected":"") }}>Kecil</option>
                <option value="Sedang" {{ (old('uk_brg') == "Sedang" ? "selected":"") }}>Sedang</option>
                <option value="Besar" {{ (old('uk_brg') == "Besar" ? "selected":"") }}>Besar</option>
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
                <option value="Proses" {{ (old('status') == "Proses" ? "selected":"") }}>Proses</option>
                <option value="Selesai" {{ (old('status') == "Selesai" ? "selected":"") }}>Selesai</option>
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

          <button type="submit" class="btn btn-primary mx-5 my-3">Tambah</button>
          <a href="/barang" class="btn btn-info mr-5 my-3">Kembali</a>
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