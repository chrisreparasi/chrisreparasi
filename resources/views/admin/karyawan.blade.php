@extends('layouts.master')

@section('title')
<title>Data Karyawan</title>
@endsection

@section('content')
<section class="karyawan" id="karyawan">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2 class="text-center font-weight-normal">DATA KARYAWAN</h2>
      </div>
      <div class="card-body">

        @if( session('hapus') )
          <div class="alert alert-danger">
            {{ session('hapus') }}
          </div>
        @endif
        @if( session('status') )
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif

        <a href="/karyawan/create" class="btn btn-info">Tambah Data Karyawan</a>
        <br><br>
        <table class="table table-striped display nowrap table-sm font-weight-normal" style="width:100%" id="tabel_karyawan">
          <thead class="thead-dark text-center">
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>No. Telp</th>
              <th>Email</th>
              <th>Tugas</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          @foreach( $karyawan as $krywn )
              <tr>
                <td>{{ $krywn->id_krywn }}</td>
                <td>{{ $krywn->nm_krywn }}</td>
                <td>{{ $krywn->telp_krywn }}</td>
                <td>{{ $krywn->email_krywn }}</td>
                <td>{{ $krywn->tugas }}</td>
                <td>
                  <a href="karyawan/{{ $krywn->id_krywn }}/edit" class="btn btn-info"><i class="far fa-edit"></i></a>                  
                  <div class="modal fade" id="hapus-karyawan{{$krywn->id_krywn}}" aria-hidden="true">
                    <div class="modal-dialog ">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modal-judul">Hapus Data</h5>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          <form id="hapus-karyawan" name="hapus-karyawan" class="form-horizontal" action="/karyawan/{{$krywn->id_krywn}}" method="post">
                            @method('delete')
                            @csrf
                            <strong>Anda yakin ingin menghapus data {{$krywn->nm_krywn}}?</strong>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus-karyawan{{$krywn->id_krywn}}" data-id="{{$krywn->id_krywn}}"><i class="far fa-trash-alt"></i></button>
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
    $('#tabel_karyawan').DataTable({
      scrollX : true,
      scrollY : 300
    });
  } );
</script>
@endsection