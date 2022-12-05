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
        Schema::create('log_rekap_absensis', function (Blueprint $table) {
            $table->id();
            $table->char('absensi_id', 5);
            $table->unsignedBigInteger('kontrak');
            $table->integer('sakit')->unsigned();
            $table->integer('izin')->unsigned();
            $table->integer('alpa')->unsigned();
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
        Schema::dropIfExists('log_rekap_absensis');
    }
};
