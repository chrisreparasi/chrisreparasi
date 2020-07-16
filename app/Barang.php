<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_brg';
    protected $fillable = ['id_plgn','nm_plgn','id_krywn','nm_krywn','nm_brg','uk_brg','jns_prbkn','harga','status','tgl_masuk','tgl_keluar'];
}
