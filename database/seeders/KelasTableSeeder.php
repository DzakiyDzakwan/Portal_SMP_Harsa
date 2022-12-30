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
        /* DB::select('CALL add_kelas(?, ?, ?, ?, ?, ?)', ['K01', '111111111111111111', '7', 'A', 'Ibnu Sina', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_kelas(?, ?, ?, ?, ?, ?)', ['K02', '222222222222222222', '7', 'B', 'Salman Al Farizi', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']); */

        DB::select('CALL add_kelas(?, ?, ?, ?, ?, ?, ?)', ['T01', 'Ibnu Sina', '7', 'A', '3333333333333333', 'adc8c0e5-882d-11ed-b191-c0185019ea4a', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_kelas(?, ?, ?, ?, ?, ?, ?)', ['T02', 'Ibnu Rusyd', '7', 'B', '4444444444444444', 'add9b0e8-882d-11ed-b191-c0185019ea4a', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_kelas(?, ?, ?, ?, ?, ?, ?)', ['T03', 'Ibnu Khaldun', '7', 'C', '5555555555555555', 'adeb0d4b-882d-11ed-b191-c0185019ea4a', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

    }
}
