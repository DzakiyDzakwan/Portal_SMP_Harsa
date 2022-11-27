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
            $table->integer('roster_id')->primary();
            $table->integer('mapel_guru');
            $table->char('kelas', 3);
            $table->time('jam_masuk');
            $table->time('jam_keluar');
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']);
            $table->foreign('mapel_guru')->references('mapel_guru_id')->on('mapel_gurus');
            $table->foreign('kelas')->references('kelas_id')->on('kelas');
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
