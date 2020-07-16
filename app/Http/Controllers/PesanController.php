<?php

namespace App\Http\Controllers;

use App\Pesan;
use App\Pelanggan;
use UxWeb\SweetAlert\SweetAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pesan = Pesan::all();
        return view('admin.pesan',compact('pesan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pesan $pesan)
    {
        $pelanggan = Pelanggan::where('email', $request->email)->get();

        $request->validate([
            'email' => 'required',
            'pesan' => 'required'
        ]); 

        $cekPelanggan="";
        $cekPesan="";

        foreach( $pelanggan as $plgn ){
            if( $plgn->email == $request->email ){
                $cekPelanggan = $request->email;
            }
            if( $pesan->email == $request->email ){
                $cekPesan = $request->email;
            }
        }

        if( $cekPesan == $request->email ){
            alert()->message('Anda sudah pernah mengirim pesan! Terimakasih');
            return back();
        }else if( $cekPelanggan != $request->email ){
            alert()->message('Data pelanggan tidak terdaftar, silahkan periksa e-mail anda.');
            return back();
        } else {
            $pelanggans = DB::table('pelanggan')->where('email',$request->email)->first();
            Pesan::create([
                'nm_plgn' => $pelanggans->nm_plgn,
                'email' => $request->email,
                'pesan' => $request->pesan
            ]);
            alert()->message('Pesan telah dikirim!');
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesan $pesan)
    {
        Pesan::destroy($pesan->id_pesan);
        return redirect('/pesan')->with('hapus','Pesan Berhasil Dihapus');
    }
}
