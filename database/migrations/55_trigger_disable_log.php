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
    /* public function up()
    {
        DB::unprepared('
        CREATE TRIGGER disable_update_log_activities
        AFTER UPDATE on log_activities
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat mengubah data pada log activities";
        END
        ');
        DB::unprepared('
        CREATE TRIGGER disable_delete_log_activities
        AFTER DELETE on log_activities
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat menghapus data pada log activities";
        END
        ');

        DB::unprepared('
        CREATE TRIGGER disable_update_log_users
        AFTER UPDATE on log_users
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat mengubah data pada log users";
        END
        ');
        DB::unprepared('
        CREATE TRIGGER disable_delete_log_users
        AFTER DELETE on log_users
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat menghapus data pada log users";
        END
        ');

        DB::unprepared('
        CREATE TRIGGER disable_update_log_profiles
        AFTER UPDATE on log_profiles
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat mengubah data pada log profiles";
        END
        ');
        DB::unprepared('
        CREATE TRIGGER disable_delete_log_profiles
        AFTER DELETE on log_profiles
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat menghapus data pada log profiles";
        END
        ');

        DB::unprepared('
        CREATE TRIGGER disable_update_log_gurus
        AFTER UPDATE on log_gurus
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat mengubah data pada log gurus";
        END
        ');
        DB::unprepared('
        CREATE TRIGGER disable_delete_log_gurus
        AFTER DELETE on log_gurus
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat menghapus data pada log gurus";
        END
        ');

        DB::unprepared('
        CREATE TRIGGER disable_update_log_mapels
        AFTER UPDATE on log_mapels
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat mengubah data pada log mapels";
        END
        ');
        DB::unprepared('
        CREATE TRIGGER disable_delete_log_mapels
        AFTER DELETE on log_mapels
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat menghapus data pada log mapels";
        END
        ');

        DB::unprepared('
        CREATE TRIGGER disable_update_log_kelas
        AFTER UPDATE on log_kelas
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat mengubah data pada log kelas";
        END
        ');
        DB::unprepared('
        CREATE TRIGGER disable_delete_log_kelas
        AFTER DELETE on log_kelas
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat menghapus data pada log kelas";
        END
        ');

        DB::unprepared('
        CREATE TRIGGER disable_update_log_rosters
        AFTER UPDATE on log_rosters
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat mengubah data pada log rosters";
        END
        ');
        DB::unprepared('
        CREATE TRIGGER disable_delete_log_rosters
        AFTER DELETE on log_rosters
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat menghapus data pada log rosters";
        END
        ');

        DB::unprepared('
        CREATE TRIGGER disable_update_log_siswas
        AFTER UPDATE on log_siswas
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat mengubah data pada log siswas";
        END
        ');
        DB::unprepared('
        CREATE TRIGGER disable_delete_log_siswas
        AFTER DELETE on log_siswas
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat menghapus data pada log siswas";
        END
        ');
 
        DB::unprepared('
        CREATE TRIGGER disable_update_log_kontraks
        AFTER UPDATE on log_kontraks
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat mengubah data pada log kontraks";
        END
        ');
        DB::unprepared('
        CREATE TRIGGER disable_delete_log_kontraks
        AFTER DELETE on log_kontraks
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat menghapus data pada log kontraks";
        END
        ');

        DB::unprepared('
        CREATE TRIGGER disable_update_log_prestasis
        AFTER UPDATE on log_prestasis
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat mengubah data pada log prestasis";
        END
        ');
        DB::unprepared('
        CREATE TRIGGER disable_delete_log_prestasis
        AFTER DELETE on log_prestasis
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat menghapus data pada log prestasis";
        END
        ');

        DB::unprepared('
        CREATE TRIGGER disable_update_log_nilais
        AFTER UPDATE on log_nilais
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat mengubah data pada log nilais";
        END
        ');
        DB::unprepared('
        CREATE TRIGGER disable_delete_log_nilais
        AFTER DELETE on log_nilais
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat menghapus data pada log nilais";
        END
        ');

        DB::unprepared('
        CREATE TRIGGER disable_update_log_ekstrakurikulers
        AFTER UPDATE on log_ekstrakurikulers
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat mengubah data pada log ekstrakurikulers";
        END
        ');
        DB::unprepared('
        CREATE TRIGGER disable_delete_log_ekstrakurikulers
        AFTER DELETE on log_ekstrakurikulers
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat menghapus data pada log ekstrakurikulers";
        END
        ');

        DB::unprepared('
        CREATE TRIGGER disable_update_log_ekstrakurikuler_siswas
        AFTER UPDATE on log_ekstrakurikuler_siswas
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat mengubah data pada log ekstrakurikuler siswas";
        END
        ');
        DB::unprepared('
        CREATE TRIGGER disable_delete_log_ekstrakurikuler_siswas
        AFTER DELETE on log_ekstrakurikuler_siswas
        FOR EACH ROW
        BEGIN
            SIGNAL SQLSTATE "45000"
            SET MESSAGE_TEXT = "Tidak dapat menghapus data pada log ekstrakurikuler siswas";
        END
        ');
        
    } */
        
        /**
         * Reverse the migrations.
         *
         * @return void
         */

   /*  public function down()
    {
        DB::unprepared('DROP TRIGGER disable_update_log_activities');
        DB::unprepared('DROP TRIGGER disable_update_log_users');
        DB::unprepared('DROP TRIGGER disable_update_log_profiles');
        DB::unprepared('DROP TRIGGER disable_update_log_gurus');
        DB::unprepared('DROP TRIGGER disable_update_log_mapels');
        DB::unprepared('DROP TRIGGER disable_update_log_kelas');
        DB::unprepared('DROP TRIGGER disable_update_log_rosters');
        DB::unprepared('DROP TRIGGER disable_update_log_siswas');
        DB::unprepared('DROP TRIGGER disable_update_log_kontraks');
        DB::unprepared('DROP TRIGGER disable_update_log_prestasis');
        DB::unprepared('DROP TRIGGER disable_update_log_nilais');
        DB::unprepared('DROP TRIGGER disable_update_log_ekstrakurikulers');
        DB::unprepared('DROP TRIGGER disable_update_log_ekstrakurikuler_siswas');
        DB::unprepared('DROP TRIGGER disable_delete_log_activities');
        DB::unprepared('DROP TRIGGER disable_delete_log_users');
        DB::unprepared('DROP TRIGGER disable_delete_log_profiles');
        DB::unprepared('DROP TRIGGER disable_delete_log_gurus');
        DB::unprepared('DROP TRIGGER disable_delete_log_mapels');
        DB::unprepared('DROP TRIGGER disable_delete_log_kelas');
        DB::unprepared('DROP TRIGGER disable_delete_log_rosters');
        DB::unprepared('DROP TRIGGER disable_delete_log_siswas');
        DB::unprepared('DROP TRIGGER disable_delete_log_kontraks');
        DB::unprepared('DROP TRIGGER disable_delete_log_prestasis');
        DB::unprepared('DROP TRIGGER disable_delete_log_nilais');
        DB::unprepared('DROP TRIGGER disable_delete_log_ekstrakurikulers');
        DB::unprepared('DROP TRIGGER disable_delete_log_ekstrakurikuler_siswas');
        
    } */
};