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
        Schema::create('log_siswas', function (Blueprint $table) {
            $table->id();
            $table->char('n_NISN',10);
            $table->char('o_NISN',10);
            $table->char('n_kelas',3)->nullable();
            $table->char('o_kelas',3)->nullable();
            $table->char('user',36);
            $table->char('NIS',4);
            $table->date('tanggal_masuk');
            $table->string('kelas_awal');
            $table->enum('n_semester',['1', '2', '3', '4', '5', '6'])->nullable();
            $table->enum('o_semester',['1', '2', '3', '4', '5', '6'])->nullable();
            $table->enum('n_status_keaktifan',['Aktif', 'Lulus', 'Pindah', 'Drop Out'])->nullable();
            $table->enum('o_status_keaktifan',['Aktif', 'Lulus', 'Pindah', 'Drop Out'])->nullable();
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
        Schema::dropIfExists('log_siswas');
    }
};
