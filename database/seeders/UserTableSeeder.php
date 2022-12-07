<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Master Admin jangan diubah
        User::create([
            'uuid' => '58f5ab52-75d2-11ed-9489-f875a4fd08d6',
            'username' => 'admin',
            'password' => Hash::make('admin')
        ]);
    }
}