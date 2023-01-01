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
        /* DB::unprepared('
        CREATE TRIGGER validasi_insert_tahun
        BEFORE INSERT on tahun_ajarans
        FOR EACH ROW
        BEGIN
            IF NEW.tanggal_mulai <= NOW() THEN
                SIGNAL SQLSTATE "45000"
                SET MESSAGE_TEXT = "Tidak dapat membuat waktu mulai yang sudah berlalu";
            ELSEIF NEW.tanggal_mulai > NEW.tanggal_berakhir THEN
                SIGNAL SQLSTATE "45000"
                SET MESSAGE_TEXT = "Tanggal berakhir tidak dapat lebih kecil dari tanggal mulai";
            END IF;
        END
        '); */

        DB::unprepared('
        CREATE TRIGGER log_insert_tahun
        AFTER INSERT ON tahun_ajarans
        FOR EACH ROW
        BEGIN
        INSERT INTO log_tahuns(tahun_ajaran, semester, tanggal_mulai, tanggal_berakhir, action, created_at)
        VALUES (NEW.tahun_ajaran, NEW.semester, NEW.tanggal_mulai, NEW.tanggal_berakhir, "insert", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER validasi_update_tahun
        BEFORE UPDATE on tahun_ajarans
        FOR EACH ROW
        BEGIN
            IF time_status(OLD.tanggal_mulai, OLD.tanggal_berakhir) = "aktif" THEN
                IF NEW.tanggal_mulai <> OLD.tanggal_mulai THEN
                    SIGNAL SQLSTATE "45000"
                    SET MESSAGE_TEXT = "Tahun Ajaran sedang berjalan";
                ELSEIF NEW.tanggal_berakhir < NOW() THEN
                    SIGNAL SQLSTATE "45000"
                    SET MESSAGE_TEXT = "Tanggal berakhir tidak dapat lebih kecil dari tanggal sekarang";
                END IF;
            ELSEIF time_status(OLD.tanggal_mulai, OLD.tanggal_berakhir) = "inaktif" THEN
                SIGNAL SQLSTATE "45000"
                SET MESSAGE_TEXT = "Tidak dapat mengubah tahun ajaran";
            END IF;
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_update_tahun
        AFTER UPDATE ON tahun_ajarans
        FOR EACH ROW
        BEGIN
        INSERT INTO log_tahuns(tahun_ajaran, semester, tanggal_mulai, tanggal_berakhir, action, created_at)
        VALUES (NEW.tahun_ajaran, NEW.semester, NEW.tanggal_mulai, NEW.tanggal_berakhir, "update", NOW());
        END
        ');

        
        DB::unprepared('
        CREATE TRIGGER disable_update_tahun
        BEFORE UPDATE ON tahun_ajarans
        FOR EACH ROW
        BEGIN
            IF (OLD.tahun_ajaran_id <> NEW.tahun_ajaran_id OR OLD.tahun_ajaran <> NEW.tahun_ajaran OR OLD.semester <> NEW.semester) THEN
                SIGNAL SQLSTATE "45000"
                SET MESSAGE_TEXT = "Tidak dapat mengubah data";
            END IF;
        END
        ');


        DB::unprepared('
        CREATE TRIGGER disable_delete_tahun
        BEFORE DELETE on tahun_ajarans
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
        // DB::unprepared('DROP TRIGGER validasi_insert_tahun');
        DB::unprepared('DROP TRIGGER log_insert_tahun');
        DB::unprepared('DROP TRIGGER validasi_update_tahun');
        DB::unprepared('DROP TRIGGER log_update_tahun');
        DB::unprepared('DROP TRIGGER disable_update_tahun');
        DB::unprepared('DROP TRIGGER disable_delete_tahun');
    }
};
