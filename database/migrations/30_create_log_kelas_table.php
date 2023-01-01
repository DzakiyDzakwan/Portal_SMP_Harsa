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
        Schema::create('log_kelas', function (Blueprint $table) {
            $table->id();
            $table->char('kelas_id', 6);
            $table->char('wali_kelas', 16)->nullable();
            $table->enum('grade', ['7', '8', '9']);
            $table->char('kelompok_kelas', 1);
            $table->string('nama_kelas');
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
        Schema::dropIfExists('log_kelas');
    }
};
