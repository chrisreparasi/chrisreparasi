<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_brg')->unique();
            $table->integer('id_plgn');
            $table->integer('id_krywn');
            $table->string('nm_plgn');
            $table->string('nm_krywn');
            $table->string('nm_brg');
            $table->string('uk_brg');
            $table->string('jns_prbkn');
            $table->integer('harga');
            $table->string('status');
            $table->date('tgl_masuk');
            $table->date('tgl_keluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
