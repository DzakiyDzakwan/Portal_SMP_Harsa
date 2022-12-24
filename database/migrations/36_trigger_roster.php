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
        /* DB::unprepared('
        CREATE TRIGGER log_insert_roster_kelas
        AFTER INSERT ON roster_kelas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_rosters(roster_id, mapel, kelas, waktu_mulai, durasi, hari, action, created_at)
        VALUES (NEW.roster_id, NEW.mapel, NEW.kelas, NEW.waktu_mulai, NEW.durasi, NEW.hari, "insert", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_update_roster_kelas
        AFTER UPDATE ON roster_kelas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_rosters(roster_id, mapel, kelas, waktu_mulai, durasi, hari, action, created_at)
        VALUES (NEW.roster_id, NEW.mapel, NEW.kelas, NEW.waktu_mulai, NEW.durasi, NEW.hari, "update", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_delete_roster_kelas
        AFTER DELETE ON roster_kelas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_rosters(roster_id, mapel, kelas, waktu_mulai, durasi, hari, action, created_at)
        VALUES (OLD.roster_id, OLD.mapel, OLD.kelas, OLD.waktu_mulai, OLD.durasi, OLD.hari, "delete", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER cant_update_roster
        BEFORE UPDATE ON roster_kelas
        FOR EACH ROW
        BEGIN
            IF (OLD.mapel <> NEW.mapel OR OLD.kelas <> NEW.kelas) THEN
                SIGNAL SQLSTATE "45000"
                SET MESSAGE_TEXT = "Tidak dapat mengubah data";
            END IF;
        END
        '); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /* DB::unprepared('DROP TRIGGER log_insert_roster_kelas');
        DB::unprepared('DROP TRIGGER log_update_roster_kelas');
        DB::unprepared('DROP TRIGGER log_delete_roster_kelas');
        DB::unprepared('DROP TRIGGER cant_update_roster'); */
    }
};
