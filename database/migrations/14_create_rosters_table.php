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
        Schema::create('rosters', function (Blueprint $table) {
            $table->id('roster_id');
            $table->unsignedBigInteger('mapel_guru');
            $table->uuid('kelas');
            $table->char('tahun_ajaran_aktif', 9);
            $table->enum('semester_aktif', ['ganjil', 'genap']);
            $table->time('waktu_mulai');
            $table->time('waktu_akhir');
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']);
            $table->foreign('mapel_guru')->references('mapel_guru_id')->on('mapel_gurus')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kelas')->references('kelas_aktif_id')->on('kelas_aktifs')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('roster_kelas');
    }
};
