<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* log insert kontrak */
        DB::unprepared('
        CREATE TRIGGER log_insert_kontrak
        AFTER INSERT ON kontrak_semesters
        FOR EACH ROW
        BEGIN
        INSERT INTO log_kontraks(kontrak_semester_id, siswa, kelas, semester_aktif, tahun_ajaran_aktif, sakit, izin, alpa, status, action, created_at)
        VALUES (NEW.kontrak_semester_id, NEW.siswa, NEW.kelas, NEW.semester_aktif, NEW.tahun_ajaran_aktif, NEW.sakit, NEW.izin, NEW.alpa, NEW.status, "insert", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_update_kontrak
        AFTER UPDATE ON kontrak_semesters
        FOR EACH ROW
        BEGIN
        INSERT INTO log_kontraks(kontrak_semester_id, siswa, kelas, semester_aktif, tahun_ajaran_aktif, sakit, izin, alpa, status, action, created_at)
        VALUES (NEW.kontrak_semester_id, NEW.siswa, NEW.kelas, NEW.semester_aktif, NEW.tahun_ajaran_aktif, NEW.sakit, NEW.izin, NEW.alpa, NEW.status, "update", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER disable_update_kontrak
        BEFORE UPDATE ON kontrak_semesters
        FOR EACH ROW
        BEGIN
            IF(NEW.kontrak_semester_id <> OLD.kontrak_semester_id OR NEW.siswa <> OLD.siswa OR NEW.kelas <> OLD.kelas) THEN
                SIGNAL SQLSTATE "45000"
                SET MESSAGE_TEXT = "Tidak dapat mengubah data";
            END IF;
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
        DB::unprepared('DROP TRIGGER log_insert_kontrak');
        DB::unprepared('DROP TRIGGER log_update_kontrak');
        DB::unprepared('DROP TRIGGER disable_update_kontrak');
    }
};
