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
        INSERT INTO log_kontraks(kontrak_semester_id, siswa, grade, semester, tahun_ajaran, status, action, created_at)
        VALUES (NEW.kontrak_semester_id, NEW.siswa, NEW.grade, NEW.semester, NEW.tahun_ajaran, NEW.status, "insert", NOW());
        END
        ');

        /* log update kontrak */
        DB::unprepared('
        CREATE TRIGGER log_update_kontrak
        AFTER UPDATE ON kontrak_semesters
        FOR EACH ROW
        BEGIN
        INSERT INTO log_kontraks(kontrak_semester_id, siswa, grade, semester, tahun_ajaran, status, action, created_at)
        VALUES (NEW.kontrak_semester_id, NEW.siswa, NEW.grade, NEW.semester, NEW.tahun_ajaran, NEW.status, "update", NOW());
        END
        ');

        /* log delete kontrak */
        DB::unprepared('
        CREATE TRIGGER log_delete_kontrak
        AFTER DELETE ON kontrak_semesters
        FOR EACH ROW
        BEGIN
        INSERT INTO log_kontraks(kontrak_semester_id, siswa, grade, semester, tahun_ajaran, status, action, created_at)
        VALUES (OLD.kontrak_semester_id, OLD.siswa, OLD.grade, OLD.semester, OLD.tahun_ajaran, OLD.status, "delete", NOW());
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
        DB::unprepared('DROP TRIGGER log_delete_kontrak');
    }
};
