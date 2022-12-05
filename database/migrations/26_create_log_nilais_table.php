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
        Schema::create('log_nilais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nilai_id');
            $table->unsignedBigInteger('sesi');
            $table->char('mapel', 3);
            $table->char('kontrak_siswa', 10);
            $table->integer('kkm');
            $table->enum('jenis_nilai', ['uh1', 'uh2', 'uh3', 'uts', 'uas']);
            $table->float('nilai_pengetahuan', 8, 2);
            $table->text('deskripsi_pengetahuan');
            $table->float('nilai_keterampilan', 8, 2);
            $table->text('deskripsi_keterampilan');
            $table->enum('status', ['diterima', 'ditolak']);
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
        Schema::dropIfExists('log_nilais');
    }
};
