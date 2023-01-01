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
        /* log insert kelas */
        DB::unprepared('
        CREATE TRIGGER log_insert_roster_kelas
        AFTER INSERT ON rosters
        FOR EACH ROW
        BEGIN
        INSERT INTO log_rosters(roster_id, mapel_guru, kelas, tahun_ajaran_aktif, semester_aktif, waktu_mulai, waktu_akhir, hari, action, created_at)
        VALUES (NEW.roster_id, NEW.mapel_guru, NEW.kelas, NEW.tahun_ajaran_aktif, NEW.semester_aktif, NEW.waktu_mulai, NEW.waktu_akhir, NEW.hari, "insert", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_update_roster_kelas
        AFTER UPDATE ON rosters
        FOR EACH ROW
        BEGIN
        INSERT INTO log_rosters(roster_id, mapel_guru, kelas, tahun_ajaran_aktif, semester_aktif, waktu_mulai, waktu_akhir, hari, action, created_at)
        VALUES (NEW.roster_id, NEW.mapel_guru, NEW.kelas, NEW.tahun_ajaran_aktif, NEW.semester_aktif, NEW.waktu_mulai, NEW.waktu_akhir, NEW.hari, "update", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_delete_roster_kelas
        AFTER DELETE ON rosters
        FOR EACH ROW
        BEGIN
        INSERT INTO log_rosters(roster_id, mapel_guru, kelas, tahun_ajaran_aktif, semester_aktif, waktu_mulai, waktu_akhir, hari, action, created_at)
        VALUES (OLD.roster_id, OLD.mapel_guru, OLD.kelas, OLD.tahun_ajaran_aktif, OLD.semester_aktif, OLD.waktu_mulai, OLD.waktu_akhir, OLD.hari, "delete", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER disable_update_roster
        BEFORE UPDATE ON rosters
        FOR EACH ROW
        BEGIN
            IF (OLD.kelas <> NEW.kelas OR OLD.tahun_ajaran_aktif <> NEW.tahun_ajaran_aktif OR OLD.semester_aktif <> NEW.semester_aktif OR OLD.roster_id <> NEW.roster_id) THEN
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
        DB::unprepared('DROP TRIGGER log_insert_roster_kelas');
        DB::unprepared('DROP TRIGGER log_update_roster_kelas');
        DB::unprepared('DROP TRIGGER log_delete_roster_kelas');
        DB::unprepared('DROP TRIGGER disable_update_roster');
    }
};
