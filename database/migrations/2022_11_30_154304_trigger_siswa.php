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
        /* log insert kelas */
        DB::unprepared('
        CREATE TRIGGER log_insert_siswa
        AFTER INSERT ON siswas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_siswas(n_NISN, user, NIS, tanggal_masuk, kelas_awal, n_semester, n_status_keaktifan, keterangan, created_at)
        VALUES (NEW.NISN, NEW.user, NEW.NIS, NEW.tanggal_masuk, NEW.kelas_awal, NEW.semester, NEW.status_keaktifan, "insert", NOW());
        END
        ');

        /* log update kelas */
        DB::unprepared('
        CREATE TRIGGER log_update_siswa
        AFTER UPDATE ON siswas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_siswas(n_NISN, o_NISN, user, NIS, tanggal_masuk, kelas_awal, n_semester, o_semester, n_status_keaktifan, o_status_keaktifan, keterangan, created_at)
        VALUES (NEW.NISN, OLD.NISN, OLD.user, OLD.NIS, OLD.tanggal_masuk, OLD.kelas_awal, NEW.semester, OLD.semester, NEW.status_keaktifan, OLD.status_keaktifan, "update", NOW());
        END
        ');

        /* log delete kelas */
        DB::unprepared('
        CREATE TRIGGER log_delete_siswa
        AFTER DELETE ON siswas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_siswas(o_NISN, user, NIS, tanggal_masuk, kelas_awal, o_semester, o_status_keaktifan, keterangan, created_at)
        VALUES (OLD.NISN, OLD.user, OLD.NIS, OLD.tanggal_masuk, OLD.kelas_awal, OLD.semester, OLD.status_keaktifan, "insert", NOW());
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
        DB::unprepared('DROP TRIGGER log_insert_siswa');
        DB::unprepared('DROP TRIGGER log_update_siswa');
        DB::unprepared('DROP TRIGGER log_delete_siswa');
    }
};
