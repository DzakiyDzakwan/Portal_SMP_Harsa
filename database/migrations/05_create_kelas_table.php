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
        Schema::create('kelas', function (Blueprint $table) {
            $table->char('kelas_id', 3)->primary();
            $table->char('wali_kelas', 18);
            $table->char('grade', 1);
            $table->char('kelompok_kelas', 1);
            $table->string('nama_kelas')->unique();
            $table->foreign('wali_kelas')->references('NIP')->on('gurus');
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
        Schema::dropIfExists('kelas');
    }
};
