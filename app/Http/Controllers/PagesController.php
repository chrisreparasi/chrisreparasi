<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Barang;

class PagesController extends Controller
{
  public function index()
  {
    return view('index');
  }

  public function status()
  {
    $status = 0;
    return view('status',compact('status'));
  }

  public function filter(Request $request)
  {
    $barang = Barang::all();

    $cekBarang="";
    foreach( $barang as $brg ){
      if( $brg->id_brg == $request->get('q') ){
        $cekBarang = $request->get('q');
      }
    }

    if( $cekBarang=="" ){
      alert()->warning('Status barang tidak ditemukan!','Periksa kembali kode barang anda.');
      return redirect('/status');
    }else{
      $status = $cekBarang;
      return view('status',compact('status'));
    }
  }
}