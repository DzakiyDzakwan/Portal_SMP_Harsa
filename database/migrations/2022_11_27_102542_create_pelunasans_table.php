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
        Schema::create('pelunasans', function (Blueprint $table) {
            $table->bigInteger('pelunasan_id')->primary();
            $table->bigInteger('tagihan_id');
            $table->text('keterangan');
            $table->string('bukti');
            $table->foreign('tagihan_id')->references('tagihan_id')->on('tagihan_spps');
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
        Schema::dropIfExists('pelunasans');
    }
};
