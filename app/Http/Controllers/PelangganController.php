<?php

namespace App\Http\Controllers;

use Alert;
use App\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $pelanggan = Pelanggan::all();
    return view('admin.pelanggan',compact('pelanggan'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pelanggan.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'nm_plgn' => 'required',
      'no_telp' => 'required',
      'email' => 'required'
    ]);
    Pelanggan::create($request->all());
    toast('Data Berhasil Ditambah!','success');
    return redirect('/pelanggan');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Pelanggan  $pelanggan
   * @return \Illuminate\Http\Response
   */
  public function show(Pelanggan $pelanggan)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Pelanggan  $pelanggan
   * @return \Illuminate\Http\Response
   */
  public function edit(Pelanggan $pelanggan)
  {
    return view('pelanggan.edit',compact('pelanggan'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Pelanggan  $pelanggan
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Pelanggan $pelanggan)
  {
    $request->validate([
      'nm_plgn' => 'required',
      'no_telp' => 'required'
    ]);
    Pelanggan::where('id_plgn', $pelanggan->id_plgn)
      ->update([
        'nm_plgn' => $request->nm_plgn,
        'no_telp' => $request->no_telp,
        'alamat' => $request->alamat
      ]);
    toast('Data Berhasil Diubah!','info');
    return redirect('/pelanggan');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Pelanggan  $pelanggan
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pelanggan $pelanggan)
  {
    Pelanggan::destroy($pelanggan->id_plgn);
    toast('Data Berhasil Dihapus!','warning');
    return redirect('/pelanggan');
  }
}
