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
            $table->char('NIP', 18);
            $table->char('user', 36);
            $table->enum('n_jabatan', ['wks', 'bk', 'guru']);
            $table->enum('o_jabatan', ['wks', 'bk', 'guru']);
            $table->string('n_pendidikan')->nullable();
            $table->string('o_pendidikan')->nullable();
            $table->year('n_tahun_ijazah')->nullable();
            $table->year('o_tahun_ijazah')->nullable();
            $table->enum('status_perkawinan', ['Kawin', 'Tidak Kawin'])->nullable();
            $table->date('n_tanggal_masuk');
            $table->date('o_tanggal_masuk');
            $table->enum('n_status_keaktifan', ['Aktif', 'Tidak Aktif']);
            $table->enum('o_status_keaktifan', ['Aktif', 'Tidak Aktif']);
            $table->enum('n_is_wali_kelas', ['iya', 'tidak']);
            $table->enum('o_is_wali_kelas', ['iya', 'tidak']);
            $table->time('created_at');
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
