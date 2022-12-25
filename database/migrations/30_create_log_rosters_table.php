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
        Schema::create('log_rosters', function (Blueprint $table) {
            $table->id();
            $table->integer('roster_id');
            $table->integer('mapel_guru');
            $table->char('kelas', 3);
            $table->enum('semester_aktif', ['Ganjil', 'Genap']);
            $table->char('tahun_ajaran_aktif', 9);
            $table->time('waktu_mulai');
            $table->integer('waktu_akhir');
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']);
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
        Schema::dropIfExists('log_rosters');
    }
};
