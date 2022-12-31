<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::select('CALL add_siswa(?, ?, ?, ?, ?, ?, ?, ?)', ['Siswa Dummy 1', '1111111111', '1111', Hash::make('1111'), '2022-12-01', 'KLS01', 'PR', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_siswa(?, ?, ?, ?, ?, ?, ?, ?)', ['Siswa Dummy 2', '2222222222', '2222', Hash::make('2222'), '2022-12-01', 'KLS02', 'LK', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_siswa(?, ?, ?, ?, ?, ?, ?, ?)', ['Siswa Dummy 3', '3333333333', '3333', Hash::make('3333'), '2022-12-01', 'KLS03', 'PR', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_siswa(?, ?, ?, ?, ?, ?, ?, ?)', ['Siswa Dummy 4', '4444444444', '4444', Hash::make('4444'), '2022-12-01', 'KLS01', 'LK', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_siswa(?, ?, ?, ?, ?, ?, ?, ?)', ['Siswa Dummy 5', '5555555555', '5555', Hash::make('5555'), '2022-12-01', 'KLS02', 'PR', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_siswa(?, ?, ?, ?, ?, ?, ?, ?)', ['Siswa Dummy 6', '6666666666', '6666', Hash::make('6666'), '2022-12-01', 'KLS03', 'LK', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

    }
}
