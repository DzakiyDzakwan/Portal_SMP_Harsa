<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahunAjaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::select('CALL add_tahun_ajaran(?, ?, ?, ?, ?)', ['2020/2021', 'genap', '2021-01-04 00:00:00', '2021-05-29 23:59:00', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_tahun_ajaran(?, ?, ?, ?, ?)', ['2021/2022', 'ganjil', '2021-06-07 00:00:00', '2021-12-18 23:59:00', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_tahun_ajaran(?, ?, ?, ?, ?)', ['2021/2022', 'genap', '2022-01-03 00:00:00', '2022-05-28 23:59:00', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_tahun_ajaran(?, ?, ?, ?, ?)', ['2022/2023', 'ganjil', '2022-06-06 00:00:00', '2022-12-31 23:59:00', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
    }
}
