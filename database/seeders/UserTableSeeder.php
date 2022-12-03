<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        $users = [
            [
                'username' => '12345',
                'password' => Hash::make("admin"),
                'uuid' => Str::uuid('admin'),
                'role' => 'admin'
            ],
            [
                'username' => '123456',
                'password' => Hash::make("guru1"),
                'uuid' => Str::uuid('guru1'),
                'role' => 'guru'
            ],
            [
                'username' => '12345678',
                'password' => Hash::make("guru2"),
                'uuid' => Str::uuid('guru2'),
                'role' => 'guru'
            ],
            [
                'username' => '123456789',
                'password' => Hash::make("siswa1"),
                'uuid' => Str::uuid('siswa1'),
                'role' => 'siswa'
            ],
            [
                'username' => '123457890',
                'password' => Hash::make("siswa2"),
                'uuid' => Str::uuid('siswa2'),
                'role' => 'siswa'
            ]

        ];
        \DB::table('users')->insert($users);
    }
}
