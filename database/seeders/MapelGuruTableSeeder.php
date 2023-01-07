<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MapelGuruTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::select('CALL add_mapelGuru(?, ?, ?)', ['MW001', '3333333333333333', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_mapelGuru(?, ?, ?)', ['MW002', '4444444444444444', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_mapelGuru(?, ?, ?)', ['MW003', '5555555555555555', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_mapelGuru(?, ?, ?)', ['MW004', '6666666666666666', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_mapelGuru(?, ?, ?)', ['MW005', '7777777777777777', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_mapelGuru(?, ?, ?)', ['MP001', '8888888888888888', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_mapelGuru(?, ?, ?)', ['MP002', '8888888888888888', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
    }
}
