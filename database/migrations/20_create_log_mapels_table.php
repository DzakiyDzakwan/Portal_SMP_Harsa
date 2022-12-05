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
            $table->char('mapel_id', 3);
            $table->string('nama_mapel');
            $table->enum('kelompok_mapel', ['A', 'B']);
            $table->string('kurikulum');
            $table->enum('action', ['insert', 'update', 'delete']);
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
