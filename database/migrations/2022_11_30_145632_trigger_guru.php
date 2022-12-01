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
        /* log_insert_guru */
        DB::unprepared('
        CREATE TRIGGER log_insert_guru
        AFTER INSERT ON gurus
        FOR EACH ROW
        BEGIN
        INSERT INTO log_gurus(user, n_NIP, n_jabatan, n_pendidikan, n_tahun_ijazah, status_perkawinan, tanggal_masuk, n_status_keaktifan, n_is_wali_kelas, keterangan, created_at)
        VALUES (NEW.user, NEW.NIP, NEW.jabatan, NEW.pendidikan, NEW.tahun_ijazah, NEW.status_perkawinan, NEW.tanggal_masuk, NEW.status_keaktifan, NEW.is_wali_kelas, "insert", NOW());
        END
        ');

        /* log_update_guru */
        DB::unprepared('
        CREATE TRIGGER log_update_guru
        AFTER UPDATE ON gurus
        FOR EACH ROW
        BEGIN
        INSERT INTO log_gurus(user, n_NIP, o_nip, n_jabatan, o_jabatan, n_pendidikan, o_pendidikan, n_tahun_ijazah, o_tahun_ijazah, status_perkawinan, tanggal_masuk, n_status_keaktifan, o_status_keaktifan, n_is_wali_kelas, o_is_wali_kelas, keterangan, created_at)
        VALUES (OLD.user, NEW.NIP, OLD.NIP, NEW.jabatan, OLD.jabatan, NEW.pendidikan, OLD.pendidikan, NEW.tahun_ijazah, OLD.tahun_ijazah, NEW.status_perkawinan, OLD.status_perkawinan, OLD.tanggal_masuk, NEW.status_keaktifan, OLD.status_keaktifan, NEW.is_wali_kelas, OLD.is_wali_kelas, "update", NOW());
        END
        ');

        /* log_delete_guru */
        DB::unprepared('
        CREATE TRIGGER log_delete_guru
        AFTER DELETE ON gurus
        FOR EACH ROW
        BEGIN
        INSERT INTO log_gurus(user, o_nip, o_jabatan, o_pendidikan, o_tahun_ijazah, status_perkawinan, tanggal_masuk, o_status_keaktifan, o_is_wali_kelas, keterangan, created_at)
        VALUES (OLD.user, OLD.NIP, OLD.jabatan, OLD.pendidikan, OLD.tahun_ijazah, OLD.status_perkawinan, OLD.tanggal_masuk, OLD.status_keaktifan, OLD.is_wali_kelas, "delete", NOW());
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
    }
};
