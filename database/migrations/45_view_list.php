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
        DB::unprepared('
        CREATE VIEW table_kelas AS
        SELECT kelas.kelas_id, kelas.nama_kelas, kelas.kelompok_kelas, user_profiles.nama AS Wali_Kelas, COUNT(siswas.NIS) AS Jumlah_Siswa
        FROM kelas
        LEFT JOIN gurus ON kelas.wali_kelas = gurus.NIP 
        LEFT JOIN users ON gurus.user = users.uuid
        INNER JOIN user_profiles ON users.uuid = user_profiles.user
        LEFT JOIN siswas ON kelas.kelas_id = siswas.kelas
        GROUP BY kelas.kelas_id, kelas.nama_kelas, kelas.kelompok_kelas, user_profiles.nama, siswas.NIS;
        ');

        DB::unprepared('
        CREATE VIEW table_ekskul AS
        SELECT *
        FROM ekskuls
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
    }
};
