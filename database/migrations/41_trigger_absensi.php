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
        /* log insert rekap_absensi */
        DB::unprepared('
        CREATE TRIGGER log_insert_rekap_absensi
        AFTER INSERT on rekap_absensis
        FOR EACH ROW
        BEGIN
        INSERT INTO log_absensis (absensi_id, kontrak_siswa, sakit, izin, alpa, action, created_at)
        VALUES (NEW.rekap_absensi_id, NEW.kontrak_siswa, NEW.sakit, NEW.izin, NEW.alpa, "insert", NOW());
        END
        ');

        /* log update rekap_absensi */
        DB::unprepared('
        CREATE TRIGGER log_update_rekap_absensi
        AFTER UPDATE on rekap_absensis
        FOR EACH ROW
        BEGIN
        INSERT INTO log_absensis (absensi_id, kontrak_siswa, sakit, izin, alpa, action, created_at)
        VALUES (NEW.rekap_absensi_id, NEW.kontrak_siswa, NEW.sakit, NEW.izin, NEW.alpa, "update", NOW());
        END
        ');

        /* log delete rekap_absensi */
        DB::unprepared('
        CREATE TRIGGER log_delete_rekap_absensi
        AFTER DELETE on rekap_absensis
        FOR EACH ROW
        BEGIN
        INSERT INTO log_absensis (absensi_id, kontrak_siswa, sakit, izin, alpa, action, created_at)
        VALUES (OLD.rekap_absensi_id, OLD.kontrak_siswa, OLD.sakit, OLD.izin, OLD.alpa, "delete", NOW());
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
        DB::unprepared('DROP TRIGGER log_insert_rekap_absensi');
        DB::unprepared('DROP TRIGGER log_update_rekap_absensi');
        DB::unprepared('DROP TRIGGER log_delete_rekap_absensi');
    }
};
