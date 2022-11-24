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
        Schema::create('_sesi_penilaian', function (Blueprint $table) {
            $table->bigInteger('sesi_penilaian')->nullable(false)->primary();
            $table->char('kategori_nilai', 3)->nullable(false);
            $table->foreign('kategori_nilai')->nullable(false)->references('kategori_nilai_id')->on('kategori_nilai');
            $table->time('waktu_mulai');
            $table->timestamp('waktu_akhir');
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
        Schema::dropIfExists('_sesi_penilaian');
    }
};
