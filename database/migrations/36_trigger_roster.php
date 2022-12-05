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
        CREATE TRIGGER log_insert_roster_kelas
        AFTER INSERT ON roster_kelas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_roster_kelas(roster_id, mapel, kelas, waktu_mulai, durasi, hari, action, created_at)
        VALUES (NEW.roster_id, NEW.mapel, NEW.kelas, NEW.waktu_mulai, NEW.durasi, NEW.hari, "insert", NOW());
        END
        ');

        /* log update kelas */
        DB::unprepared('
        CREATE TRIGGER log_update_roster_kelas
        AFTER UPDATE ON roster_kelas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_roster_kelas(roster_id, mapel, kelas, waktu_mulai, durasi, hari, action, created_at)
        VALUES (NEW.roster_id, NEW.mapel, NEW.kelas, NEW.waktu_mulai, NEW.durasi, NEW.hari, "update", NOW());
        END
        ');

        /* log delete kelas */
        DB::unprepared('
        CREATE TRIGGER log_delete_roster_kelas
        AFTER DELETE ON roster_kelas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_roster_kelas(roster_id, mapel, kelas, waktu_mulai, durasi, hari, action, created_at)
        VALUES (NEW.roster_id, NEW.mapel, NEW.kelas, NEW.waktu_mulai, NEW.durasi, NEW.hari, "delete", NOW());
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
    }
};
