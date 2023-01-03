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
        /* DB::select('CALL add_guru(?, ?, ?, ?, ?, ?, ?)', ["Agus Supriatno", '111111111111111111', 'wks', Hash::make('111111111111111111'), '2022-01-12', 'LK', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_guru(?, ?, ?, ?, ?, ?, ?)', ["Mayang Indah", '222222222222222222', 'guru', Hash::make('222222222222222222'), '2022-01-12', 'PR', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_guru(?, ?, ?, ?, ?, ?, ?)', ["Roni Suwitno", '333333333333333333', 'guru', Hash::make('333333333333333333'), '2022-01-12', 'LK', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_guru(?, ?, ?, ?, ?, ?, ?)', ["Hana Rachel", '444444444444444444', 'guru', Hash::make('444444444444444444'), '2022-01-12', 'PR', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_guru(?, ?, ?, ?, ?, ?, ?)', ["Jonal Stipelberg", '123456789012345678', 'guru', Hash::make('444444444444444444'), '2022-01-12', 'LK', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_guru(?, ?, ?, ?, ?, ?, ?)', ["Ulrich Nielsen", '876543210987654321', 'guru', Hash::make('444444444444444444'), '2022-01-12', 'PR', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']);
        DB::select('CALL add_guru(?, ?, ?, ?, ?, ?, ?)', ["Yuki Hanamura", '555555555555555555', 'guru', Hash::make('444444444444444444'), '2022-01-12', 'PR', '58f5ab52-75d2-11ed-9489-f875a4fd08d6']); */

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

        //Admin


        //Guru
        User::create([
            'uuid' => '58f5ab31-75d2-11ed-9489-f875a4fd08d6',
            'username' => '3333333333333333',
            'password' => Hash::make('3333333333333333')
        ])->assignRole('guru');

        Guru::create([
            'NUPTK' => '3333333333333333',
            'user' => '58f5ab31-75d2-11ed-9489-f875a4fd08d6',
            'jabatan' => 'guru',
            'tanggal_masuk' => '2022-01-12',
            'status' => 'aktif'
        ]);

        UserProfile::Create([
            'user' => '58f5ab31-75d2-11ed-9489-f875a4fd08d6',
            'nama' => 'Guru Satu',
            'jenis_kelamin' => 'PR'
        ]);

    }
}
