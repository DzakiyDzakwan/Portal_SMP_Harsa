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
        Schema::create('rekap_absensis', function (Blueprint $table) {
            $table->id('rekap_absensi_id');
            $table->unsignedBigInteger('kontrak_siswa');
            $table->integer('sakit');
            $table->integer('izin');
            $table->integer('alpa');
            $table->foreign('kontrak_siswa')->references('kontrak_semester_id')->on('kontrak_semesters');
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
        Schema::dropIfExists('rekap_absensis');
    }
};
