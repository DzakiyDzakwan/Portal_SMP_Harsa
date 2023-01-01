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
        Schema::create('log_ekstrakurikulers', function (Blueprint $table) {
            $table->id();
            $table->char('ekstrakurikuler_id',6);
            $table->char('penanggung_jawab',16)->nullable();
            $table->string('nama', 255);
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']);
            $table->time('waktu_mulai');
            $table->time('waktu_akhir');
            $table->string('tempat', 255);
            $table->char('kelas', 1);
            $table->enum('action', ['insert', 'update', 'delete']);
            $table->timestamp('created_at');                                         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_ekstrakurikulers');
    }
};
