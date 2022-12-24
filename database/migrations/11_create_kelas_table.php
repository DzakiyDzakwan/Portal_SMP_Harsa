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
            $table->char('kelas_id', 6)->primary();
            $table->char('wali_kelas', 16)->nullable();
            $table->enum('grade', ['7', '8', '9']);
            $table->char('kelompok_kelas', 1);
            $table->string('nama_kelas')->unique();
            $table->foreign('wali_kelas')->references('NUPTK')->on('gurus')->onUpdate('cascade')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
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