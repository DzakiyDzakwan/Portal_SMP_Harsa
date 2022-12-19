<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SesiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::select("CALL add_sesi(?, ?, ?, ?, ?)", ["uh1", "2022", "2022-07-18 00:00:00", "2022-07-25 23:59:00", "58f5ab52-75d2-11ed-9489-f875a4fd08d6"]);

        DB::select("CALL add_sesi(?, ?, ?, ?, ?)", ["uh2", "2022", "2022-08-22 00:00:00", "2022-08-29 23:59:00", "58f5ab52-75d2-11ed-9489-f875a4fd08d6"]);

        DB::select("CALL add_sesi(?, ?, ?, ?, ?)", ["uh3", "2022", "2022-09-19 00:00:00", "2022-09-26 23:59:00", "58f5ab52-75d2-11ed-9489-f875a4fd08d6"]);

        DB::select("CALL add_sesi(?, ?, ?, ?, ?)", ["uts", "2022", "2022-10-24 00:00:00", "2022-10-31 23:59:00", "58f5ab52-75d2-11ed-9489-f875a4fd08d6"]);

        DB::select("CALL add_sesi(?, ?, ?, ?, ?)", ["uas", "2022", "2022-12-12 00:00:00", "2022-12-19 23:59:00", "58f5ab52-75d2-11ed-9489-f875a4fd08d6"]);

        
    }
}
