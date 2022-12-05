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
        /* log insert nilai */
        DB::unprepared('
        CREATE TRIGGER log_insert_nilai
        AFTER INSERT ON nilais
        FOR EACH ROW
        BEGIN
        INSERT INTO log_nilais(nilai_id, siswa, mapel, kategori, semester, tahun_ajaran, n_kkm, n_nilai_pengetahuan, n_deskripsi_pengetahuan, n_nilai_keterampilan, n_deskripsi_keterampilan, keterangan, created_at)
        VALUES (NEW.nilai_id, NEW.siswa, NEW.mapel, NEW.kategori, NEW.semester, NEW.tahun_ajaran, NEW.kkm, NEW.nilai_pengetahuan, NEW.deskripsi_pengetahuan, NEW.nilai_keterampilan, NEW.deskripsi_keterampilan, "insert", NOW());
        END
        ');

        /* log update nilai */
        DB::unprepared('
        CREATE TRIGGER log_update_nilai
        AFTER UPDATE ON nilais
        FOR EACH ROW
        BEGIN
        INSERT INTO log_nilais(nilai_id, siswa, mapel, kategori, semester, tahun_ajaran, n_kkm, o_kkm, n_nilai_pengetahuan, o_nilai_pengetahuan, n_deskripsi_pengetahuan, o_deskripsi_pengetahuan, n_nilai_keterampilan, o_nilai_keterampilan, n_deskripsi_keterampilan, o_deskripsi_keterampilan, keterangan, created_at)
        VALUES (OLD.nilai_id, OLD.siswa, OLD.mapel, OLD.kategori, OLD.semester, OLD.tahun_ajaran, NEW.kkm, OLD.kkm, NEW.nilai_pengetahuan, OLD.nilai_pengetahuan, NEW.deskripsi_pengetahuan, OLD.deskripsi_pengetahuan, NEW.nilai_keterampilan, OLD.nilai_keterampilan, NEW.deskripsi_keterampilan, OLD.deskripsi_keterampilan, "update", NOW());
        END
        ');

        /* log delete nilai */
        DB::unprepared('
        CREATE TRIGGER log_delete_nilai
        AFTER DELETE ON nilais
        FOR EACH ROW
        BEGIN
        INSERT INTO log_nilais(nilai_id, siswa, mapel, kategori, semester, tahun_ajaran, o_kkm, o_nilai_pengetahuan, o_deskripsi_pengetahuan, o_nilai_keterampilan, o_deskripsi_keterampilan, keterangan, created_at)
        VALUES (OLD.nilai_id, OLD.siswa, OLD.mapel, OLD.kategori, OLD.semester, OLD.tahun_ajaran, OLD.kkm, OLD.nilai_pengetahuan, OLD.deskripsi_pengetahuan, OLD.nilai_keterampilan, OLD.deskripsi_keterampilan, "delete", NOW());
        END
        ');

        /* validasi inputan nilai*/
        DB::unprepared('
        CREATE TRIGGER validasi_nilai
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
        END;
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
        DB::unprepared('DROP TRIGGER validasi_nilai');
    }
};
