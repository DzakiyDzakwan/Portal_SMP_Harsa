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
        Schema::create('rekap_absensis', function (Blueprint $table) {
            $table->id('absensi_id');
            $table->char('siswa', 10);
            $table->integer('sakit');
            $table->integer('izin');
            $table->integer('tanpa_keterangan');
            $table->enum('semester', ['1', '2', '3', '4', '5', '6']);
            $table->year('tahun_ajaran');
            $table->foreign('siswa')->references('NISN')->on('siswas');
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
        Schema::dropIfExists('rekap_absensis');
    }
};
