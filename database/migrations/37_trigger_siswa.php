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
        CREATE TRIGGER log_insert_siswa
        AFTER INSERT ON siswas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_siswas(NISN, NIS, kelas, user, tanggal_masuk, kelas_awal, anak_ke, nama_ayah, pekerjaan_ayah, nama_ibu, pekerjaan_ibu, alamat_orangtua, telepon_orangtua, nama_wali, pekerjaan_wali, telepon_wali, status, action, created_at)
        VALUES (NEW.NISN, NEW.NIS, NEW.kelas, NEW.user, NEW.tanggal_masuk, NEW.kelas_awal, NEW.anak_ke, NEW.nama_ayah, NEW.pekerjaan_ayah, NEW.nama_ibu, NEW.pekerjaan_ibu, NEW.alamat_orangtua, NEW.telepon_orangtua, NEW.nama_wali, NEW.pekerjaan_wali, NEW.telepon_wali, NEW.status, "insert", NOW());
        END
        ');

        /* log update kelas */
        DB::unprepared('
        CREATE TRIGGER log_update_siswa
        AFTER UPDATE ON siswas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_siswas(NISN, NIS, kelas, user, tanggal_masuk, kelas_awal, anak_ke, nama_ayah, pekerjaan_ayah, nama_ibu, pekerjaan_ibu, alamat_orangtua, telepon_orangtua, nama_wali, pekerjaan_wali, telepon_wali, status, action, created_at)
        VALUES (NEW.NISN, NEW.NIS, NEW.kelas, NEW.user, NEW.tanggal_masuk, NEW.kelas_awal, NEW.anak_ke, NEW.nama_ayah, NEW.pekerjaan_ayah, NEW.nama_ibu, NEW.pekerjaan_ibu, NEW.alamat_orangtua, NEW.telepon_orangtua, NEW.nama_wali, NEW.pekerjaan_wali, NEW.telepon_wali, NEW.status, "update", NOW());
        END
        ');

        /* log delete kelas */
        DB::unprepared('
        CREATE TRIGGER log_delete_siswa
        AFTER DELETE ON siswas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_siswas(NISN, NIS, kelas, user, tanggal_masuk, kelas_awal, anak_ke, nama_ayah, pekerjaan_ayah, nama_ibu, pekerjaan_ibu, alamat_orangtua, telepon_orangtua, nama_wali, pekerjaan_wali, telepon_wali, status, action, created_at)
        VALUES (OLD.NISN, OLD.NIS, OLD.kelas, OLD.user, OLD.tanggal_masuk, OLD.kelas_awal, OLD.anak_ke, OLD.nama_ayah, OLD.pekerjaan_ayah, OLD.nama_ibu, OLD.pekerjaan_ibu, OLD.alamat_orangtua, OLD.telepon_orangtua, OLD.nama_wali, OLD.pekerjaan_wali, OLD.telepon_wali, OLD.status, "delete", NOW());
        END
        ');

        /* disable update siswa */
        DB::unprepared('
        CREATE TRIGGER disable_update_siswa
        BEFORE UPDATE ON siswas
        FOR EACH ROW
        BEGIN
            IF (NEW.NISN <> OLD.NISN OR NEW.tanggal_masuk <> OLD.tanggal_masuk OR NEW.kelas_awal <> OLD.kelas_awal) THEN
                SIGNAL SQLSTATE "45000"
                SET MESSAGE_TEXT = "Tidak dapat mengubah data siswa tersebut";
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
        DB::unprepared('DROP TRIGGER log_insert_siswa');
        DB::unprepared('DROP TRIGGER log_update_siswa');
        DB::unprepared('DROP TRIGGER log_delete_siswa');
        DB::unprepared('DROP TRIGGER disable_update_siswa');
    }
};
