<!-- Form -->
<section class="form" id="section-form">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <h2 style="color:rgb(63, 63, 63);">Beri Kami Tanggapan!</h2>
        <p class="text-white" style="color:seashell;font-size:14pt;">Anda sudah pernah mereparasi barang di tempat kami? <br> Beri tanggapan berbentuk kesan pesan untuk mendukung kami menjadi lebih baik.</p>
        <hr>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-sm-8">
      <form action=" {{ route('store.pesan') }} " method="POST">
      @csrf
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Email" value="{{ old('email') }}">
          @error('email') <div class="invalid-feedback">{{$message}}</div> @enderror
        </div>
        <div class="form-group">
          <label for="pesan">Pesan</label>
          <textarea id="pesan" name="pesan" class="form-control @error('pesan') is-invalid @enderror" rows="5" placeholder="Masukkan Pesan Anda" value="{{ old('pesan') }}"></textarea>
          @error('pesan') <div class="invalid-feedback">{{$message}}</div> @enderror
        </div>
        <div class="class text-center">
          <button type="submit" class="btn btn-dark text-white">Submit</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</section>
<!-- Akhir Form -->