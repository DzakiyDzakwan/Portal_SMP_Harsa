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
        CREATE TRIGGER log_insert_ekskul
        AFTER INSERT on ekstrakurikuler
        FOR EACH ROW
        BEGIN
        INSERT INTO log_ekstrakurikulers (ekstrakurikuler_id, nama, hari, waktu_mulai, durasi, tempat, kelas, action, created_at)
        VALUES (NEW.ekstrakurikuler_id, NEW.nama, NEW.hari, NEW.waktu_mulai, NEW.durasi, NEW.tempat, NEW.kelas, "insert", NOW());
        END
        ');

                /* log delete ekskul */
                DB::unprepared('
        CREATE TRIGGER log_delete_ekskul
        AFTER DELETE on ekstrakurikuler
        FOR EACH ROW
        BEGIN
        INSERT INTO log_ekstrakurikulers (ekstrakurikuler_id, nama, hari, waktu_mulai, durasi, tempat, kelas, action, created_at)
        VALUES (OLD.ekstrakurikuler_id, OLD.nama, OLD.hari, OLD.waktu_mulai, OLD.durasi, OLD.tempat, OLD.kelas, "delete", NOW());
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
                DB::unprepared('DROP TRIGGER log_insert_ekskul');
                DB::unprepared('DROP TRIGGER log_delete_ekskul');
        }
};
