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
        Schema::create('log_pelunasan_tagihans', function (Blueprint $table) {
            $table->BIGINT('id')->primary();
            $table->BIGINT('pelunasan_id');
            $table->BIGINT('tagihan_id');
            $table->TEXT('n_keterangan');
            $table->TEXT('o_keterangan');
            $table->VARCHAR('n_bukti', 255);
            $table->VARCHAR('o_bukti', 255);
            $table->enum('keterangan', ['insert', 'update', 'delete']);
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
        Schema::dropIfExists('log_pelunasan_tagihans');
    }
};
