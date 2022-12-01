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
        Schema::create('log_mapels', function (Blueprint $table) {
            $table->id();
            $table->char('n_mapel_id',3);
            $table->char('o_mapel_id',3);
            $table->string('n_nama_mapel');
            $table->string('o_nama_mapel');
            $table->enum('n_kelompok_mapel', ['A', 'B']);
            $table->enum('o_kelompok_mapel', ['A', 'B']);
            $table->enum('keterangan', ['insert', 'update', 'delete']);
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_mapels');
    }
};
