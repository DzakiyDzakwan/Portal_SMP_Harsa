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
            $table->id();
            $table->bigInteger('pelunasan_id');
            $table->bigInteger('tagihan_id');
            $table->text('n_keterangan');
            $table->text('o_keterangan');
            $table->string('n_bukti', 255);
            $table->string('o_bukti', 255);
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
        Schema::dropIfExists('log_pelunasan_tagihans');
    }
};
