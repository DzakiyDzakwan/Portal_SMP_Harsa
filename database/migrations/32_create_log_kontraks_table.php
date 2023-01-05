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
        Schema::create('log_kontraks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kontrak_semester_id');
            $table->char('siswa',10);
            $table->char('kelas',6);
            $table->char('tahun_ajaran_aktif',9);
            $table->enum('semester_aktif',['ganjil', 'genap']);
            $table->integer('sakit')->unsigned()->default(0);
            $table->integer('izin')->unsigned()->default(0);
            $table->integer('alpa')->unsigned()->default(0);
            $table->enum('status', ['Lulus', 'Gagal', 'On Going']);
            $table->enum('action', ['insert', 'delete', 'update']);
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
        Schema::dropIfExists('log_kontraks');
    }
};
