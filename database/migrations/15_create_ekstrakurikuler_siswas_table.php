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
        Schema::create('ekstrakurikuler_siswas', function (Blueprint $table) {
            $table->id('ekstrakurikuler_siswa_id');
            $table->char('ekstrakurikuler', 5);
            $table->char('guru', 18)->nullable();
            $table->unsignedBigInteger('kontrak_siswa');
            $table->float('nilai')->unsigned();
            $table->text('keterangan');
            $table->foreign('ekstrakurikuler')->references('ekstrakurikuler_id')->on('ekstrakurikulers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('guru')->references('NIP')->on('gurus')->onUpdate('cascade')->onDelete('set null');
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
