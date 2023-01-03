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
            $table->char('sesi', 36);
            $table->char('mapel', 3);
            $table->char('guru', 16);
            $table->char('pemeriksa', 36)->nullable();
            $table->unsignedBigInteger('kontrak_siswa');
            $table->enum('jenis', ['uh1', 'uh2', 'uh3', 'uts', 'uas']);
            $table->integer('kkm');
            $table->float('nilai_pengetahuan', 8, 2);
            $table->text('deskripsi_pengetahuan');
            $table->float('nilai_keterampilan', 8, 2);
            $table->text('deskripsi_keterampilan');
            $table->enum('status', ['pending', 'confirmed', 'rejected']);
            $table->text('keterangan')->nullable();
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
