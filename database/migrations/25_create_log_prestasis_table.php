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
        Schema::create('log_prestasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prestasi_id');
            $table->char('siswa', 10);
            $table->enum('jenis_prestasi', ['Akademik', 'NonAkademik']);
            $table->string('keterangan', 255);
            $table->date('tanggal_prestasi');
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
        Schema::dropIfExists('log_prestasis');
    }
};
