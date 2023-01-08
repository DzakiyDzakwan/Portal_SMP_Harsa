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
        /* DB::select('CALL add_nilai(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [4, "M01", "111111111111111111", "1", 80, 85,"Siswa Berhasil menyelesaikan dengan baik",  90, "Sikap dan Perilaku Siswa sangat baik", "pending"]); */
        DB::table('nilais')->insert([
            [
            'sesi' => '5',
            'mapel' => 'MW001',
            'guru' => '4444444444444444',
            'pemeriksa' => '59f5ab12-75d2-11ed-9489-f875a4fd08d6',
            'kontrak_siswa' => '1',
            'jenis' => 'uas',
            'kkm_aktif' => '81',
            'nilai_pengetahuan' => '90',
            'deskripsi_pengetahuan'=> 'Sangat baik dalam memahami materi',
            'nilai_keterampilan'=> '92',
            'deskripsi_keterampilan' => 'Sangat baik dalam praktik',
            'status' => 'confirmed'
            ],
            [
            'sesi' => '5',
            'mapel' => 'MW002',
            'guru' => '5555555555555555',
            'pemeriksa' => '59f5ab12-75d2-11ed-9489-f875a4fd08d6',
            'kontrak_siswa' => '1',
            'jenis' => 'uas',
            'kkm_aktif' => '81',
            'nilai_pengetahuan' => '94',
            'deskripsi_pengetahuan'=> 'Sangat baik dalam memahami materi',
            'nilai_keterampilan'=> '96',
            'deskripsi_keterampilan' => 'Sangat baik dalam praktik',
            'status' => 'confirmed'
            ],
            [
            'sesi' => '5',
            'mapel' => 'MW003',
            'guru' => '8888888888888888',
            'pemeriksa' => '59f5ab12-75d2-11ed-9489-f875a4fd08d6',
            'kontrak_siswa' => '1',
            'jenis' => 'uas',
            'kkm_aktif' => '81',
            'nilai_pengetahuan' => '89',
            'deskripsi_pengetahuan'=> 'Sangat baik dalam memahami materi',
            'nilai_keterampilan'=> '88',
            'deskripsi_keterampilan' => 'Sangat baik dalam praktik',
            'status' => 'confirmed'
            ],
            [
            'sesi' => '5',
            'mapel' => 'MP001',
            'guru' => '3333333333333333',
            'pemeriksa' => '59f5ab12-75d2-11ed-9489-f875a4fd08d6',
            'kontrak_siswa' => '1',
            'jenis' => 'uas',
            'kkm_aktif' => '81',
            'nilai_pengetahuan' => '93',
            'deskripsi_pengetahuan'=> 'Sangat baik dalam memahami materi',
            'nilai_keterampilan'=> '94',
            'deskripsi_keterampilan' => 'Sangat baik dalam praktik',
            'status' => 'confirmed'
            ],
            [
            'sesi' => '5',
            'mapel' => 'MP002',
            'guru' => '6666666666666666',
            'pemeriksa' => '59f5ab12-75d2-11ed-9489-f875a4fd08d6',
            'kontrak_siswa' => '1',
            'jenis' => 'uas',
            'kkm_aktif' => '81',
            'nilai_pengetahuan' => '91',
            'deskripsi_pengetahuan'=> 'Sangat baik dalam memahami materi',
            'nilai_keterampilan'=> '90',
            'deskripsi_keterampilan' => 'Sangat baik dalam praktik',
            'status' => 'confirmed'
            ],
            [
            'sesi' => '5',
            'mapel' => 'MP003',
            'guru' => '9999999999999999',
            'pemeriksa' => '59f5ab12-75d2-11ed-9489-f875a4fd08d6',
            'kontrak_siswa' => '1',
            'jenis' => 'uas',
            'kkm_aktif' => '81',
            'nilai_pengetahuan' => '78',
            'deskripsi_pengetahuan'=> 'Cukup baik dalam memahami materi',
            'nilai_keterampilan'=> '75',
            'deskripsi_keterampilan' => 'Cukup Baik dalam praktik',
            'status' => 'pending'
            ],
        ]);
    }
}
