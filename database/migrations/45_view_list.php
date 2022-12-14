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
        CREATE VIEW table_kelas AS
        SELECT kelas.kelas_id, kelas.nama_kelas, kelas.grade, kelas.kelompok_kelas, user_profiles.nama AS Wali_Kelas, COUNT(siswas.NIS) AS Jumlah_Siswa
        FROM kelas
        LEFT JOIN gurus ON kelas.wali_kelas = gurus.NIP 
        LEFT JOIN users ON gurus.user = users.uuid
        INNER JOIN user_profiles ON users.uuid = user_profiles.user
        LEFT JOIN siswas ON kelas.kelas_id = siswas.kelas
        GROUP BY kelas.kelas_id, kelas.nama_kelas, kelas.grade, kelas.kelompok_kelas, user_profiles.nama, siswas.NIS;
        ');

        DB::unprepared('
        CREATE VIEW table_ekskul AS
        SELECT * FROM ekstrakurikulers
        ');

        DB::unprepared('
        CREATE VIEW table_guru AS
        SELECT * FROM gurus
        ');

        DB::unprepared('
        CREATE VIEW table_siswa AS
        SELECT * FROM siswas
        ');

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
        CREATE VIEW table_log_kelas AS
        SELECT log_kelas.kelas_id, user_profiles.nama AS wali_kelas, log_kelas.grade, log_kelas.kelompok_kelas, log_kelas.nama_kelas, log_kelas.action, log_kelas.created_at
        FROM log_kelas
        LEFT JOIN gurus ON log_kelas.wali_kelas = gurus.NIP
        LEFT JOIN users ON users.uuid = gurus.user
        LEFT JOIN user_profiles ON user_profiles.user = users.uuid
        GROUP BY log_kelas.kelas_id, user_profiles.nama, log_kelas.grade, log_kelas.kelompok_kelas, log_kelas.nama_kelas, log_kelas.action, log_kelas.created_at
        ');
        DB::unprepared('
        CREATE VIEW table_log_mapels AS 
        SELECT * FROM log_mapels
        ');
        DB::unprepared('
        CREATE VIEW table_log_ekstrakurikulers AS 
        SELECT * FROM log_ekstrakurikulers
        ');
        DB::unprepared('
        CREATE VIEW table_roster_kelas AS
        SELECT roster_kelas.roster_id, mapels.nama_mapel, user_profiles.nama, kelas.nama_kelas, roster_kelas.waktu_mulai, roster_kelas.durasi, roster_kelas.hari FROM roster_kelas
        JOIN kelas ON kelas.kelas_id = roster_kelas.kelas
        JOIN mapel_gurus ON mapel_gurus.mapel_guru_id = roster_kelas.mapel
        JOIN mapels ON mapels.mapel_id = mapel_gurus.mapel
        JOIN gurus ON gurus.NIP = mapel_gurus.guru JOIN users ON users.uuid = gurus.user
        JOIN user_profiles ON user_profiles.user = users.uuid
        GROUP BY roster_kelas.roster_id, mapels.nama_mapel, user_profiles.nama, kelas.nama_kelas, roster_kelas.waktu_mulai, roster_kelas.durasi, roster_kelas.hari
        ');
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW table_kelas');
        DB::unprepared('DROP VIEW table_ekskul');
        DB::unprepared('DROP VIEW table_guru');
        DB::unprepared('DROP VIEW table_siswa');
        DB::unprepared('DROP VIEW table_log_activities');
        DB::unprepared('DROP VIEW table_log_users');
        DB::unprepared('DROP VIEW table_log_siswas');
        DB::unprepared('DROP VIEW table_log_gurus');
        DB::unprepared('DROP VIEW table_log_kelas');
        DB::unprepared('DROP VIEW table_log_mapels');
        DB::unprepared('DROP VIEW table_log_ekstrakurikulers');
        DB::unprepared('DROP VIEW table_roster_kelas');
    }
};
