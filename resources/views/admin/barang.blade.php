@extends('layouts.master')

@section('title')
<title>Data Barang</title>
@endsection

@section('content')
<section class="barang" id="barang">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2 class="text-center font-weight-normal">DATA BARANG</h2>
      </div>
      <div class="card-body">

        @if ( session('status') )
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif
        @if ( session('hapus') )
          <div class="alert alert-danger">
            {{ session('hapus') }}
          </div>
        @endif

        <a href="javascript:void(0)" class="btn btn-info" id="tombol-tambah">Tambah Data Barang</a>
        <br><br>
        <table class="table table-striped table-sm display nowrap" style="width:100%" id="tabel_barang">
          <thead class="thead-dark text-center">
            <tr>
              <th>No.</th>
              <th>ID<br>Pelanggan</th>
              <th>ID<br>Karyawan</th>
              <th>ID<br>Barang</th>
              <th>Nama<br>Barang</th>
              <th>Ukuran<br>Barang</th>
              <th>Jenis<br>Perbaikan</th>
              <th>Harga</th>
              <th>Status</th>
              <th>Tanggal<br>Masuk</th>
              <th>Tanggal<br>Keluar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          @foreach( $barang as $brg )
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>
                <div class="modal fade" id="detail-pelanggan{{$brg->id_plgn}}" aria-hidden="true">
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modal-judul">Detail Pelanggan</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <strong>ID Pelanggan : {{ $brg->id_plgn }}<br>Nama Pelanggan : {{ $brg->nm_plgn }}</strong>
                      </div>
                      <div class="modal-footer">
                      </div>
                    </div>
                  </div>
                </div>
                <a href="" data-toggle="modal" data-target="#detail-pelanggan{{$brg->id_plgn}}" data-id="{{$brg->id_plgn}}">{{ $brg->id_plgn }}</a>
              </td>
              <td>
                <div class="modal fade" id="detail-karyawan{{$brg->id_krywn}}" aria-hidden="true">
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modal-judul">Detail Karyawan</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <strong>ID Karyawan : {{ $brg->id_krywn }}<br>Nama Karyawan : {{ $brg->nm_krywn }}</strong>
                      </div>
                      <div class="modal-footer">
                      </div>
                    </div>
                  </div>
                </div>
                <a href="" data-toggle="modal" data-target="#detail-karyawan{{$brg->id_krywn}}" data-id="{{$brg->id_krywn}}">{{ $brg->id_krywn }}</a>
              </td>
              <td>{{ $brg->id_brg }}</td>
              <td>{{ $brg->nm_brg }}</td>
              <td>{{ $brg->uk_brg }}</td>
              <td>{{ $brg->jns_prbkn }}</td>
              <td>{{ 'Rp'.number_format($brg->harga, '0', ',', '.') }}</td>
              <td>{{ $brg->status }}</td>
              <td>{{ $brg->tgl_masuk }}</td>
              <td>{{ $brg->tgl_keluar }}</td>
              <td>
                <a href="barang/{{ $brg->id_brg }}/edit" class="btn btn-info"><i class="far fa-edit"></i></a>                  
                <div class="modal fade" id="hapus-barang{{$brg->id_brg}}" aria-hidden="true">
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modal-judul">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <form id="hapus-barang" name="hapus-barang" class="form-horizontal" action="/barang/{{$brg->id_brg}}" method="post">
                          @method('delete')
                          @csrf
                          <strong>Anda yakin ingin menghapus data {{$brg->nm_brg}} <br> milik {{$brg->nm_plgn}}?</strong>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </div>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus-barang{{$brg->id_brg}}" data-id="{{$brg->id_brg}}"><i class="far fa-trash-alt"></i></button>
                </form>
              </td>
            </tr>
          @endforeach
          </thead>
        </table>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="tambah-barang" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-judul"></h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal">
          <div class="row">
            <div class="col-sm-12">
              <a href="/barang/create" class="btn btn-primary">Pelanggan Lama</a>
              <a href="/pelanggan/create" class="btn btn-primary">Pelanggan Baru</a>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function() {
    $('#tabel_barang').DataTable({
      scrollX : true,
      scrollY : 280
    });
  } );

  $('#tombol-tambah').click(function () {
    $('#modal-judul').html("Tambah Data Barang");
    $('#tambah-barang').modal('show');
  });
</script>
@endsection