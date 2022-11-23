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
            $table->char('NIP', 18)->primary();
            $table->char('user', 36);
            $table->enum('jabatan', ['wks', 'bk', 'guru']);
            $table->string('pendidikan')->nullable();
            $table->year('tahun_ijazah')->nullable();
            $table->enum('status_perkawinan', ['Kawin', 'Tidak Kawin'])->nullable();
            $table->date('tanggal_masuk');
            $table->enum('status_keaktifan', ['Aktif', 'Tidak Aktif']);
            $table->enum('is_wali_kelas', ['iya', 'tidak']);
            $table->foreign('user')->references('uuid')->on('users');
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
