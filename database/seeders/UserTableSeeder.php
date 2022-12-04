<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username'=>"12345",
                "password"=>Hash::make("12345"),
                "uuid" => 'admin1',
                "role" => 'admin'
            ],
            [
                'username'=>"211402018",
                "password"=>Hash::make("211402018"),
                "uuid" => 'siswa1',
                "role" => 'siswa'
            ],
            [
                'username'=>"211402009",
                "password"=>Hash::make("211402009"),
                "uuid" => 'siswa2',
                "role" => 'siswa'
            ],
            [
                'username'=>"123456789123456789",
                "password"=>Hash::make("123456789123456789"),
                "uuid" => 'guru1',
                "role" => 'guru'
            ],
        ]);
    }
}