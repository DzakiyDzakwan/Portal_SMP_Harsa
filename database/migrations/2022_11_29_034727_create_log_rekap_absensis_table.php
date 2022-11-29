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
        Schema::create('log_rekap_absensis', function (Blueprint $table) {
            $table->BIGINT('id')->primary();
            $table->CHAR('absensi_id', 5);
            $table->CHAR('siswa', 10);
            $table->integer('n_sakit')->nullable();
            $table->integer('o_sakit')->nullable();
            $table->integer('n_izin')->nullable();
            $table->integer('o_izin')->nullable();
            $table->integer('n_tanpa_keterangan')->nullable();
            $table->integer('o_tanpa_keterangan')->nullable();
            $table->ENUM('n_semester', ['1', '2', '3', '4', '5', '6'])->nullable();
            $table->ENUM('o_semester', ['1', '2', '3', '4', '5', '6'])->nullable();
            $table->year('tahun_ajaran');
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
        Schema::dropIfExists('log_rekap_absensis');
    }
};
