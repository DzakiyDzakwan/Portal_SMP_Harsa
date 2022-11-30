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
        INSERT INTO log_roster_kelas(roster_id, mapel_guru, kelas, n_jam_masuk, n_jam_keluar, n_hari, keterangan, created_at)
        VALUES (NEW.roster_id, NEW.mapel_guru, NEW.kelas, NEW.jam_masuk, NEW.jam_keluar, NEW.hari, "insert", NOW());
        END
        ');

        /* log update kelas */
        DB::unprepared('
        CREATE TRIGGER log_update_roster_kelas
        AFTER UPDATE ON roster_kelas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_roster_kelas(roster_id, mapel_guru, kelas, n_jam_masuk, o_jam_masuk, n_jam_keluar, o_jam_keluar,  n_hari, o_hari, keterangan, created_at)
        VALUES (OLD.roster_id, OLD.mapel_guru, OLD.kelas, NEW.jam_masuk, OLD.jam_masuk, NEW.jam_keluar, OLD.jam_keluar, NEW.hari, OLD.hari, "update", NOW());
        END
        ');

        /* log delete kelas */
        DB::unprepared('
        CREATE TRIGGER log_delete_roster_kelas
        AFTER DELETE ON roster_kelas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_roster_kelas(roster_id, mapel_guru, kelas, o_jam_masuk, o_jam_keluar, o_hari, keterangan, created_at)
        VALUES (OLD.roster_id, OLD.mapel_guru, OLD.kelas, OLD.jam_masuk, OLD.jam_keluar, OLD.hari, "delete", NOW());
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
