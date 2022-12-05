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
        /* log insert ekskul */
        DB::unprepared('
        CREATE TRIGGER log_insert_ekskul_siswa
        AFTER INSERT on ekskuls
        FOR EACH ROW
        BEGIN
        INSERT INTO log_ekstrakulikuler_siswas (ekskul_siswa_id, ekskul, kontrak_siswa, nilai, keterangan, action, created_at)
        VALUES (NEW.ekskul_siswa_id, NEW.ekskul, NEW.kontrak_siswa, NEW.nilai, NEW.keterangan, "insert", NOW());
        END
        ');

                /* log delete ekskul */
                DB::unprepared('
        CREATE TRIGGER log_delete_ekskul_siswa
        AFTER DELETE on ekskuls
        FOR EACH ROW
        BEGIN
        INSERT INTO log_ekstrakurikuler_siswas (ekskul_siswa_id, ekskul, kontrak_siswa, nilai, keterangan, action, created_at)
        VALUES (NEW.ekskul_siswa_id, NEW.ekskul, NEW.kontrak_siswa, NEW.nilai, NEW.keterangan, "delete", NOW());
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
