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
        Schema::create('ekstrakurikulers', function (Blueprint $table) {
            $table->char('ekstrakurikuler_id', 6)->primary();
            $table->char('penanggung_jawab', 16)->nullable();
            $table->string('nama');
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']);
            $table->time('waktu_mulai');
            $table->time('waktu_akhir');
            $table->string('tempat');
            $table->enum('kelas', ['7', '8', '9']);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('penanggung_jawab')->references('NUPTK')->on('gurus')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ekstrakurikulers');
    }
};
