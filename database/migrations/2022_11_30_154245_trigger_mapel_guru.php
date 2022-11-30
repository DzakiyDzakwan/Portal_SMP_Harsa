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
        /* log insert mapel_guru */
        DB::unprepared('
        CREATE TRIGGER log_insert_mapel_guru
        AFTER INSERT ON mapel_gurus
        FOR EACH ROW
        BEGIN
        INSERT INTO log_mapel_gurus(mapel_guru_id, mapel, guru, keterangan, created_at)
        VALUES (NEW.mapel_guru_id, NEW.mapel, NEW.guru, "insert", NOW());
        END
        ');

        /* log delete mapel_guru */
        DB::unprepared('
        CREATE TRIGGER log_delete_mapel_guru
        AFTER DELETE ON mapel_gurus
        FOR EACH ROW
        BEGIN
        INSERT INTO log_mapel_gurus(mapel_guru_id, mapel, guru, keterangan, created_at)
        VALUES (OLD.mapel_guru_id, OLD.mapel, OLD.guru, "delete", NOW());
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
        DB::unprepared('DROP TRIGGER log_insert_mapel_guru');
        DB::unprepared('DROP TRIGGER log_delete_mapel_guru');
    }
};
