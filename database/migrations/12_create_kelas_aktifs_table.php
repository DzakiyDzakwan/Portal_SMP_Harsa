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
        Schema::create('kelas_aktifs', function (Blueprint $table) {
            $table->uuid('kelas_aktif_id')->primary();
            $table->char('kelas', 6)->nullable();
            $table->char('wali_kelas', 18);
            $table->char('tahun_ajaran_aktif', 9);
            $table->string('nama_kelas_aktif');
            $table->foreign('kelas')->references('kelas_id')->on('kelas')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('wali_kelas')->references('NUPTK')->on('gurus')->onUpdate('cascade');
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
        Schema::dropIfExists('kelas_aktifs');
    }
};
