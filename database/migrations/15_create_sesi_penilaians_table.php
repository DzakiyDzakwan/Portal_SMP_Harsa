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
        Schema::create('sesi_penilaians', function (Blueprint $table) {
            $table->id('sesi_id');
            $table->enum('nama_sesi', ['uh1', 'uh2', 'uh3', 'uts', 'uas']);
            $table->char('tahun_ajaran_aktif', 9);
            $table->enum('semester_aktif', ["ganjil", "genap"]);
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_berakhir');
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
        Schema::dropIfExists('sesi_penilaians');
    }
};
