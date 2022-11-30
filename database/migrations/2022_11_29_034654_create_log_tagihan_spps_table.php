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
        Schema::create('log_tagihan_spps', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tagihan_id');
            $table->char('siswa', 10);
            $table->enum('n_bulan', ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']);
            $table->enum('o_bulan', ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']);
            $table->string('n_tahun_ajaran');
            $table->string('o_tahun_ajaran');
            $table->enum('n_semester', ['1', '2', '3', '4', '5', '6']);
            $table->enum('o_semester', ['1', '2', '3', '4', '5', '6']);
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
        Schema::dropIfExists('log_tagihan_spps');
    }
};
