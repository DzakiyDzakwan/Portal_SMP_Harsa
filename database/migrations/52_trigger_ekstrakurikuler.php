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
                        CREATE TRIGGER log_insert_ekskul
                        AFTER INSERT on ekstrakurikulers
                        FOR EACH ROW
                        BEGIN
                                INSERT INTO log_ekstrakurikulers (ekstrakurikuler_id, penanggung_jawab, nama, hari, waktu_mulai, waktu_akhir, tempat, kelas, action, created_at)
                                VALUES (NEW.ekstrakurikuler_id, NEW.penanggung_jawab, NEW.nama, NEW.hari, NEW.waktu_mulai, NEW.waktu_akhir, NEW.tempat, NEW.kelas, "insert", NOW());
                        END
                ');

                DB::unprepared('
                        CREATE TRIGGER log_update_ekskul
                        AFTER UPDATE on ekstrakurikulers
                        FOR EACH ROW
                        BEGIN
                                INSERT INTO log_ekstrakurikulers (ekstrakurikuler_id, penanggung_jawab, nama, hari, waktu_mulai, waktu_akhir, tempat, kelas, action, created_at)
                                VALUES (NEW.ekstrakurikuler_id, NEW.nama, NEW.hari, NEW.penanggung_jawab, NEW.waktu_mulai, NEW.waktu_akhir, NEW.tempat, NEW.kelas, "update", NOW());
                        END
                ');

                DB::unprepared('
                CREATE TRIGGER log_delete_ekskul
                AFTER DELETE on ekstrakurikulers
                FOR EACH ROW
                BEGIN
                        INSERT INTO log_ekstrakurikulers (ekstrakurikuler_id, penanggung_jawab, nama, hari, waktu_mulai, waktu_akhir, tempat, kelas, action, created_at)
                        VALUES (OLD.ekstrakurikuler_id, OLD.penanggung_jawab, OLD.nama, OLD.hari, OLD.waktu_mulai, OLD.waktu_akhir, OLD.tempat, OLD.kelas, "delete", NOW());
                END
                ');
                
                DB::unprepared('
                CREATE TRIGGER disable_update_ekskul
                BEFORE UPDATE ON ekstrakurikulers
                FOR EACH ROW
                BEGIN
                    IF (OLD.ekstrakurikuler_id <> NEW.ekstrakurikuler_id) THEN
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
                DB::unprepared('DROP TRIGGER log_insert_ekskul');
                DB::unprepared('DROP TRIGGER log_update_ekskul');
                DB::unprepared('DROP TRIGGER log_delete_ekskul');
                DB::unprepared('DROP TRIGGER disable_update_ekskul');
        }
};
