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
        CREATE TRIGGER log_insert_kelas
        AFTER INSERT ON kelas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_kelas(kelas_id, wali_kelas, grade, kelompok_kelas, nama_kelas, action, created_at)
        VALUES (NEW.kelas_id, NEW.wali_kelas, NEW.grade, NEW.kelompok_kelas, NEW.nama_kelas, "insert", NOW());
        END
        ');

        /* log update kelas */
        DB::unprepared('
        CREATE TRIGGER log_update_kelas
        AFTER UPDATE ON kelas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_kelas(kelas_id, wali_kelas, grade, kelompok_kelas, nama_kelas, action, created_at)
        VALUES (NEW.kelas_id, NEW.wali_kelas, NEW.grade, NEW.kelompok_kelas, NEW.nama_kelas, "update", NOW());
        END
        ');

        /* log delete kelas */
        DB::unprepared('
        CREATE TRIGGER log_delete_kelas
        AFTER DELETE ON kelas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_kelas(kelas_id, wali_kelas, grade, kelompok_kelas, nama_kelas, action, created_at)
        VALUES (NEW.kelas_id, NEW.wali_kelas, NEW.grade, NEW.kelompok_kelas, NEW.nama_kelas, "delete", NOW());
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
    }
};
