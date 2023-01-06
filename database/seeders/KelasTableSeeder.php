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
        DB::select('CALL add_kelas(?, ?, ?, ?, ?)', ['KLS001', 'Ibnu Sina', '7', 'A', '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_kelas(?, ?, ?, ?, ?)', ['KLS002', 'Ibnu Rusyd', '7', 'B', '10afab12-75d2-11ed-9489-f875a4fd08d6']);

    }
}
