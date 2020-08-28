@extends('layouts.profile')


@section('title')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">

<title>Status Barang</title>
@endsection
  
@section('navbar')
<a class="nav-item btn tombol" href="/">Kembali</a>
@endsection

@section('content')
  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid status" style="height:250px;">
    <div class="container">
      <h1 class="display-5">Cek <span>status barang</span> anda di sini</h1>
        <div class="row justify-content-center">
          <div class="col-sm-12">
            <form action="{{ route('filter.barang') }}" method="get" class="form-row">
            @csrf
              <input type="text" name="q" class="form-control d-inline" placeholder="Masukkan Kode Barang" style="width: 85%;">
              <button type="submit" class="btn tombol d-inline ml-3" style="width: 10%;">Cek Status</button>
            </form>
          </div>
        </div>
    </div>
  </div>
  <!-- Akhir Jumbotron -->
  
<!-- 
    @if( session('status') )
      <div class="alert alert-danger">
        {{ session('status') }}
      </div>
    @endif -->

  <!-- filter -->
    <section class="filter" id="filter" style="min-height:300px;)">
      <div class="container">
        
      @if( $status != 0 )
        <div class="row m-3 wow fadeInUp"> 
					<div class="col-md-12 text-center"> 
						@php 
						$barang = \App\Barang::where('id_brg', $status)->first(); 
						@endphp 
						<div class="card mb-3 pt-3"> 
							<div class="card-body"> 
                <header class="section-header wow fadeInUp"> 
                  <h3 class="text-center font-weight-normal mb-3">DETAIL BARANG</h3>
                  <h5 class="text-center font-weight-normal mb-5">Kode Barang : {{ $barang->id_brg }}</h5>
                </header>
                <div class="row justify-content-center text-left">
                
                  <div class="col-md-4 col-4 text-center">
                    @if ( $barang->status == "Proses" ) 
                      <img class="text-center" src="{{asset('img/clients')}}/tools.png" alt="" width="65%">
                      <p style="font-size:10px;">Icons made by <a href="https://www.flaticon.com/free-icon/hammer_3111678?term=repairing&page=1&position=62" title="smalllikeart">smalllikeart</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></p>
                    @elseif( $barang->status == "Selesai" ) 
                      <img class="text-center mb-3" src="{{asset('img/clients')}}/done.png" alt="" width="60%">
                      <p style="font-size:10px;">Icons made by <a href="https://www.flaticon.com/authors/pixel-perfect" title="Pixel perfect">Pixel perfect</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></p>
                    @endif 
                  </div>
                  <div class="col-md-2 col-4"> 
                    <p>Nama Pelanggan<br>
                      Nama Barang<br>
                      Jenis Perbaikan<br>
                      Total Harga<br>
                      Tanggal Masuk<br>
                      Tanggal Keluar<br>
                      Status<br>
                      Dilayani oleh
                    </p> 
                  </div> 
                  <div class="col-md-6 col-4">
                    <p>: {{ $barang->nm_plgn }}<br> 
                      : {{ $barang->nm_brg }}<br> 
                      : {{ $barang->jns_prbkn }}<br> 
                      : {{ 'Rp'.number_format($barang->harga, '0', ',', '.') }}<br>
                      : {{ date('d M Y', strtotime($barang->tgl_masuk)) }}<br>
                      @if( date('d M Y', strtotime($barang->tgl_keluar)) == "01 Jan 1970" )
                        : -<br>
                      @else
                        : {{ date('d M Y', strtotime($barang->tgl_keluar)) }}<br>
                      @endif
                      : {{ $barang->status }}<br>
                      : {{ $barang->nm_krywn }}
                    </p>
                  </div>
                </div>
                
							</div> 
						</div> 
					</div> 
				</div>
      @endif
      </div>
    </section>
  <!-- Akhir filter -->

  <!-- Footer 2 -->
  <section class="footer2" id="footer2">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="card-body">
            <h2>Chris Reparasi</h2>
            <p>Chris Reparasi adalah perusahaan yang bergerak <br> dibidang jasa reparasi, dimulai pada tahun 2010. <br>Kami memperbaiki sepatu, tas, dan koper<br> dengan berbagai macam reparasi.<br></p>
            <div class="card text-center" style="background-color:rgb(63, 63, 63);color:#fff;">
              <p class="card-text m-3">
                <img src="img/portfolio/icon-wa.png" style="width: 20px"> +62 818-0671-1022
              </p>
                <p class="card-text">
                <img src="img/portfolio/icon-ig.png" style="width: 20px"><a href="https://www.instagram.com/chris_reparasi/" target="_balank" class="text-white"> @chris_reparasi</a>
              </p>
              <p>Waktu Buka : <br>Senin - Sabtu ( 08.30 - 19.00 )</p>
            </div>
          </div>
        </div>


        <div class="col-lg-5">
          <div class="card-body">
            <h4>Location</h4>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0231831307265!2d106.90814101458902!3d-6.260676395468428!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f33a307d909d%3A0xa51e6708d3bc7bea!2sChris%20Reparasi!5e0!3m2!1sen!2sid!4v1588601336974!5m2!1sen!2sid" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir Footer 2 -->
@endsection