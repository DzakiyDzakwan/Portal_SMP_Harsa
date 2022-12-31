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

        DB::select('CALL add_mapel(?, ?, ?, ?, ? ,?)', ['BI001', 'Bahasa Indonesia', 'A', '75', 'KKN 2006', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_mapel(?, ?, ?, ?, ? ,?)', ['MTK01', 'Matematika', 'A', '80', 'KKN 2006', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_mapel(?, ?, ?, ?, ? ,?)', ['FIS01', 'Fisika', 'A', '80', 'KKN 2006', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_mapel(?, ?, ?, ?, ? ,?)', ['KIM01', 'Kimia', 'A', '75', 'KKN 2006', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_mapel(?, ?, ?, ?, ? ,?)', ['BIO01', 'Biologi', 'A', '75', 'KKN 2006', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_mapel(?, ?, ?, ?, ? ,?)', ['MTK02', 'Matematika', 'B', '80', 'KKN 2006', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_mapel(?, ?, ?, ?, ? ,?)', ['SEJ01', 'Sejarah', 'B', '70', 'KKN 2006', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
    }
}
