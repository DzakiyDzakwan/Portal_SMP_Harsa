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
            $table->enum('kategori_nilai', ['uh1', 'uh2', 'uh3', 'uts', 'uas']);
            $table->year('tahun_ajaran');
            $table->time('waktu_mulai');
            $table->time('waktu_akhir');
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
