<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\Guru;
use App\Models\User;
use App\Models\UserProfile;

class WaliTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Wali Kelas
       User::create([
        'uuid' => '58f5ab31-75d2-11ed-9489-f875a4fd08d6',
        'username' => '3333333333333333',
        'password' => Hash::make('3333333333333333')
    ])->assignRole(['guru', 'wali']);

    Guru::create([
        'NUPTK' => '3333333333333333',
        'user' => '58f5ab31-75d2-11ed-9489-f875a4fd08d6',
        'jabatan' => 'guru',
        'tanggal_masuk' => '2022-01-12',
        'status' => 'aktif'
    ]);

    UserProfile::Create([
        'user' => '58f5ab31-75d2-11ed-9489-f875a4fd08d6',
        'nama' => 'Wali Kelas Satu',
        'jenis_kelamin' => 'PR'
    ]);

    User::create([
        'uuid' => '58f5ab31-75d2-11ed-9489-g907a4fd08d6',
        'username' => '4444444444444444',
        'password' => Hash::make('4444444444444444')
    ])->assignRole(['guru', 'wali']);

    Guru::create([
        'NUPTK' => '4444444444444444',
        'user' => '58f5ab31-75d2-11ed-9489-g907a4fd08d6',
        'jabatan' => 'guru',
        'tanggal_masuk' => '2022-01-12',
        'status' => 'aktif'
    ]);

    UserProfile::Create([
        'user' => '58f5ab31-75d2-11ed-9489-g907a4fd08d6',
        'nama' => 'Wali Kelas Dua',
        'jenis_kelamin' => 'LK'
    ]);

    User::create([
        'uuid' => '69f5ab31-75d2-11ed-9477-g007a4fd08d7',
        'username' => '2020202020202020',
        'password' => Hash::make('2020202020202020')
    ])->assignRole(['guru', 'wali']);

    Guru::create([
        'NUPTK' => '2020202020202020',
        'user' => '69f5ab31-75d2-11ed-9477-g007a4fd08d7',
        'jabatan' => 'guru',
        'tanggal_masuk' => '2022-01-12',
        'status' => 'aktif'
    ]);

    UserProfile::Create([
        'user' => '69f5ab31-75d2-11ed-9477-g007a4fd08d7',
        'nama' => 'Wali Kelas Empat',
        'jenis_kelamin' => 'PR'
    ]);

    User::create([
        'uuid' => '69f5a123-88d2-11ed-9477-g007a4fd08d7',
        'username' => '3030303030303030',
        'password' => Hash::make('3030303030303030')
    ])->assignRole(['guru', 'wali']);

    Guru::create([
        'NUPTK' => '3030303030303030',
        'user' => '69f5a123-88d2-11ed-9477-g007a4fd08d7',
        'jabatan' => 'guru',
        'tanggal_masuk' => '2022-01-12',
        'status' => 'aktif'
    ]);

    UserProfile::Create([
        'user' => '69f5a123-88d2-11ed-9477-g007a4fd08d7',
        'nama' => 'Wali Kelas Empat',
        'jenis_kelamin' => 'LK'
    ]);

    }
}
