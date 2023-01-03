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
        Schema::create('gurus', function (Blueprint $table) {
            $table->char('NUPTK', 18)->nullable()->primary();
            $table->uuid('user');
            $table->enum('jabatan', ['ks', 'wks', 'guru']);
            $table->string('pendidikan')->nullable();
            $table->year('tahun_ijazah')->nullable();
            $table->enum('status_perkawinan', ['kawin', 'tidak kawin'])->nullable();
            $table->date('tanggal_masuk');
            $table->enum('status', ['aktif', 'inaktif'])->default('aktif');
            $table->foreign('user')->references('uuid')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('gurus');
    }
    
};
