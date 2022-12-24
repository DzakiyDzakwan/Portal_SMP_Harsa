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
            $table->char('grade',1);
            $table->enum('semester',['Ganjil', 'Genap']);
            $table->char('tahun_ajaran',9);
            $table->integer('sakit')->unsigned()->default(0);
            $table->integer('izin')->unsigned()->default(0);
            $table->integer('alpa')->unsigned()->default(0);
            $table->enum('status', ['Lulus', 'Gagal', 'On Going']);
            $table->enum('action', ['insert', 'delete', 'update']);
            $table->timestamps('created_at');
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
