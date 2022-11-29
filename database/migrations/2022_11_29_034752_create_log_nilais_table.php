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
        Schema::create('log_nilais', function (Blueprint $table) {
            $table->BIGINT('id')->primary();
            $table->BIGINT('nilai_id');
            $table->CHAR('siswa', 10);
            $table->CHAR('mata_pelajaran', 3);
            $table->ENUM('kategori', ['uh1', 'uh2', 'uh3', 'uts', 'uas']);
            $table->ENUM('n_semester', ['1', '2', '3', '4', '5', '6'])->nullable();
            $table->ENUM('o_semester', ['1', '2', '3', '4', '5', '6'])->nullable();
            $table->integer('tahun_ajaran');
            $table->integer('n_kkm')->nullable();
            $table->integer('o_kkm')->nullable();
            $table->float('n_nilai_pengetahuan', 8, 2)->nullable();
            $table->float('o_nilai_pengetahuan', 8, 2)->nullable();
            $table->TEXT('n_deskripsi_pengetahuan')->nullable();
            $table->TEXT('o_deskripsi_pengetahuan')->nullable();
            $table->float('n_nilai_keterampilan', 8, 2)->nullable();
            $table->float('o_nilai_keterampilan', 8, 2)->nullable();
            $table->TEXT('n_deskripsi_keterampilan')->nullable();
            $table->TEXT('o_deskripsi_keterampilan')->nullable();
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
        Schema::dropIfExists('log_nilais');
    }
};
