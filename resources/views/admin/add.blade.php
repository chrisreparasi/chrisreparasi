@extends('layouts.master')

@section('title')
<title>Tambah Admin</title>
@endsection

@section('content')

<section class="add" id="add">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <h1 class="mt-4 font-weight-normal">Tambah Admin</h1>

        <form method="POST" action="/admin">
          @csrf
            <div class="form-row form-group col-md-10 mt-3">
              <label for="name">Nama</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama" name="name" value="{{ old('name') }}">
              @error('name')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-row form-group col-md-10">
              <label for="email">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" name="email" value="{{ old('email') }}">
              @error('email')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-row form-group col-md-10">
              <label for="password">Password</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Passowrd" name="password" required autocomplete="new-password">
              @error('password')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            
          <button type="submit" class="btn btn-primary mx-5 mb-3">Tambah</i></button>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection