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
        Schema::create('kontrak_semesters', function (Blueprint $table) {
            $table->id('kontrak_semester_id');
            $table->char('siswa', 10);
            $table->char('kelas', 6);
            $table->char('grade', 1);
            $table->char('tahun_ajaran_aktif', 9);
            $table->enum('semester_aktif', ['ganjil', 'genap']);
            $table->integer('sakit')->unsigned()->default(0);
            $table->integer('izin')->unsigned()->default(0);
            $table->integer('alpa')->unsigned()->default(0);
            $table->enum('status', ['lulus', 'gagal', 'ongoing']);
            $table->foreign('siswa')->references('NISN')->on('siswas')->onUpdate('cascade')->onUpdate('cascade');
            $table->foreign('kelas')->references('kelas_id')->on('kelas')->onUpdate('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('kontrak_semesters');
    }
};
