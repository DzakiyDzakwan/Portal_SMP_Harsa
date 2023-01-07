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
        DB::select('CALL add_mapel_guru(?, ?, ?)', ['MW001', '3333333333333333', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_mapel_guru(?, ?, ?)', ['MW002', '4444444444444444', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_mapel_guru(?, ?, ?)', ['MW003', '5555555555555555', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_mapel_guru(?, ?, ?)', ['MW004', '6666666666666666', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_mapel_guru(?, ?, ?)', ['MW005', '7777777777777777', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_mapel_guru(?, ?, ?)', ['MW006', '8888888888888888', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_mapel_guru(?, ?, ?)', ['MP001', '9999999999999999', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_mapel_guru(?, ?, ?)', ['MP002', '1010101010101010', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_mapel_guru(?, ?, ?)', ['MP003', '2020202020202020', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
    }
}
