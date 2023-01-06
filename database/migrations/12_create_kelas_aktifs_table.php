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
            $table->char('kelas_aktif_id', 6)->primary();
            $table->char('kelas', 6)->nullable();
            $table->char('wali_kelas', 18)->references('NUPTK')->on('gurus')->onUpdate('cascade')->onDelete('set null');;
            $table->char('tahun_ajaran_aktif', 9);
            $table->string('nama_kelas_aktif')->unique();
            $table->foreign('kelas')->references('kelas_id')->on('kelas')->onUpdate('cascade')->onDelete('set null');
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
