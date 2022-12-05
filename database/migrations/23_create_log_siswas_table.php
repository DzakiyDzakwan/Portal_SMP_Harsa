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
        Schema::create('log_siswas', function (Blueprint $table) {
            $table->id();
            $table->char('NISN',10);
            $table->char('NIS',4);
            $table->char('kelas',3);
            $table->char('user',36);
            $table->date('tanggal_masuk');
            $table->string('kelas_awal');
            $table->integer('anak-ke');
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('alamat_orangtua');
            $table->char('telepon_orangtua',13);
            $table->string('nama_wali');
            $table->string('pekerjaan_wali');
            $table->char('telepon_wali',13);
            $table->enum('status_keaktifan',['Aktif', 'Lulus', 'Pindah', 'Drop Out']);
            $table->enum('action', ['insert','update','delete']);
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
        Schema::dropIfExists('log_siswas');
    }
};
