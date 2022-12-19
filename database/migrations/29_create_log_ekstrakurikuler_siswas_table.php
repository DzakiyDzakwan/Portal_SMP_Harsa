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
            $table->char('guru', 18)->nullable();
            $table->char('ekstrakurikuler', 5);
            $table->unsignedBigInteger('kontrak_siswa');
            $table->float('nilai');
            $table->string('keterangan', 255);
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
