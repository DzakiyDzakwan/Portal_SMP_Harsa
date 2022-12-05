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
        Schema::create('mapel_gurus', function (Blueprint $table) {
            $table->integer('mapel_guru_id')->primary();
            $table->char('mapel', 3);
            $table->char('guru', 18);
            $table->foreign('mapel')->references('mapel_id')->on('mapels');
            $table->foreign('guru')->references('NIP')->on('gurus');
            $table->timestamp('created_at');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mapel_gurus');
    }
};
