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
        Schema::create('ekskul_siswas', function (Blueprint $table) {
            $table->id('ekskul_siswa_id');
            $table->char('ekskul', 5);
            $table->unsignedBigInteger('kontrak_siswa');
            $table->float('nilai');
            $table->text('keterangan');
            $table->foreign('ekskul')->references('ekskul_id')->on('ekskuls');
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
        Schema::dropIfExists('ekskul_siswas');
    }
};
