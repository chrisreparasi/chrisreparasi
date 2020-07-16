<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'id_krywn';
    protected $fillable = ['nm_krywn','telp_krywn','email_krywn','tugas'];
}
