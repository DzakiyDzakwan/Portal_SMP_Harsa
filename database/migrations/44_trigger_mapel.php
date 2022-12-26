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
        /* log insert mapel */
        DB::unprepared('
        CREATE TRIGGER log_insert_mapel
        AFTER INSERT ON mapels
        FOR EACH ROW
        BEGIN
        INSERT INTO log_mapels(mapel_id, nama_mapel, kelompok_mapel, kkm, kurikulum, action, created_at)
        VALUES (NEW.mapel_id, NEW.nama_mapel, NEW.kelompok_mapel, NEW.kkm, NEW.kurikulum, "insert", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_update_mapel
        AFTER UPDATE ON mapels
        FOR EACH ROW
        BEGIN
        INSERT INTO log_mapels(mapel_id, nama_mapel, kelompok_mapel, kkm, kurikulum, action, created_at)
        VALUES (NEW.mapel_id, NEW.nama_mapel, NEW.kelompok_mapel, NEW.kkm, NEW.kurikulum, "update", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_delete_mapel
        AFTER DELETE ON mapels
        FOR EACH ROW
        BEGIN
        INSERT INTO log_mapels(mapel_id, nama_mapel, kelompok_mapel, kkm, kurikulum, action, created_at)
        VALUES (OLD.mapel_id, OLD.nama_mapel, OLD.kelompok_mapel, OLD.kkm, OLD.kurikulum, "delete", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER disable_update_mapel
        BEFORE UPDATE ON mapels
        FOR EACH ROW
        BEGIN
            IF (OLD.kurikulum <> NEW.kurikulum or OLD.mapel_id <> NEW.mapel_id) THEN
                SIGNAL SQLSTATE "45000"
                SET MESSAGE_TEXT = "Tidak dapat mengubah kurikulum";
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
        DB::unprepared('DROP TRIGGER log_insert_mapel');
        DB::unprepared('DROP TRIGGER log_update_mapel');
        DB::unprepared('DROP TRIGGER log_delete_mapel');
        DB::unprepared('DROP TRIGGER disable_update_mapel');
    }
};
