<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class GuruTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // INSERT INTO gurus(nip, jabatan, tanggal_masuk, status_keaktifan, is_wali_kelas, user, created_at, updated_at)
    //         VALUES(nip, jabatan, tgl_masuk, "aktif", "tidak", uuid, NOW(), NOW());
    public function run()
    {
        DB::table('gurus')->insert([
            [
                "nip" => '123456789123456789',
                "jabatan" => "guru",
                "tanggal_masuk" => Carbon::create('2021-11-01'),
                "status_keaktifan" => 'aktif',
                "is_wali_kelas" => "tidak",
                "user" => "guru1"
            ],
        ]);
    }
}
