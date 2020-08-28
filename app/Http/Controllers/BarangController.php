<?php

namespace App\Http\Controllers;

use PDF;
use Alert;
use App\Barang;
use App\Pelanggan;
use App\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $barang = Barang::all();
    return view('admin.barang',compact('barang'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $karyawan = Karyawan::all();
    $pelanggan = Pelanggan::all();
    return view('barang.create', compact('pelanggan','karyawan'));
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
      'id_plgn' => 'required',
      'id_krywn' => 'required',
      'nm_brg' => 'required',
      'uk_brg' => 'required',
      'jns_prbkn' => 'required',
      'harga' => 'required',
      'status' => 'required',
      'tgl_masuk' => 'required'
    ]);

    if( $request->status == "Selesai" ){
      $request->validate(['tgl_keluar'=>'required']);
    }

    $pelanggans = DB::table('pelanggan')->where('id_plgn',$request->id_plgn)->first();
    $karyawans = DB::table('karyawan')->where('id_krywn',$request->id_krywn)->first();
    // dd($karyawans);
    Barang::create([
      'id_plgn' => $pelanggans->id_plgn,
      'nm_plgn' => $pelanggans->nm_plgn,
      'id_krywn' => $karyawans->id_krywn,
      'nm_krywn' => $karyawans->nm_krywn,
      'nm_brg' => $request->nm_brg,
      'uk_brg' => $request->uk_brg,
      'jns_prbkn' => $request->jns_prbkn,
      'harga' => $request->harga,
      'status' => $request->status,
      'tgl_masuk' => $request->tgl_masuk,
      'tgl_keluar' => $request->tgl_keluar,
    ]);
    toast('Data Berhasil Ditambah!','success');
    return redirect('/barang');
  }

  /**
   * Display the specified resource.
   * 
   * 
   *
   * @param  \App\Barang  $barang
   * @return \Illuminate\Http\Response
   */
  public function show(Barang $barang)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Barang  $barang
   * @return \Illuminate\Http\Response
   */
  public function edit(Barang $barang)
  {
    $karyawan = Karyawan::all();
    $pelanggan = Pelanggan::all();
    // dd($barang);
    return view('barang.edit',compact('barang','pelanggan','karyawan'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Barang  $barang
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Barang $barang, Karyawan $karyawan)
  {
    $request -> validate([
      'id_plgn' => 'required',
      'nm_brg' => 'required',
      'uk_brg' => 'required',
      'jns_prbkn' => 'required',
      'harga' => 'required',
      'status' => 'required',
      'tgl_masuk' => 'required'
    ]);

    if( $request->status == "Selesai" ){
      $request->validate(['tgl_keluar'=>'required']);
    }
    
    $pelanggans = DB::table('pelanggan')->where('id_plgn',$request->id_plgn)->first();
    $karyawans = DB::table('karyawan')->where('id_krywn',$request->id_krywn)->first();
    Barang::where('id_brg',$barang->id_brg)
      ->update([
        'id_plgn' => $pelanggans->id_plgn,
        'nm_plgn' => $pelanggans->nm_plgn,
        'id_krywn' => $karyawans->id_krywn,
        'nm_krywn' => $karyawans->nm_krywn,
        'nm_brg' => $request->nm_brg,
        'uk_brg' => $request->uk_brg,
        'jns_prbkn' => $request->jns_prbkn,
        'harga' => $request->harga,
        'status' => $request->status,
        'tgl_masuk' => $request->tgl_masuk,
        'tgl_keluar' => $request->tgl_keluar,
      ]);
    toast('Data Berhasil Diubah!','info');
    return redirect('/barang');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Barang  $barang
   * @return \Illuminate\Http\Response
   */
  public function destroy(Barang $barang)
  {
    Barang::destroy($barang->id_brg);
    toast('Data Berhasil Dihapus!','warning');
    return redirect('/barang');
  }

  public function generatePDF(Request $request)
  {
    $from = $request->tgl_awal;
    $to = $request->tgl_akhir;
    $cetak = Barang::whereBetween('tgl_masuk', [$from, $to])->get();
    $pdf = PDF::loadview('myPDF',compact('cetak','from','to'));
    return $pdf->download('Laporan '.date('d M Y', strtotime($from)).' - '.date('d M Y', strtotime($to)).'.pdf');
  }
}
