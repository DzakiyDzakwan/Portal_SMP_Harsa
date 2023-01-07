<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\KelasAktif;

class KelasAktifTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::select('CALL add_kelas_aktif(?, ?, ?, ?)', ['KLS001', '3333333333333333', '2020-2021', '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_kelas_aktif(?, ?, ?, ?)', ['KLS002', '4444444444444444', '2020-2021', '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_kelas_aktif(?, ?, ?, ?)', ['KLS001', '3333333333333333', '2021-2022', '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_kelas_aktif(?, ?, ?, ?)', ['KLS002', '4444444444444444', '2020-2021', '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        KelasAktif::create([
            "kelas_aktif_id" => "2a18b5be-8df3-11ed-86b2-f875a4fd08d6",
            "kelas" => "KLS001",
            "wali_kelas" => "3333333333333333",
            "tahun_ajaran_aktif" => '2022-2023',
            "nama_kelas_aktif" => "Ibnu Sina"
        ]);

        KelasAktif::create([
            "kelas_aktif_id" => "2a18f2c2-8df3-11ed-86b2-f875a4fd08d6",
            "kelas" => "KLS002",
            "wali_kelas" => "4444444444444444",
            "tahun_ajaran_aktif" => '2022-2023',
            "nama_kelas_aktif" => "Salman Alfarizi"
        ]);
    }
}
