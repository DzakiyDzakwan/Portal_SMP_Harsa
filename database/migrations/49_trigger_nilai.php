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
        DB::unprepared('
        CREATE TRIGGER log_insert_nilai
        AFTER INSERT ON nilais
        FOR EACH ROW
        BEGIN
        INSERT INTO log_nilais(nilai_id, sesi, mapel, guru, pemeriksa, kontrak_siswa, jenis, kkm_aktif, nilai_pengetahuan, deskripsi_pengetahuan, nilai_keterampilan, deskripsi_keterampilan, status, keterangan, action, created_at)
        VALUES (NEW.nilai_id, NEW.sesi, NEW.mapel, NEW.guru, NEW.pemeriksa, NEW.kontrak_siswa, NEW.jenis, NEW.kkm_aktif, NEW.nilai_pengetahuan, NEW.deskripsi_pengetahuan, NEW.nilai_keterampilan, NEW.deskripsi_keterampilan, NEW.status, NEW.keterangan, "insert", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_update_nilai
        AFTER UPDATE ON nilais
        FOR EACH ROW
        BEGIN
        INSERT INTO log_nilais(nilai_id, sesi, mapel, guru, pemeriksa, kontrak_siswa, jenis, kkm_aktif, nilai_pengetahuan, deskripsi_pengetahuan, nilai_keterampilan, deskripsi_keterampilan, status, keterangan, action, created_at)
        VALUES (NEW.nilai_id, NEW.sesi, NEW.mapel, NEW.guru, NEW.pemeriksa, NEW.kontrak_siswa, NEW.jenis, NEW.kkm_aktif, NEW.nilai_pengetahuan, NEW.deskripsi_pengetahuan, NEW.nilai_keterampilan, NEW.deskripsi_keterampilan, NEW.status, NEW.keterangan, "update", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_delete_nilai
        AFTER DELETE ON nilais
        FOR EACH ROW
        BEGIN
        INSERT INTO log_nilais(nilai_id, sesi, mapel, guru, pemeriksa, kontrak_siswa, jenis, kkm_aktif, nilai_pengetahuan, deskripsi_pengetahuan, nilai_keterampilan, deskripsi_keterampilan, status, keterangan, action, created_at)
        VALUES (OLD.nilai_id, OLD.sesi, OLD.mapel, OLD.guru, OLD.pemeriksa, OLD.kontrak_siswa, OLD.jenis, OLD.kkm_aktif, OLD.nilai_pengetahuan, OLD.deskripsi_pengetahuan, OLD.nilai_keterampilan, OLD.deskripsi_keterampilan, OLD.status, OLD.keterangan, "delete", NOW());
        END
        ');

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
        CREATE TRIGGER disable_update_nilai
        BEFORE UPDATE ON nilais
        FOR EACH ROW
        BEGIN
            IF(NEW.nilai_id <> OLD.nilai_id OR NEW.sesi <> OLD.sesi OR NEW.mapel <> OLD.mapel OR NEW.guru <> OLD.guru OR NEW.kontrak_siswa <> OLD.kontrak_siswa OR NEW.jenis <> OLD.jenis OR NEW.kkm_aktif <> OLD.kkm_aktif)THEN
                SIGNAL SQLSTATE "45000"
                SET MESSAGE_TEXT = "Tidak dapat mengubah nilai";
            END IF;
        END
        ');

        /* DB::unprepared('
        CREATE TRIGGER validasi_nilai
        BEFORE INSERT ON nilais
        FOR EACH ROW
        BEGIN
            IF is_nilai_exists(NEW.sesi, NEW.mapel, NEW.kontrak_siswa, NEW.jenis) = 1 THEN
                SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Error Nilai Sudah tersedia";
            END IF;
        END
        '); */
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
       DB::unprepared('DROP TRIGGER disable_update_nilai');
    }
};
