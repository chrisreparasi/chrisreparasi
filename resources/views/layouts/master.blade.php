<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  @yield('title')
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">

  <!-- Google Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/adminlte/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
  <!-- Datatables -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
    integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />

	<style type="text/css" class="init">
	
	.nowrap {
		width: 800px;
		margin: 0 auto;
	}

	</style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="btn btn-dark" href="{{ route('admin.register') }}">Register</a>
      </li>
      <div class="logout">
        <a href="{{ route('logout') }}" class="btn btn-dark"
          onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-dark-orange">
    <!-- Brand Logo -->
    <a href="" class="brand-link navbar-orange">
      <img src="/adminlte/img/repair.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ChrisReparasi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/adminlte/img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="btn-group dropright">
          <a disabled class="d-block ml-3 mt-2 text-white">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="/pelanggan" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>Data Pelanggan</p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="/karyawan" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>Data Karyawan</p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="/barang" class="nav-link">
              <i class="nav-icon fas fa-archive"></i>
              <p>Data Barang</p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="/pesan" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>Data Pesan</p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="javascript:void(0)" class="nav-link" id="tombol-cetak">
              <i class="nav-icon fas fa-print"></i>
              <p>Cetak Laporan</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="cetak-laporan" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content" style="width:100%;">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-judul">Cetak Laporan</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form action="/laporanpdf" method="post" class="ml-3">
          @csrf
          <div class="row">
            <label for="tgl_awal" class="d-inline">Tanggal Awal</label>
            <div class="col-md-6"><input min="2000-01-01" name="tgl_awal" id="tgl_awal" type="date" class="form-control d-inline" style="height:80%;"></div>
          </div>
          <div class="row">
            <label for="tgl_akhir" class="d-inline">Tanggal Akhir</label>
            <div class="col-md-6"><input min="2000-01-01" name="tgl_akhir" id="tgl_akhir" type="date" class="form-control d-inline" style="height:80%;"></div>
          </div>
        </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" id="tombol-cetak" style="height:80%;">Cetak</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    <a href="http://adminlte.io">AdminLTE.io</a><b> Version</b> 3.0.4
    </div>
    <strong>Copyright &copy; 2020.</strong> 
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="/adminlte/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="/adminlte/js/demo.js"></script>

<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"> </script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js" integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>

<script src="js/bootstrap-datepicker.js"></script>

<script src="js/bootstrap.min.js"></script>

<script>
  $('#tombol-cetak').click(function () {
    $('#cetak-laporan').modal('show');
  });
</script>

@yield('script')

@include('sweetalert::alert')
</body>
</html>
