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
        DB::unprepared('
        CREATE VIEW table_log_activities AS 
        SELECT * FROM log_activities
        ');

        DB::unprepared('
        CREATE VIEW table_log_users AS 
        SELECT * FROM log_users
        ');


        DB::unprepared('
        CREATE VIEW table_log_siswas AS 
        SELECT * FROM log_siswas
        ');
        DB::unprepared('
        CREATE VIEW table_log_gurus AS 
        SELECT * FROM log_gurus
        ');

        DB::unprepared('
        CREATE VIEW table_log_mapels AS 
        SELECT * FROM log_mapels
        ');

        DB::unprepared('
        CREATE VIEW table_log_kelas AS
        SELECT log_kelas.kelas_id, user_profiles.nama AS wali_kelas, log_kelas.grade, log_kelas.kelompok_kelas, log_kelas.nama_kelas, log_kelas.action, log_kelas.created_at
        FROM log_kelas
        LEFT JOIN gurus ON log_kelas.wali_kelas = gurus.NUPTK
        LEFT JOIN users ON users.uuid = gurus.user
        LEFT JOIN user_profiles ON user_profiles.user = users.uuid
        GROUP BY log_kelas.kelas_id, user_profiles.nama, log_kelas.grade, log_kelas.kelompok_kelas, log_kelas.nama_kelas, log_kelas.action, log_kelas.created_at
        ');

        DB::unprepared('
        CREATE VIEW table_log_ekstrakurikulers AS 
        SELECT * FROM log_ekstrakurikulers
        ');

        /* DB::unprepared('
        CREATE VIEW table_log_rosters AS
        SELECT mapel, kelas, TIME_FORMAT(waktu_mulai, "%H:%i") AS waktu_mulai, waktu_akhir(waktu_mulai, durasi) AS waktu_akhir, SEC_TO_TIME(durasi*60) AS durasi, hari, created_at
        FROM rosters;
        ');
 */
        DB::unprepared('
        CREATE VIEW table_log_profiles AS 
        SELECT * FROM user_profiles
        ');

        DB::unprepared('
        CREATE VIEW table_log_nilais AS
        SELECT *
        FROM nilais
        ');

        DB::unprepared('
        CREATE VIEW table_log_prestasis AS
        SELECT *
        FROM prestasis
        ');

        DB::unprepared('
        CREATE VIEW table_log_kontraks AS
        SELECT *
        FROM kontrak_semesters
        ');

        DB::unprepared('
        CREATE VIEW table_log_ekstrakurikuler_siswas AS
        SELECT *
        FROM log_ekstrakurikuler_siswas
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW table_log_activities');
        DB::unprepared('DROP VIEW table_log_users');
        DB::unprepared('DROP VIEW table_log_siswas');
        DB::unprepared('DROP VIEW table_log_gurus');
        DB::unprepared('DROP VIEW table_log_mapels');
        DB::unprepared('DROP VIEW table_log_kelas');
        DB::unprepared('DROP VIEW table_log_ekstrakurikulers');
        // DB::unprepared('DROP VIEW table_log_rosters');
        DB::unprepared('DROP VIEW table_log_profiles');
        DB::unprepared('DROP VIEW table_log_nilais');
        DB::unprepared('DROP VIEW table_log_prestasis');
        DB::unprepared('DROP VIEW table_log_kontraks');
        DB::unprepared('DROP VIEW table_log_ekstrakurikuler_siswas');
    }
};
