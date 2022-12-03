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
        /* log insert prestasi */
        DB::unprepared('
        DELIMTER ;
        CREATE TRIGGER log_insert_prestasi
        AFTER INSERT ON prestasis
        FOR EACH ROW
        BEGIN
        INSERT INTO log_prestasis(prestasi_id, siswa, n_jenis_prestasi, n_keterangan, n_tanggal_prestasi, n_semester, keterangan, created_at)
        VALUES (NEW.prestasi_id, NEW.siswa, NEW.jenis_prestasi, NEW.keterangan, NEW.tanggal_prestasi, NEW.semester, "insert", NOW());
        END;
        ');

        /* log update prestasi */
        DB::unprepared('
        DELIMTER ;
        CREATE TRIGGER log_update_prestasi
        AFTER UPDATE ON prestasis
        FOR EACH ROW
        BEGIN
        INSERT INTO log_prestasis(prestasi_id, siswa, n_jenis_prestasi, o_jenis_prestasi, n_keterangan, o_keterangan,  n_tanggal_prestasi, o_tanggal_prestasi, n_semester, o_semester, keterangan, created_at)
        VALUES (OLD.prestasi_id, OLD.siswa, NEW.jenis_prestasi, OLD.jenis_prestasi, NEW.keterangan, OLD.keterangan, NEW.tanggal_prestasi, OLD.tanggal_prestasi, NEW.semester, OLD.semester, "update", NOW());
        END;
        ');

        /* log delete prestasi */
        DB::unprepared('
        DELIMTER ;
        CREATE TRIGGER log_delete_prestasi
        AFTER DELETE ON prestasis
        FOR EACH ROW
        BEGIN
        INSERT INTO log_prestasis(prestasi_id, siswa, o_jenis_prestasi, o_keterangan, o_tanggal_prestasi, o_semester, keterangan, created_at)
        VALUES (OLD.prestasi_id, OLD.siswa, OLD.jenis_prestasi, OLD.keterangan, OLD.tanggal_prestasi, OLD.semester, "delete", NOW());
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
        DB::unprepared('DROP TRIGGER log_insert_prestasi');
        DB::unprepared('DROP TRIGGER log_update_prestasi');
        DB::unprepared('DROP TRIGGER log_delete_prestasi');
    }
};
