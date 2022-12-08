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
        /* log_insert_guru */
        DB::unprepared('
        CREATE TRIGGER log_insert_guru
        AFTER INSERT ON gurus
        FOR EACH ROW
        BEGIN
        INSERT INTO log_gurus(user, NIP, jabatan, pendidikan, tahun_ijazah, status_perkawinan, tanggal_masuk, status, is_wali_kelas, action, created_at)
        VALUES (NEW.user, NEW.NIP, NEW.jabatan, NEW.pendidikan, NEW.tahun_ijazah, NEW.status_perkawinan, NEW.tanggal_masuk, NEW.status, NEW.is_wali_kelas, "insert", NOW());
        END
        ');

        /* log_update_guru */
        DB::unprepared('
        CREATE TRIGGER log_update_guru
        AFTER UPDATE ON gurus
        FOR EACH ROW
        BEGIN
        INSERT INTO log_gurus(user, NIP, jabatan, pendidikan, tahun_ijazah, status_perkawinan, tanggal_masuk, status, is_wali_kelas, action, created_at)
        VALUES (NEW.user, NEW.NIP, NEW.jabatan, NEW.pendidikan, NEW.tahun_ijazah, NEW.status_perkawinan, NEW.tanggal_masuk, NEW.status, NEW.is_wali_kelas, "update", NOW());
        END
        ');

        /* log_delete_guru */
        DB::unprepared('
        CREATE TRIGGER log_delete_guru
        AFTER DELETE ON gurus
        FOR EACH ROW
        BEGIN
        INSERT INTO log_gurus(user, NIP, jabatan, pendidikan, tahun_ijazah, status_perkawinan, tanggal_masuk, status, is_wali_kelas, action, created_at)
        VALUES (OLD.user, OLD.NIP, OLD.jabatan, OLD.pendidikan, OLD.tahun_ijazah, OLD.status_perkawinan, OLD.tanggal_masuk, OLD.status, OLD.is_wali_kelas, "delete", NOW());
        END
        ');

        /* cant_update_guru */
        DB::unprepared('
        CREATE TRIGGER cant_update_guru
        BEFORE UPDATE ON gurus
        FOR EACH ROW
        BEGIN
            IF (OLD.user <> NEW.user OR OLD.tanggal_masuk <> NEW.tanggal_masuk) THEN
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
        DB::unprepared('DROP TRIGGER log_insert_guru');
        DB::unprepared('DROP TRIGGER log_update_guru');
        DB::unprepared('DROP TRIGGER log_delete_guru');
        DB::unprepared('DROP TRIGGER cant_update_guru');
    }
};
