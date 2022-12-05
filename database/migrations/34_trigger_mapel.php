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
        /* log insert mapel */
        DB::unprepared('
        CREATE TRIGGER log_insert_mapel
        AFTER INSERT ON mapels
        FOR EACH ROW
        BEGIN
        INSERT INTO log_mapels(mapel_id,  nama_mapel, kelompok_mapel, kurikulum action, created_at)
        VALUES (NEW.mapel_id, NEW.nama_mapel, NEW.kelompok_mapel, NEW.kurikulum, "insert", NOW());
        END
        ');

        /* log update mapel */
        DB::unprepared('
        CREATE TRIGGER log_update_mapel
        AFTER UPDATE ON mapels
        FOR EACH ROW
        BEGIN
        INSERT INTO log_mapels(mapel_id,  nama_mapel, kelompok_mapel, kurikulum action, created_at)
        VALUES (NEW.mapel_id, NEW.nama_mapel, NEW.kelompok_mapel, NEW.kurikulum, "update", NOW());
        END
        ');

        /* log delete mapel */
        DB::unprepared('
        CREATE TRIGGER log_delete_mapel
        AFTER DELETE ON mapels
        FOR EACH ROW
        BEGIN
        INSERT INTO log_mapels(mapel_id,  nama_mapel, kelompok_mapel, kurikulum action, created_at)
        VALUES (NEW.mapel_id, NEW.nama_mapel, NEW.kelompok_mapel, NEW.kurikulum, "delete", NOW());
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
    }
};
