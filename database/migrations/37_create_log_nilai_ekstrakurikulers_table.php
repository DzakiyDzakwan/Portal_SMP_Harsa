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
        Schema::create('log_nilai_ekstrakurikulers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nilai_ekskul_id');
            $table->char('ekstrakurikuler', 6);
            $table->unsignedBigInteger('kontrak_siswa');
            $table->float('nilai');
            $table->text('keterangan', 255);
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
        Schema::dropIfExists('log_nilai_ekstrakurikulers');
    }
};
