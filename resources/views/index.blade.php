@extends('layouts.profile')


@section('title')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
<title>Chris Reparasi</title>
@endsection

@section('navbar')
<a class="nav-item nav-link page-scroll" href="#section-about">About Us</a>
<a class="nav-item nav-link page-scroll" href="#section-portfolio">Portfolio</a>
<a class="nav-item nav-link page-scroll" href="#section-contact">Contact</a>
<a class="nav-item btn tombol" href="/status">Status Barang</a>
@endsection

@section('content')

  <a href="#section-home" class="material-icons floating-btn page-scroll">expand_less</a>

  @include('bagian.jumbotron')
  @include('bagian.about')
  @include('bagian.service')
  @include('bagian.portfolio')
  @include('bagian.contact')
  @include('bagian.form')
@endsection

