<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Mata Pelajaran Wajib (MW)
        DB::select('CALL add_mapel(?, ?, ?, ?, ? ,?)', ['MW001', 'Pendidikan Agama dan Budi Pekerti', 'A', '81', 'Kurikulum Merdeka', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_mapel(?, ?, ?, ?, ? ,?)', ['MW002', 'Pendidikan Pancasila dan Kewarganegaraan', 'A', '81', 'Kurikulum Merdeka', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_mapel(?, ?, ?, ?, ? ,?)', ['MW003', 'Bahasa Indonesia', 'A', '81', 'Kurikulum Merdeka', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_mapel(?, ?, ?, ?, ? ,?)', ['MW004', 'Matematika', 'A', '81', 'Kurikulum Merdeka', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_mapel(?, ?, ?, ?, ? ,?)', ['MW005', 'IPA', 'A', '81', 'Kurikulum Merdeka', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_mapel(?, ?, ?, ?, ? ,?)', ['MW006', 'IPS', 'A', '81', 'Kurikulum Merdeka', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        //Mata Pelajaran Peminatan (MP)
        DB::select('CALL add_mapel(?, ?, ?, ?, ? ,?)', ['MP', 'Seni Budaya', 'B', '81', 'Kurikulum Merdeka', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_mapel(?, ?, ?, ?, ? ,?)', ['MP', 'Pendidikan Jasmani, Olahraga dan Kesenian', 'B', '81', 'Kurikulum Merdeka', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
    }
}
