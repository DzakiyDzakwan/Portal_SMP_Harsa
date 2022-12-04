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
        DB::table('kelas')->insert([
            [
                "kelas_id" => 'A01',
                "kelompok_kelas" => "8A",
                "nama_kelas" => 'Ibnu Sina',
                "wali_kelas" => '123456789123456789'
            ],
        ]);
    }
}
