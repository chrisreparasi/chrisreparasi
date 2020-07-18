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
    public function store(Request $request)
    {
        $pelanggan = Pelanggan::all();
        $pesan = Pesan::all();

        $request->validate([
            'email' => 'required',
            'pesan' => 'required'
        ]); 

        $cekPelanggan="";        
        foreach( $pelanggan as $plgn ){
            if( $plgn->email == $request->email ){
                $cekPelanggan = $request->email;
            }
        }
        
        $cekPesan="";
        foreach( $pesan as $psn ){
            if( $psn->email == $request->email ){
                $cekPesan = $request->email;
            }
        }

        if( $cekPelanggan!="" ){
            if( $cekPesan!="" ){
                echo '<script type="text/javascript">
                    alert("Anda sudah pernah mengirim pesan!<br>Terimakasih")</script>';
                return back();
            }else{
                $pelanggans = DB::table('pelanggan')->where('email',$request->email)->first();
                Pesan::create([
                    'nm_plgn' => $pelanggans->nm_plgn,
                    'email' => $request->email,
                    'pesan' => $request->pesan
                ]);
                echo '<script type="text/javascript">
                    alert("Pesan Berhasil Dikirim<br>Terimakasih")</script>';
                return redirect('/');
            }
        }elseif( $cekPelanggan=="" ){
            echo '<script type="text/javascript">
                alert("Data tidak terdaftar<br>Periksa kembali e-mail anda")</script>';
            return back();
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
