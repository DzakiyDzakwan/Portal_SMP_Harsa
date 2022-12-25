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
        CREATE TRIGGER log_insert_ekskul_siswa
        AFTER INSERT on ekstrakurikuler_siswas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_ekstrakurikuler_siswas (ekstrakurikuler_siswa_id, ekstrakurikuler, siswa, tahun_ajaran_aktif, action, created_at)
        VALUES (NEW.ekstrakurikuler_siswa_id, NEW.ekstrakurikuler, NEW.siswa, NEW.tahun_ajaran_aktif, "insert", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_update_ekskul_siswa
        AFTER UPDATE on ekstrakurikuler_siswas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_ekstrakurikuler_siswas (ekstrakurikuler_siswa_id, ekstrakurikuler, siswa, tahun_ajaran_aktif, action, created_at)
        VALUES (NEW.ekstrakurikuler_siswa_id, NEW.ekstrakurikuler, NEW.siswa, NEW.tahun_ajaran_aktif, "update", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_delete_ekskul_siswa
        AFTER DELETE on ekstrakurikuler_siswas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_ekstrakurikuler_siswas (ekstrakurikuler_siswa_id, ekstrakurikuler, siswa, tahun_ajaran_aktif, action, created_at)
        VALUES (OLD.ekstrakurikuler_siswa_id, OLD.ekstrakurikuler, OLD.siswa, OLD.tahun_ajaran_aktif, "delete", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER disable_update_ekskul_siswa
        BEFORE UPDATE ON ekstrakurikuler_siswas
        FOR EACH ROW
        BEGIN
            IF (OLD.ekstrakurikuler <> NEW.ekstrakurikuler OR OLD.siswa <> NEW.siswa) THEN
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
        DB::unprepared('DROP TRIGGER log_insert_ekskul_siswa');
        DB::unprepared('DROP TRIGGER log_update_ekskul_siswa');
        DB::unprepared('DROP TRIGGER log_delete_ekskul_siswa');
        DB::unprepared('DROP TRIGGER disable_update_ekskul_siswa');
    }
};
