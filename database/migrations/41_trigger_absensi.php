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
        CREATE TRIGGER log_insert_rekap_absensis
        AFTER INSERT on rekap_absensis
        FOR EACH ROW
        BEGIN
        INSERT INTO log_insert_rekap_absensis (absensi_id, kontrak, sakit, izin, alpa, action, created_at)
        VALUES (NEW.absensi_id, NEW.kontrak, NEW.sakit, NEW.izin, NEW.alpa, "insert", NOW());
        END
        ');

        /* log update rekap_absensi */
        DB::unprepared('
        CREATE TRIGGER log_update_rekap_absensis
        AFTER UPDATE on rekap_absensis
        FOR EACH ROW
        BEGIN
        INSERT INTO log_rekap_absensis (absensi_id, kontrak, sakit, izin, alpa, action, created_at)
        VALUES (NEW.absensi_id, NEW.kontrak, NEW.sakit, NEW.izin, NEW.alpa, "update", NOW());
        END
        ');

        /* log delete rekap_absensi */
        DB::unprepared('
        CREATE TRIGGER log_delete_rekap_absensi
        AFTER DELETE on rekap_absensis
        FOR EACH ROW
        BEGIN
        INSERT INTO log_rekap_absensis (absensi_id, kontrak, sakit, izin, alpa, action, created_at)
        VALUES (NEW.absensi_id, NEW.kontrak, NEW.sakit, NEW.izin, NEW.alpa, "delete", NOW());
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
        DB::unprepared('DROP TRIGGER log_insert_rekap_absensis');
        DB::unprepared('DROP TRIGGER log_update_rekap_absensis');
        DB::unprepared('DROP TRIGGER log_delete_rekap_absensis');
    }
};
