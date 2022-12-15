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
        DB::select('CALL add_kelas(?, ?, ?, ?, ?, ?)', ['K01', '111111111111111111', '7', 'A', 'Ibnu Sina', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_kelas(?, ?, ?, ?, ?, ?)', ['K02', '222222222222222222', '7', 'B', 'Salma Al Farizi', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
    }
}
