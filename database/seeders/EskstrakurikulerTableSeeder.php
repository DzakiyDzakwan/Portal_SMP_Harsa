<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EskstrakurikulerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::select('CALL add_ekstrakurikuler(?, ?, ?, ?, ?, ?, ?, ?)', ["10afab12-75d2-11ed-9489-f875a4fd08d6", 'EK001', 'Futsal', 'Senin', '16:00', "18:00", "Lapangan Futsal Yaspendhar", "7"]);
        DB::select('CALL add_ekstrakurikuler(?, ?, ?, ?, ?, ?, ?, ?)', ["10afab12-75d2-11ed-9489-f875a4fd08d6", 'EK002', 'English Clube', 'Rabu', '16:00', "18:00", "Kelas 7 A Ibnu Sina", "7"]);
    }
}
