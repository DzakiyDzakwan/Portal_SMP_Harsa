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
        /* log insert nilai */
        DB::unprepared('
        CREATE TRIGGER log_insert_nilai
        AFTER INSERT ON nilais
        FOR EACH ROW
        BEGIN
        INSERT INTO log_nilais(nilai_id, sesi, mapel, guru, admin, kontrak_siswa, jenis, kkm, nilai_pengetahuan, deskripsi_pengetahuan, nilai_keterampilan, deskripsi_keterampilan, status, keterangan, action, created_at)
        VALUES (NEW.nilai_id, NEW.sesi, NEW.mapel, NEW.guru, NEW.admin, NEW.kontrak_siswa, NEW.jenis, NEW.kkm, NEW.nilai_pengetahuan, NEW.deskripsi_pengetahuan, NEW.nilai_keterampilan, NEW.deskripsi_keterampilan, NEW.status, NEW.keterangan, "insert", NOW());
        END
        ');

        /* log update nilai */
        DB::unprepared('
        CREATE TRIGGER log_update_nilai
        AFTER UPDATE ON nilais
        FOR EACH ROW
        BEGIN
        INSERT INTO log_nilais(nilai_id, sesi, mapel, guru, admin, kontrak_siswa, jenis, kkm, nilai_pengetahuan, deskripsi_pengetahuan, nilai_keterampilan, deskripsi_keterampilan, status, keterangan, action, created_at)
        VALUES (NEW.nilai_id, NEW.sesi, NEW.mapel, NEW.guru, NEW.admin, NEW.kontrak_siswa, NEW.jenis, NEW.kkm, NEW.nilai_pengetahuan, NEW.deskripsi_pengetahuan, NEW.nilai_keterampilan, NEW.deskripsi_keterampilan, NEW.status, NEW.keterangan, "update", NOW());
        END
        ');

        /* log delete nilai */
        DB::unprepared('
        CREATE TRIGGER log_delete_nilai
        AFTER DELETE ON nilais
        FOR EACH ROW
        BEGIN
        INSERT INTO log_nilais(nilai_id, sesi, mapel, guru, admin, kontrak_siswa, jenis, kkm, nilai_pengetahuan, deskripsi_pengetahuan, nilai_keterampilan, deskripsi_keterampilan, status, keterangan, action, created_at)
        VALUES (OLD.nilai_id, OLD.sesi, OLD.mapel, OLD.guru, OLD.admin, OLD.kontrak_siswa, OLD.jenis, OLD.kkm, OLD.nilai_pengetahuan, OLD.deskripsi_pengetahuan, OLD.nilai_keterampilan, OLD.deskripsi_keterampilan, OLD.status, OLD.keterangan, "delete", NOW());
        END
        ');

        /* validasi inputan nilai*/
        DB::unprepared('
        CREATE TRIGGER validasi_input_nilai
        BEFORE INSERT ON nilais
        FOR EACH ROW
        BEGIN
            IF (NEW.nilai_keterampilan < 0 AND NEW.nilai_pengetahuan < 0 ) THEN
                SET NEW.nilai_keterampilan = 0;
                SET NEW.nilai_pengetahuan = 0;
            ELSEIF (NEW.nilai_pengetahuan < 0 ) THEN
                SET NEW.nilai_pengetahuan = 0;
            ELSEIF (NEW.nilai_keterampilan < 0) THEN
                SET NEW.nilai_keterampilan = 0;
            ELSEIF (NEW.nilai_pengetahuan > 100 OR NEW.nilai_keterampilan > 100) THEN
                SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Error Nilai tidak dapat lebih dari 100";
            END IF;
        END
        ');

        DB::unprepared('
        CREATE TRIGGER validasi_nilai
        BEFORE INSERT ON nilais
        FOR EACH ROW
        BEGIN
            IF is_nilai_exists(NEW.sesi, NEW.mapel, NEW.kontrak_siswa, NEW.jenis) = 1 THEN
                SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Error Nilai Sudah tersedia";
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
        DB::unprepared('DROP TRIGGER log_insert_nilai');
        DB::unprepared('DROP TRIGGER log_update_nilai');
        DB::unprepared('DROP TRIGGER log_delete_nilai');
        DB::unprepared('DROP TRIGGER validasi_input_nilai');
       /*  DB::unprepared('DROP TRIGGER validasi_nilai'); */
    }
};
