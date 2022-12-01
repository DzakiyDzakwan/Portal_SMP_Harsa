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
            $table->bigInteger('prestasi_id');
            $table->char('siswa', 10);
            $table->enum('n_jenis_prestasi', ['Akademik', 'NonAkademik']);
            $table->enum('o_jenis_prestasi', ['Akademik', 'NonAkademik']);
            $table->string('n_keterangan', 255);
            $table->string('o_keterangan', 255);
            $table->date('n_tanggal_prestasi');
            $table->date('o_tanggal_prestasi');
            $table->enum('n_semester', ['1', '2', '3', '4', '5', '6']);
            $table->enum('o_semester', ['1', '2', '3', '4', '5', '6']);
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
        Schema::dropIfExists('log_prestasis');
    }
};
