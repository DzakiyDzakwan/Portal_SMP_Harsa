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
        Schema::create('nilai_ekstrakurikulers', function (Blueprint $table) {
            $table->id('nilai_ekstrakurikuler_id');
            $table->char('ekstrakurikuler', 5);
            $table->unsignedBigInteger('kontrak_siswa');
            $table->unsignedBigInteger('sesi');
            $table->float('nilai')->unsigned();
            $table->text('keterangan');
            $table->foreign('sesi')->references('sesi_id')->on('sesi_penilaians')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('ekstrakurikuler')->references('ekstrakurikuler_id')->on('ekstrakurikulers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kontrak_siswa')->references('kontrak_semester_id')->on('kontrak_semesters')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('ekstrakurikuler_siswas');
    }
};
