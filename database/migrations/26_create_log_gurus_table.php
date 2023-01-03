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
            $table->char('NUPTK', 16);
            $table->enum('jabatan', ['guru', 'wks', 'ks']);
            $table->string('pendidikan')->nullable();
            $table->year('tahun_ijazah')->nullable();
            $table->enum('status_perkawinan', ['kawin', 'tidak kawin'])->nullable();
            $table->date('tanggal_masuk');
            $table->enum('status', ['aktif', 'inaktif']);
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
