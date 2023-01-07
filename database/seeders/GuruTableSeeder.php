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
        //Admin
        User::create([
            'uuid' => '10afab12-75d2-11ed-9489-f875a4fd08d6',
            'username' => '1234567890123456',
            'password' => Hash::make('1234567890123456')
        ])->assignRole('admin');

        Guru::create([
            'NUPTK' => '1234567890123456',
            'user' => '10afab12-75d2-11ed-9489-f875a4fd08d6',
            'jabatan' => 'tu',
            'tanggal_masuk' => '2022-01-12',
            'status' => 'aktif'
        ]);

        UserProfile::Create([
            'user' => '10afab12-75d2-11ed-9489-f875a4fd08d6',
            'nama' => 'Admin',
            'jenis_kelamin' => 'LK'
        ]);

        // Guru
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
        
        DB::select('CALL add_guru(?, ?, ?, ?, ?, ?)', ["Wali Kelas Tiga", '5555555555555555', Hash::make('5555555555555555'), '2022-01-12', 'LK', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_guru(?, ?, ?, ?, ?, ?)', ["Guru Satu", '6666666666666666', Hash::make('6666666666666666'), '2022-01-12', 'PR', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_guru(?, ?, ?, ?, ?, ?)', ["Guru Dua", '7777777777777777', Hash::make('7777777777777777'), '2022-01-12', 'LK', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_guru(?, ?, ?, ?, ?, ?)', ["Guru Tiga", '8888888888888888', Hash::make('8888888888888888'), '2022-01-12', 'PR', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_guru(?, ?, ?, ?, ?, ?)', ["Guru Empat", '9999999999999999', Hash::make('9999999999999999'), '2022-01-12', 'LK', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_guru(?, ?, ?, ?, ?, ?)', ["Guru Lima", '1010101010101010', Hash::make('1010101010101010'), '2022-01-12', 'PR', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
    }
}
