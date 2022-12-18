<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NilaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::select('CALL add_nilai(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [4, "M01", "111111111111111111", "1", 80, 85,"Siswa Berhasil menyelesaikan dengan baik",  90, "Sikap dan Perilaku Siswa sangat baik", "pending"]);
    }
}
