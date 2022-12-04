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
            $table->char('n_ekskul_id',5)->nullable();
            $table->char('o_ekskul_id',5)->nullable();
            $table->string('n_nama', 255)->nullable();
            $table->string('o_nama', 255)->nullable();
            $table->enum('n_hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'])->nullable();
            $table->enum('o_hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'])->nullable();
            $table->time('n_waktu_mulai')->nullable();
            $table->time('o_waktu_mulai')->nullable();
            $table->time('n_waktu_akhir')->nullable();
            $table->time('o_waktu_akhir')->nullable();
            $table->string('n_tempat', 255)->nullable();
            $table->string('o_tempat', 255)->nullable();
            $table->char('n_kelas', 1)->nullable();
            $table->char('o_kelas', 1)->nullable();
            $table->enum('keterangan', ['insert', 'update', 'delete']);
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
