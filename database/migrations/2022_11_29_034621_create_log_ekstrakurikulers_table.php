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
            $table->BIGINT('id')->primary();
            $table->CHAR('ekskul_id', 5);
            $table->VARCHAR('n_nama', 255)->nullable();
            $table->VARCHAR('o_nama', 255)->nullable();
            $table->ENUM('n_hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'])->nullable();
            $table->ENUM('o_hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'])->nullable();
            $table->time('n_jam_masuk')->nullable();
            $table->time('o_jam_masuk')->nullable();
            $table->time('n_jam_keluar')->nullable();
            $table->time('o_jam_keluar')->nullable();
            $table->VARCHAR('n_tempat', 255)->nullable();
            $table->VARCHAR('o_tempat', 255)->nullable();
            $table->CHAR('n_kelas', 1)->nullable();
            $table->CHAR('o_kelas', 1)->nullable();
            $table->enum('keterangan', ['insert', 'update', 'delete']);
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
        Schema::dropIfExists('log_ekstrakurikulers');
    }
};
