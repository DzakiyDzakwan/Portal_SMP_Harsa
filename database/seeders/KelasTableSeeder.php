<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::select('CALL add_kelas(?, ?, ?, ?, ?)', ['KLS001', 'Zaid Bin Haritsah', '7', 'A', '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_kelas(?, ?, ?, ?, ?)', ['KLS002', 'Ubay Bin Kaab', '7', 'B', '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_kelas(?, ?, ?, ?, ?)', ['KLS003', 'Musab Bin Umair', '7', 'C', '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_kelas(?, ?, ?, ?, ?)', ['KLS004', 'Ammar Bin Yasir', '7', 'D', '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_kelas(?, ?, ?, ?, ?)', ['KLS005', 'Waroqah Bin Naufal', '8', 'A', '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_kelas(?, ?, ?, ?, ?)', ['KLS006', 'Abdullah Bin Umar', '8', 'B', '10afab12-75d2-11ed-9489-f875a4fd08d6']);

    }
}
