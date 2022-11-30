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
        Schema::create('log_kelas', function (Blueprint $table) {
            $table->id();
            $table->char('n_kelas_id', 3)->nullable();
            $table->char('o_kelas_id', 3)->nullable();
            $table->char('n_wali_kelas', 18)->nullable();
            $table->char('o_wali_kelas', 18)->nullable();
            $table->char('n_kelompok_kelas', 2)->nullable();
            $table->char('o_kelompok_kelas', 2)->nullable();
            $table->string('n_nama_kelas')->nullable();
            $table->string('o_nama_kelas')->nullable();
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
        Schema::dropIfExists('log_kelas');
    }
};
