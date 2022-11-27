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
        Schema::create('konfirmasis', function (Blueprint $table) {
            $table->bigInteger('konfirmasi_id')->primary();
            $table->bigInteger('pelunasan');
            $table->text('keterangan')->nullable();
            $table->enum('status', ['pending', 'accepted', 'rejected']);
            $table->foreign('pelunasan')->references('pelunasan_id')->on('pelunasans');
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
        Schema::dropIfExists('konfirmasis');
    }
};
