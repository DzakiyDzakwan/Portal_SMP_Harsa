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
            $table->char('grade', 1);
            $table->enum('semester', ['Ganjil', 'Genap']);
            $table->year('tahun_ajaran');
            $table->enum('status', ['Lulus', 'Gagal', 'On Going']);
            $table->foreign('siswa')->references('NISN')->on('siswas');
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