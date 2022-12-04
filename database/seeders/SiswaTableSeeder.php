<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // INSERT INTO siswas(nisn, nis, ruang_kelas, kelas_awal, semester, status_keaktifan, user, created_at, updated_at)
        //     VALUES(nisn, nis, kelas_id, kelas_id, "1", "aktif", uuid, NOW(), NOW());
        DB::table('siswas')->insert([
            [
                "NISN" => '211402018',
                "NIS" => "1234",
                "ruang_kelas" => 'A01',
                "tanggal_masuk" => '2019-01-01',
                "kelas_awal" => '7A',
                "semester" => '2',
                "status_keaktifan" => 'Aktif',
                "user" => 'siswa1'
            ],
            [
                "NISN" => '211402009',
                "NIS" => "4321",
                "ruang_kelas" => 'A01',
                "tanggal_masuk" => '2019-01-01',
                "kelas_awal" => '7A',
                "semester" => '2',
                "status_keaktifan" => 'Aktif',
                "user" => 'siswa2'
            ],
        ]);
    }
}
