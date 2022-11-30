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
            $table->id();
            $table->char('absensi_id', 5);
            $table->char('siswa', 10);
            $table->integer('n_sakit')->usnigned()->nullable();
            $table->integer('o_sakit')->usnigned()->nullable();
            $table->integer('n_izin')->usnigned()->nullable();
            $table->integer('o_izin')->usnigned()->nullable();
            $table->integer('n_tanpa_keterangan')->usnigned()->nullable();
            $table->integer('o_tanpa_keterangan')->usnigned()->nullable();
            $table->enum('n_semester', ['1', '2', '3', '4', '5', '6'])->nullable();
            $table->enum('o_semester', ['1', '2', '3', '4', '5', '6'])->nullable();
            $table->year('tahun_ajaran');
            $table->enum('keterangan', ['insert', 'update', 'delete']);
            $table->timestamp('created_at');
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
