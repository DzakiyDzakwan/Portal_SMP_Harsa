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
        Schema::create('ekstrakurikuler_siswas', function (Blueprint $table) {
            $table->id('ekstrakurikuler_siswa_id');
            $table->char('ekstrakurikuler', 6);
            $table->char('siswa', 10);
            $table->char('tahun_ajaran_aktif', 9);
            $table->timestamp('created_at');
            $table->foreign('ekstrakurikuler')->references('ekstrakurikuler_id')->on('ekstrakurikulers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('siswa')->references('NISN')->on('siswas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_ekstrakurikulers');
    }
};
