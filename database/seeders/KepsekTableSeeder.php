<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Guru;
use App\Models\UserProfile;

class KepsekTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Kepala Sekolah
        User::create([
            'uuid' => '58f5ab52-75d2-11ed-9489-f875a4fd08d6',
            'username' => '1111111111111111',
            'password' => Hash::make('1111111111111111')
        ])->assignRole('kepsek');

        Guru::create([
            'NUPTK' => '1111111111111111',
            'user' => '58f5ab52-75d2-11ed-9489-f875a4fd08d6',
            'jabatan' => 'ks',
            'tanggal_masuk' => '2022-01-12',
            'status' => 'aktif'
        ]);

        UserProfile::Create([
            'user' => '58f5ab52-75d2-11ed-9489-f875a4fd08d6',
            'nama' => 'Kepala Sekolah Satu',
            'jenis_kelamin' => 'LK'
        ]);

        //Wakil Kepala Sekolah
        User::create([
            'uuid' => '59f5ab12-75d2-11ed-9489-f875a4fd08d6',
            'username' => '2222222222222222',
            'password' => Hash::make('2222222222222222')
        ])->assignRole('wakepsek');

        Guru::create([
            'NUPTK' => '2222222222222222',
            'user' => '59f5ab12-75d2-11ed-9489-f875a4fd08d6',
            'jabatan' => 'wks',
            'tanggal_masuk' => '2022-01-12',
            'status' => 'aktif'
        ]);

        UserProfile::Create([
            'user' => '59f5ab12-75d2-11ed-9489-f875a4fd08d6',
            'nama' => 'Wakil Kepala Sekolah Satu',
            'jenis_kelamin' => 'LK'
        ]);
    }
}
