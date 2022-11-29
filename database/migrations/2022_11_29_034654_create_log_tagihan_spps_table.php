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
        Schema::create('log_tagihan_spps', function (Blueprint $table) {
            $table->BIGINT('id')->primary();
            $table->BIGINT('tagihan_id');
            $table->CHAR('siswa', 10);
            $table->ENUM('n_bulan', ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']);
            $table->ENUM('o_bulan', ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']);
            $table->year('n_tahun_ajaran');
            $table->year('o_tahun_ajaran');
            $table->ENUM('n_semester', ['1', '2', '3', '4', '5', '6']);
            $table->ENUM('o_semester', ['1', '2', '3', '4', '5', '6']);
            $table->enum('keterangan', ['insert', 'update', 'delete']);
            $table->time('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_tagihan_spps');
    }
};
