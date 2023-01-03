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
            $table->id('mapel_guru_id');
            $table->char('mapel', 5);
            $table->char('guru', 16);
            $table->foreign('mapel')->references('mapel_id')->on('mapels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('guru')->references('NUPTK')->on('gurus')->onUpdate('cascade')->onDelete('cascade');
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
