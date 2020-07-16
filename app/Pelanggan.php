<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_plgn';
    protected $fillable=['nm_plgn','no_telp','email','alamat'];
}
