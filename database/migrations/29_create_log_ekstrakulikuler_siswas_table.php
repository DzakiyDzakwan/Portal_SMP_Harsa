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
        Schema::create('log_ekstrakulikuler_siswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ekskul_siswa_id');
            $table->char('ekskul', 5);
            $table->unsignedBigInteger('kontrak_siswa');
            $table->float('nilai');
            $table->string('keterangan', 255);
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
