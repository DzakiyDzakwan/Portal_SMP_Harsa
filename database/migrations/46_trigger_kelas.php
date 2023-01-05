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
        CREATE TRIGGER log_insert_kelas
        AFTER INSERT ON kelas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_kelas(kelas_id, nama_kelas, grade, kelompok_kelas,  action, created_at)
        VALUES (NEW.kelas_id, NEW.nama_kelas, NEW.grade, NEW.kelompok_kelas, "insert", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_update_kelas
        AFTER UPDATE ON kelas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_kelas(kelas_id, nama_kelas, grade, kelompok_kelas,  action, created_at)
        VALUES (NEW.kelas_id, NEW.nama_kelas, NEW.grade, NEW.kelompok_kelas, "update", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_delete_kelas
        AFTER DELETE ON kelas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_kelas(kelas_id, nama_kelas, grade, kelompok_kelas,  action, created_at)
        VALUES (OLD.kelas_id, OLD.nama_kelas, OLD.grade, OLD.kelompok_kelas, "delete", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER disable_update_kelas
        BEFORE UPDATE ON kelas
        FOR EACH ROW
        BEGIN
            IF (OLD.kelas_id <> NEW.kelas_id OR OLD.grade <> NEW.grade OR OLD.kelompok_kelas <> NEW.kelompok_kelas) THEN
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
        DB::unprepared('DROP TRIGGER log_insert_kelas');
        DB::unprepared('DROP TRIGGER log_update_kelas');
        DB::unprepared('DROP TRIGGER log_delete_kelas');
        DB::unprepared('DROP TRIGGER disable_update_kelas');
    }
};
