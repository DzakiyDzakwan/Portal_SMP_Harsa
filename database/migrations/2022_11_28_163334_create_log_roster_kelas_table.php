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
        Schema::create('log_roster_kelas', function (Blueprint $table) {
            $table->id();
            $table->integer('roster_id');
            $table->integer('mapel_guru');
            $table->char('kelas',3);
            $table->time('n_jam_masuk');
            $table->time('o_jam_masuk');
            $table->time('n_jam_keluar');
            $table->time('o_jam_keluar');
            $table->enum('n_hari',['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']);
            $table->enum('o_hari',['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']);
            $table->enum('keterangan', ['insert','update','delete']);
            $table->time('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_roster_kelas');
    }
};
