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
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id('prestasi_id');
            $table->char('siswa', 10);
            $table->enum('jenis_prestasi', ['Akademik', 'NonAkademik']);
            $table->string('keterangan');
            $table->date('tanggal_prestasi');
            $table->enum('semester', ['1', '2', '3', '4', '5', '6']);
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
        Schema::dropIfExists('prestasis');
    }
};
