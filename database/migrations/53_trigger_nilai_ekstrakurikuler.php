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
        /* log insert ekskul */
        DB::unprepared('
        CREATE TRIGGER log_insert_nilai_ekskul
        AFTER INSERT on nilai_ekstrakurikulers
        FOR EACH ROW
        BEGIN
        INSERT INTO log_nilai_ekstrakurikulers (nilai_ekstrakurikuler_id, ekstrakurikuler, kontrak_siswa, nilai, keterangan, action, created_at)
        VALUES (NEW.nilai_ekstrakurikuler_id, NEW.ekstrakurikuler, NEW.kontrak_siswa, NEW.nilai, NEW.keterangan, "insert", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_update_nilai_ekskul
        AFTER UPDATE on nilai_ekstrakurikulers
        FOR EACH ROW
        BEGIN
        INSERT INTO log_nilai_ekstrakurikulers (nilai_ekstrakurikuler_id, ekstrakurikuler, kontrak_siswa, nilai, keterangan, action, created_at)
        VALUES (NEW.nilai_ekstrakurikuler_id, NEW.ekstrakurikuler, NEW.kontrak_siswa, NEW.nilai, NEW.keterangan, "update", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_delete_nilai_ekskul
        AFTER DELETE on nilai_ekstrakurikulers
        FOR EACH ROW
        BEGIN
        INSERT INTO log_nilai_ekstrakurikulers (nilai_ekstrakurikuler_id, ekstrakurikuler, kontrak_siswa, nilai, keterangan, action, created_at)
        VALUES (OLD.nilai_ekstrakurikuler_id, OLD.ekstrakurikuler, OLD.kontrak_siswa, OLD.nilai, OLD.keterangan, "delete", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER disable_update_nilai_ekskul
        BEFORE UPDATE ON nilai_ekstrakurikulers
        FOR EACH ROW
        BEGIN
            IF (OLD.nilai_ekstrakurikuler_id <> NEW.nilai_ekstrakurikuler_id OR OLD.ekstrakurikuler <> NEW.ekstrakurikuler OR OLD.kontrak_siswa <> NEW.kontrak_siswa) THEN
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
        Schema::dropIfExists('log_ekstrakurikuler_siswas');
        DB::unprepared('DROP TRIGGER log_insert_nilai_ekskul');
        DB::unprepared('DROP TRIGGER log_update_nilai_ekskul');
        DB::unprepared('DROP TRIGGER log_delete_nilai_ekskul');
        DB::unprepared('DROP TRIGGER disable_update_nilai_ekskul');
    }
};
