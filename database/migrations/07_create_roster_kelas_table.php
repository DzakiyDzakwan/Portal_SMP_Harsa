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
        Schema::create('roster_kelas', function (Blueprint $table) {
            $table->id('roster_id');
            $table->unsignedBigInteger('mapel');
            $table->char('kelas', 3);
            $table->time('waktu_mulai');
            $table->integer('durasi');
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']);
            $table->foreign('mapel')->references('mapel_guru_id')->on('mapel_gurus')->onUpdate('cascade')->onDelete();
            $table->foreign('kelas')->references('kelas_id')->on('kelas')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('roster_kelas');
    }
};
