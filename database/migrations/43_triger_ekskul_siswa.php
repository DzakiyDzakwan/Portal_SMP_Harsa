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
        INSERT INTO log_ekstrakulikuler_siswas (ekstrakurikuler_siswa_id, ekstrakurikuler, kontrak_siswa, nilai, keterangan, action, created_at)
        VALUES (NEW.ekstrakurikuler_siswa_id, NEW.ekstrakurikuler, NEW.kontrak_siswa, NEW.nilai, NEW.keterangan, "insert", NOW());
        END
        ');

        /* log update ekskul */
        DB::unprepared('
        CREATE TRIGGER log_update_ekskul_siswa
        AFTER UPDATE on ekstrakurikuler_siswas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_ekstrakurikuler_siswas (ekstrakurikuler_siswa_id, ekstrakurikuler, kontrak_siswa, nilai, keterangan, action, created_at)
        VALUES (NEW.ekstrakurikuler_siswa_id, NEW.ekstrakurikuler, NEW.kontrak_siswa, NEW.nilai, NEW.keterangan, "update", NOW());
        END
        ');

        /* log delete ekskul */
        DB::unprepared('
        CREATE TRIGGER log_delete_ekskul_siswa
        AFTER DELETE on ekstrakurikuler_siswas
        FOR EACH ROW
        BEGIN
        INSERT INTO log_ekstrakurikuler_siswas (ekstrakurikuler_siswa_id, ekstrakurikuler, kontrak_siswa, nilai, keterangan, action, created_at)
        VALUES (OLD.ekstrakurikuler_siswa_id, OLD.ekstrakurikuler, OLD.kontrak_siswa, OLD.nilai, OLD.keterangan, "delete", NOW());
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
    }
};
