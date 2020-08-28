<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = 'pesan';
    protected $primaryKey ="id_pesan";
    protected $fillable = ['nm_plgn','id_plgn','email','pesan'];
}
