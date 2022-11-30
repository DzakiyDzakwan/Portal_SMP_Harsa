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
        Schema::create('log_users', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36);
            $table->string('n_username', 255)->nullable();
            $table->string('o_username', 255)->nullable();
            $table->string('n_password', 255)->nullable();
            $table->string('o_password', 255)->nullable();
            $table->enum('role', ['Admin', 'Guru', 'Siswa']);
            $table->enum('keterangan', ['Insert', 'Update', 'Delete']);
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
        Schema::dropIfExists('log_users');
    }
};
