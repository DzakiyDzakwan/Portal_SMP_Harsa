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
            $table->char('mapel', 5);
            $table->char('guru', 16)->nullable();
            $table->uuid('pemeriksa')->nullable();
            $table->unsignedBigInteger('kontrak_siswa');
            $table->enum('jenis', ['uh1', 'uh2', 'uh3', 'uts', 'uas']);
            $table->integer('kkm_aktif');
            $table->float('nilai_pengetahuan');
            $table->text('deskripsi_pengetahuan');
            $table->float('nilai_keterampilan');
            $table->text('deskripsi_keterampilan');
            $table->enum('status', ['pending', 'confirmed', 'rejected']);
            $table->text("keterangan")->nullable();
            $table->foreign('sesi')->references('sesi_id')->on('sesi_penilaians')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('mapel')->references('mapel_id')->on('mapels')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('guru')->references('NIP')->on('gurus')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('pemeriksa')->references('uuid')->on('users')->onUpdate('cascade')->onDelete('set null');
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
