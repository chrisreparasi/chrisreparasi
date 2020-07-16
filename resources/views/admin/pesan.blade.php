@extends('layouts.master')

@section('title')
<title>Data Pesan</title>
@endsection

@section('content')
<section class="form" id="form">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2 class="text-center font-weight-normal">DATA PESAN</h2>
      </div>
      <div class="card-body">
        
        @if ( session('hapus') )
          <div class="alert alert-danger">
            {{ session('hapus') }}
          </div>
        @endif
        <table class="table table-striped display nowrap table-sm" style="width:100%" id="tabel_pesan">
          <thead class="thead-dark text-center">
            <tr>
              <th>ID Pesan</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Pesan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach( $pesan as $psn )
            <tr>
              <td>{{ $psn->id_pesan }}</td>
              <td>{{ $psn->nm_plgn }}</td>
              <td>{{ $psn->email }}</td>
              <td>{{ $psn->pesan }}</td>
              <td>
                <div class="modal fade" id="hapus-pesan{{$psn->id_pesan}}" aria-hidden="true">
                    <div class="modal-dialog ">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modal-judul">Hapus Data</h5>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          <form id="hapus-pesan" name="hapus-pesan" class="form-horizontal" action="/pesan/{{$psn->id_pesan}}" method="post">
                            @method('delete')
                            @csrf
                            <strong>Anda yakin ingin menghapus data pesan <br> milik {{$psn->nm_plgn}}?</strong>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus-pesan{{$psn->id_pesan}}" data-id="{{$psn->id_pesan}}"><i class="far fa-trash-alt"></i></button>
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
    $('#tabel_pesan').DataTable({
      scrollX : true,
      scrollY : 365
    });
  } );
</script>
@endsection