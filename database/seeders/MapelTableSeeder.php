<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::select('CALL add_mapel(?, ?, ?, ?, ?)', ['M01', 'Bahasa Indonesia', 'A', 'KKN 2006', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_mapel(?, ?, ?, ?, ?)', ['M02', 'Matematika', 'A', 'KKN 2006', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_mapel(?, ?, ?, ?, ?)', ['M03', 'Fisika', 'A', 'KKN 2006', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
    }
}
