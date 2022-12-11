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
        DB::select('CALL add_siswa(?, ?, ?, ?, ?, ?, ?, ?)', ['Siswa Dummy Satu', '1234567890', '1234', Hash::make('1234'), '2022-12-01', 'K01', 'LK', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
    }
}
