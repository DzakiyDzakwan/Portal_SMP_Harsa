<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // INSERT INTO user_profiles(user, nama, jenis_kelamin, created_at ,updated_at)
    //         VALUES (uuid, nama, jk, NOW(), NOW());
    public function run()
    {
        DB::table('user_profiles')->insert([
            [
                "user" => 'siswa1',
                "nama" => "Talitha Syafiyah",
                "jenis_kelamin" => 'PR',
            ],
            [
                "user" => 'siswa2',
                "nama" => "Mutia Rahmah",
                "jenis_kelamin" => 'PR',
            ],
            [
                "user" => 'guru1',
                "nama" => "Dzakiy Dzakwan",
                "jenis_kelamin" => 'LK',
            ],
        ]);

    }
}
