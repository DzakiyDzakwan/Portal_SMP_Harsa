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
        DB::unprepared('
        CREATE TRIGGER log_insert_sesi
        AFTER INSERT ON sesi_penilaians
        FOR EACH ROW
        BEGIN
        INSERT INTO log_sesis(nama_sesi, tahun_ajaran_aktif, semester_aktif, tanggal_mulai, tanggal_berakhir, action, created_at)
        VALUES (NEW.nama_sesi, NEW.tahun_ajaran_aktif, NEW.semester_aktif, NEW.tanggal_mulai, NEW.tanggal_berakhir, "insert", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_update_sesi
        AFTER UPDATE ON sesi_penilaians
        FOR EACH ROW
        BEGIN
        INSERT INTO log_sesis(nama_sesi, tahun_ajaran_aktif, semester_aktif, tanggal_mulai, tanggal_berakhir, action, created_at)
        VALUES (NEW.nama_sesi, NEW.tahun_ajaran_aktif, NEW.semester_aktif, NEW.tanggal_mulai, NEW.tanggal_berakhir, "update", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER disable_update_sesi
        BEFORE UPDATE ON sesi_penilaians
        FOR EACH ROW
        BEGIN
            IF (OLD.sesi_id <> NEW.sesi_id OR OLD.nama_sesi <> NEW.nama_sesi OR OLD.semester_aktif <> NEW.semester_aktif OR OLD.tahun_ajaran_aktif <> NEW.tahun_ajaran_aktif) THEN
                SIGNAL SQLSTATE "45000"
                SET MESSAGE_TEXT = "Tidak dapat mengubah data";
            END IF;
        END
        ');

        DB::unprepared('
        CREATE TRIGGER disable_delete_sesi
        BEFORE DELETE on sesi_penilaians
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat menghapus data pada log users";
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
        DB::unprepared('DROP TRIGGER log_insert_sesi');
        DB::unprepared('DROP TRIGGER log_update_sesi');
        DB::unprepared('DROP TRIGGER disable_update_sesi');
        DB::unprepared('DROP TRIGGER disable_delete_sesi');
    }
};
