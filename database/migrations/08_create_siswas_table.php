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
        Schema::create('siswas', function (Blueprint $table) {
            $table->char('NISN', 10)->primary();
            $table->char('kelas', 3);
            $table->uuid('user');
            $table->char('NIS', 4);
            $table->date('tanggal_masuk');
            $table->string('kelas_awal');
            $table->integer('anak_ke')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('alamat_orangtua')->nullable();
            $table->char('telepon_orangtua', 13)->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->char('telepon_wali', 13)->nullable();
            $table->enum('status', ['Aktif', 'Lulus', 'Pindah', 'Drop Out'])->default('Aktif');
            $table->foreign('kelas')->references('kelas_id')->on('kelas')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('siswas');
    }
};
