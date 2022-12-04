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
        /* log insert ekskul */
        DB::unprepared('
        CREATE TRIGGER log_insert_ekskul
        AFTER INSERT on ekskuls
        FOR EACH ROW
        BEGIN
        INSERT INTO log_ekskuls (n_ekskul_id, n_nama, n_hari, n_waktu_mulai, n_waktu_akhir, n_tempat, n_kelas, keterangan, created_at)
        VALUES (NEW.ekskul_id, NEW.nama, NEW.hari, NEW.waktu_mulai, NEW.waktu_akhir, NEW.tempat, NEW.kelas, "insert", NOW());
        END
        ');

        /* log delete ekskul */
        DB::unprepared('
        CREATE TRIGGER log_delete_ekskul
        AFTER DELETE on ekskuls
        FOR EACH ROW
        BEGIN
        INSERT INTO log_ekskuls (o_ekskul_id, o_nama, o_hari, o_waktu_mulai, o_waktu_akhir, o_tempat, o_kelas, keterangan, created_at)
        VALUES (OLD.ekskul_id, OLD.nama, OLD.hari, OLD.waktu_mulai, OLD.waktu_akhir, OLD.tempat, OLD.kelas, "delete", NOW());
        END
        ');


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER log_ekskul');
        DB::unprepared('DROP TRIGGER log_delete_ekskul');
    }
};
