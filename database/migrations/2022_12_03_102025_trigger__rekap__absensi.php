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
        /* log insert rekap_absensi */
        DB::unprepared('
        DELIMITER ;
        CREATE TRIGGER log_insert_rekap_absensi
        AFTER INSERT on rekap_absensis
        FOR EACH ROW
        BEGIN
        INSERT INTO log_insert_rekap_absensis (absensi_id, siswa, n_sakit, n_izin, n_tanpa_keterangan, semester, tahun_ajaran, keterangan, created_at)
        VALUES (NEW.absensi_id, NEW.siswa, NEW.sakit, NEW.izin, NEW.tanpa_keterangan, NEW.semester, NEW.tahun_ajaran, "insert", NOW());
        END;
        ');

        /* log update rekap_absensi */
        DB::unprepared('
        DELIMITER ;
        CREATE TRIGGER log_update_rekap_absensis
        AFTER UPDATE on rekap_absensis
        FOR EACH ROW
        BEGIN
        INSERT INTO log_rekap_absensis (absensi_id, siswa, n_sakit, o_sakit, n_izin, o_izin, n_tanpa_keterangan, o_tanpa_keterangan, semester, tahun_ajaran, keterangan, created_at)
        VALUES (OLD.absensi_id, OLD.siswa, NEW.sakit, OLD.sakit, NEW.izin, OLD.izin, NEW.tanpa_keterangan, OLD.tanpa_keterangan, OLD.semester, OLD.tahun_ajaran, "update", NOW());
        END;
        ');

        /* log delete rekap_absensi */
        DB::unprepared('
        CREATE TRIGGER log_delete_rekap_absensis
        AFTER DELETE on rekap_absensis
        FOR EACH ROW
        BEGIN
        INSERT INTO log_rekap_absensis (absensi_id, siswa, o_sakit, o_izin, o_tanpa_keterangan, semester, tahun_ajaran, keterangan, created_at)
        VALUES (OLD.absensi_id, OLD.siswa, OLD.sakit, OLD.izin, OLD.tanpa_keterangan, OLD.semester, OLD.tahun_ajaran, "delete", NOW());
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
        DB::unprepared('DROP TRIGGER log_insert_roster_kelas');
        DB::unprepared('DROP TRIGGER log_update_roster_kelas');
        DB::unprepared('DROP TRIGGER log_delete_roster_kelas');

    }
};
