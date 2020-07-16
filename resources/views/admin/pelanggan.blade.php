@extends('layouts.master')

@section('title')
<title>Data Pelanggan</title>
@endsection

@section('content')
<section class="pelanggan" id="pelanggan">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2 class="text-center font-weight-normal">DATA PELANGGAN</h2>
      </div>
      <div class="card-body">

        @if( session('status') )
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif
        @if( session('hapus') )
          <div class="alert alert-danger">
            {{ session('hapus') }}
          </div>
        @endif
        
        <a href="/pelanggan/create" class="btn btn-info">Tambah Data Pelanggan</a>
        <br><br>
        <table class="table table-striped display nowrap table-sm font-weight-normal" style="width:100%" id="tabel_pelanggan">
          <thead class="thead-dark text-center">
            <tr>
              <th>No.</th>
              <th>ID</th>
              <th>Nama</th>
              <th>No. Telepon</th>
              <th>E-mail</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach( $pelanggan as $plgn )
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $plgn->id_plgn }}</td>
                <td>{{ $plgn->nm_plgn }}</td>
                <td>{{ $plgn->no_telp }}</td>
                <td>{{ $plgn->email }}</td>
                <td>{{ $plgn->alamat }}</td>
                <td>
                  <a href="pelanggan/{{ $plgn->id_plgn }}/edit" class="btn btn-info"><i class="far fa-edit"></i></a>                  
                  <div class="modal fade" id="hapus-pelanggan{{$plgn->id_plgn}}" aria-hidden="true">
                    <div class="modal-dialog ">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modal-judul">Hapus Data</h5>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          <form id="hapus-pelanggan" name="hapus-pelanggan" class="form-horizontal" action="/pelanggan/{{$plgn->id_plgn}}" method="post">
                            @method('delete')
                            @csrf
                            <strong>Anda yakin ingin menghapus data {{$plgn->nm_plgn}}?</strong>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus-pelanggan{{$plgn->id_plgn}}" data-id="{{$plgn->id_plgn}}"><i class="far fa-trash-alt"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection

@section('script')
<script>
  $(document).ready(function() {
    $('#tabel_pelanggan').DataTable({
      scrollX : true,
      scrollY : 300
    });
  } );
</script>
@endsection