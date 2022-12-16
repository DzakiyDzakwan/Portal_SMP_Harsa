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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id('nilai_id');
            $table->unsignedBigInteger('sesi');
            $table->char('mapel', 3);
            $table->unsignedBigInteger('kontrak_siswa');
            $table->integer('kkm');
            $table->enum('jenis_nilai', ['pengetahuan', 'keterampilan']);
            $table->float('nilai_pengetahuan');
            $table->text('deskripsi_pengetahuan');
            $table->float('nilai_keterampilan');
            $table->text('deskripsi_keterampilan');
            $table->enum('status', ['pending', 'confirmed', 'rejected']);
            $table->foreign('sesi')->references('sesi_id')->on('sesi_penilaians')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('mapel')->references('mapel_id')->on('mapels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kontrak_siswa')->references('kontrak_semester_id')->on('kontrak_semesters')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('nilais');
    }
};
