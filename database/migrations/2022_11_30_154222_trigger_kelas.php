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
        INSERT INTO log_kelas(n_kelas_id, n_wali_kelas, n_kelompok_kelas, n_nama_kelas, keterangan, created_at)
        VALUES (NEW.kelas_id, NEW.wali_kelas, NEW.kelompok_kelas, NEW.nama_kelas, "insert", NOW());
        END
        ');

        /* log update kelas */
        DB::unprepared('
        CREATE TRIGGER log_update_kelas
        AFTER UPDATE ON kelas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_kelas(n_kelas_id, o_kelas_id, n_kelompok_kelas, o_kelompok_kelas, n_nama_kelas, o_nama_kelas, keterangan, created_at)
        VALUES (NEW.kelas_id, OLD.kelas_id, NEW.kelompok_kelas, OLD.kelompok_kelas, NEW.nama_kelas, OLD.nama_kelas,  "update", NOW());
        END
        ');

        /* log delete kelas */
        DB::unprepared('
        CREATE TRIGGER log_delete_kelas
        AFTER DELETE ON kelas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_kelas(o_kelas_id, o_nama_kelas, o_kelompok_kelas, keterangan, created_at)
        VALUES (OLD.kelas_id, OLD.nama_kelas, OLD.kelompok_kelas, "delete", NOW());
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
