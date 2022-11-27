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
        Schema::create('nilais', function (Blueprint $table) {
            $table->bigInteger('nilai_id')->primary();
            $table->char('siswa', 10);
            $table->char('mata_pelajaran', 3);
            $table->enum('kategori', ['uh1', 'uh2', 'uh3', 'uts', 'uas']);
            $table->enum('semester', ['1', '2', '3', '4', '5', '6']);
            $table->year('tahun_ajaran');
            $table->integer('kkm');
            $table->float('nilai_pengetahuan');
            $table->text('deskripsi_pengetahuan');
            $table->float('nilai_keterampilan');
            $table->text('deskripsi_keterampilan');
            $table->foreign('siswa')->references('NISN')->on('siswas');
            $table->foreign('mata_pelajaran')->references('mapel_id')->on('mapels');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilais');
    }
};
