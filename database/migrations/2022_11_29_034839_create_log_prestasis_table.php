<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_prestasis', function (Blueprint $table) {
            $table->BIGINT('id')->primary();
            $table->BIGINT('prestasi_id');
            $table->CHAR('siswa', 10);
            $table->ENUM('n_jenis_prestasi', ['Akademik', 'NonAkademik']);
            $table->ENUM('o_jenis_prestasi', ['Akademik', 'NonAkademik']);
            $table->VARCHAR('n_keterangan', 255);
            $table->VARCHAR('o_keterangan', 255);
            $table->date('n_tanggal_prestasi');
            $table->date('o_tanggal_prestasi');
            $table->ENUM('n_semester', ['1', '2', '3', '4', '5', '6']);
            $table->ENUM('o_semester', ['1', '2', '3', '4', '5', '6']);
            $table->enum('keterangan', ['insert', 'update', 'delete']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_prestasis');
    }
};
