<?php

namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('admin.karyawan',compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create');
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
            'nm_krywn' => 'required',
            'telp_krywn' => 'required',
            'email_krywn' => 'required',
            'tugas' => 'required'
          ]);
          Karyawan::create($request->all());
          return redirect('/karyawan')->with('status','Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit',compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nm_krywn' => 'required',
            'telp_krywn' => 'required',
            'email_krywn' => 'required',
            'tugas' => 'required'
          ]);
        Karyawan::where('id_krywn', $karyawan->id_krywn)
        ->update([
          'nm_krywn' => $request->nm_krywn,
          'telp_krywn' => $request->telp_krywn,
          'email_krywn' => $request->email_krywn,
          'tugas' => $request->tugas
        ]);
        return redirect('/karyawan')->with('status','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        Karyawan::destroy($karyawan->id_krywn);
        return redirect('/karyawan')->with('hapus','Data Berhasil Dihapus');
    }
}
