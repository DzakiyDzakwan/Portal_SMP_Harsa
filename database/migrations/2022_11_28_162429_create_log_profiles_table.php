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
            $table->bigInteger('profile_id');
            $table->string('n_email')->nullable();
            $table->string('o_email')->nullable();
            $table->string('n_nama')->nullable();
            $table->string('o_nama')->nullable();
            $table->string('n_alamat')->nullable();
            $table->string('o_alamat')->nullable();
            $table->enum('jenis_kelamin', ['LK', 'PR']);
            $table->string('n_foto')->nullable();
            $table->string('o_foto')->nullable();
            $table->enum('keterangan', ['insert', 'update', 'delete']);
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
