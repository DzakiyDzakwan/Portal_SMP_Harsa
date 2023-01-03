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
        /* DB::select('CALL add_siswa(?, ?, ?, ?, ?, ?, ?, ?)', ['Donny Adithya', '2114020001', '1111', Hash::make('1234'), '2022-12-01', 'K01', 'LK', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_siswa(?, ?, ?, ?, ?, ?, ?, ?)', ['Mutia Rahmah', '2114020002', '2222', Hash::make('2222'), '2022-12-01', 'K01', 'PR', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_siswa(?, ?, ?, ?, ?, ?, ?, ?)', ['Talitha Syafiyah', '2114020003', '3333', Hash::make('3333'), '2022-12-01', 'K01', 'PR', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_siswa(?, ?, ?, ?, ?, ?, ?, ?)', ['Fatma Ananta Sari', '2114020036', '4444', Hash::make('4444'), '2022-12-01', 'K01', 'PR', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_siswa(?, ?, ?, ?, ?, ?, ?, ?)', ['Dzakiy Dzakwan', '2114020075', '5555', Hash::make('5555'), '2022-12-01', 'K01', 'LK', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_siswa(?, ?, ?, ?, ?, ?, ?, ?)', ['Deni Putra Sitanggang', '2114020150', '666', Hash::make('6666'), '2022-12-01', 'K01', 'PR', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']); */
    }
}
