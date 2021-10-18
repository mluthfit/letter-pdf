<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letters', function (Blueprint $table) {
            $table->id();
            $table->string('daerah_surat');
            $table->date('tanggal_surat');
            $table->string('nama_pengirim');
            $table->string('alamat_pengirim');
            $table->string('jabatan_pengirim');
            $table->string('nama_perusahaan');
            $table->string('alamat_perusahaan');
            $table->string('alasan_izin');
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
        Schema::dropIfExists('letters');
    }
}
