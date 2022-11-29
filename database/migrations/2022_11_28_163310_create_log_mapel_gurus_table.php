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
        Schema::create('log_mapel_gurus', function (Blueprint $table) {
            $table->id();
            $table->integer('mapel_guru_id');
            $table->char('mapel',3);
            $table->char('guru', 18);
            $table->enum('keterangan', ['insert','delete']);
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
        Schema::dropIfExists('log_mapel_gurus');
    }
};
