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
        /* log insert prestasi */
        DB::unprepared('
        CREATE TRIGGER log_insert_prestasi
        AFTER INSERT ON prestasis
        FOR EACH ROW
        BEGIN
        INSERT INTO log_prestasis(prestasi_id, siswa, jenis_prestasi, keterangan, tanggal_prestasi, action, created_at)
        VALUES (NEW.prestasi_id, NEW.siswa, NEW.jenis_prestasi, NEW.keterangan, NEW.tanggal_prestasi, "insert", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_update_prestasi
        AFTER UPDATE ON prestasis
        FOR EACH ROW
        BEGIN
        INSERT INTO log_prestasis(prestasi_id, siswa, jenis_prestasi, keterangan, tanggal_prestasi, action, created_at)
        VALUES (NEW.prestasi_id, NEW.siswa, NEW.jenis_prestasi, NEW.keterangan, NEW.tanggal_prestasi, "update", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_delete_prestasi
        AFTER DELETE ON prestasis
        FOR EACH ROW
        BEGIN
        INSERT INTO log_prestasis(prestasi_id, siswa, jenis_prestasi, keterangan, tanggal_prestasi, action, created_at)
        VALUES (OLD.prestasi_id, OLD.siswa, OLD.jenis_prestasi, OLD.keterangan, OLD.tanggal_prestasi, "delete", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER disable_update_prestasi
        BEFORE UPDATE ON prestasis
        FOR EACH ROW
        BEGIN
            IF (OLD.prestasi_id <> NEW.prestasi_id OR OLD.siswa <> NEW.siswa) THEN
                SIGNAL SQLSTATE "45000"
                SET MESSAGE_TEXT = "Tidak dapat mengubah data";
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
        DB::unprepared('DROP TRIGGER log_insert_prestasi');
        DB::unprepared('DROP TRIGGER log_update_prestasi');
        DB::unprepared('DROP TRIGGER log_delete_prestasi');
        DB::unprepared('DROP TRIGGER disable_update_prestasi');
    }
};
