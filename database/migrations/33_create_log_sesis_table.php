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
        Schema::create('log_sesis', function (Blueprint $table) {
            $table->id();
            $table->char('sesi_id', 36);
            $table->enum('nama_sesi', ['uh1', 'uh2', 'uh3', 'uts', 'uas']);
            $table->char('tahun_ajaran_aktif', 9);
            $table->enum('semester_aktif', ["ganjil", "genap"]);
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_berakhir');
            $table->enum('action', ['insert', 'update']);
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
        Schema::dropIfExists('log_sesis');
    }
};
