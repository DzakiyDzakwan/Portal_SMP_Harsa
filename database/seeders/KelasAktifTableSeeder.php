<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasAktifTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::select('CALL add_kelasAktif(?, ?, ?, ?, ?, ?)', ['KLS001', 1, '7777777777777777', '2023/2024', 'Ibnu Rusyid', '10afab12-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_kelasAktif(?, ?, ?, ?, ?, ?)', ['KLS002', 2, '9999999999999999', '2022/2023', 'Ibnu Sina', '10afab12-75d2-11ed-9489-f875a4fd08d6']);
    }
}
