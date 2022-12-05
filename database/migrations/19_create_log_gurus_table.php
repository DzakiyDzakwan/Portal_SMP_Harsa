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
        Schema::create('log_gurus', function (Blueprint $table) {
            $table->id();
            $table->char('user', 36);
            $table->char('NIP', 18);
            $table->enum('jabatan', ['wks', 'bk', 'guru']);
            $table->string('pendidikan')->nullable();
            $table->year('tahun_ijazah')->nullable();
            $table->enum('status_perkawinan', ['Kawin', 'Tidak Kawin'])->nullable();
            $table->date('tanggal_masuk');
            $table->enum('status', ['Aktif', 'Inaktif']);
            $table->enum('is_wali_kelas', ['iya', 'tidak']);
            $table->enum('action', ['insert', 'update', 'delete']);
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
        Schema::dropIfExists('log_gurus');
    }
};
