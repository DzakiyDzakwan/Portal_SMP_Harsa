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
        Schema::create('log_profiles', function (Blueprint $table) {
            $table->id();
            $table->char('user', 36);
            $table->string('email')->nullable();
            $table->string('nama');
            $table->string('alamat_tinggal')->nullable();
            $table->string('alamat_domisili')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->enum('jenis_kelamin', ['LK', 'PR']);
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('log_profiles');
    }
};
