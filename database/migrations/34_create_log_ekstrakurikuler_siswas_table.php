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
        Schema::create('log_ekstrakurikuler_siswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ekstrakurikuler_siswa_id');
            $table->char('ekstrakurikuler', 6);
            $table->char('siswa', 10);
            $table->char('tahun_ajaran_aktif', 9);
            $table->enum('action', ['insert', 'update', 'delete']);
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
        Schema::dropIfExists('log_ekstrakulikuler_siswas');
    }
};
