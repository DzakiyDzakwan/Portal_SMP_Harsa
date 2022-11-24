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
        Schema::create('mata_pelajaran', function (Blueprint $table) {
            $table->integer('mapel_id')->primary();
            $table->string('nama_mapel', 255)->nullable(false);
            $table->enum('kelompok_mapel' ,['A', 'B'])->nullable(false);
            $table->enum('KKM', ['81', '82', '83', '84'])->nullable(false);
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
        Schema::dropIfExists('_mata__pelajaran');
    }
};
