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
        Schema::create('ekstrakulikuler', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('ekskul_id', 5)->primary();
            $table->string('nama', 50);
            $table->enum('hari', ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu']);
            $table->date('waktu_mulai');
            $table->date('waktu_akhir');
            $table->string('tempat', 50);
            $table->string('kelas', 20);
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
        Schema::dropIfExists('ekstrakulikuler');
    }
};
