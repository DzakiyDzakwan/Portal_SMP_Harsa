<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PrestasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* DB::table('prestasis')->insert([
            [
                "siswa" => '211402018',
                "jenis_prestasi" => "Akademik",
                "keterangan" => 'Olimpiade Matematika Tingkat Provinsi',
                "tanggal_prestasi" => Carbon::create('2020-01-01'),
                "semester" => '2'
            ],
            [
                "siswa" => '211402009',
                "jenis_prestasi" => "NonAkademik",
                "keterangan" => 'Juara Terbaik 1 Membaca Puisi',
                "tanggal_prestasi" => Carbon::create('2021-11-01'),
                "semester" => '2'
            ],
        ]); */
        DB::select('CALL add_prestasi(?, ?, ?, ?, ?)', ["1234567890", "Akademik", "Juara 1 Tidur di Kelas tingkat Nasional", "2022-12-01", '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_prestasi(?, ?, ?, ?, ?)', ["1234567890", "Akademik", "Juara 1 Menggambar Gunung Legend Tingkat Internasional", "2022-12-01", '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
    }
}
