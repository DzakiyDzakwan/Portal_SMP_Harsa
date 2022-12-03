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
                'username'=>"021203",
                "password"=>Hash::make("admin1"),
                'uuid'=>Str::uuid('admin'),
                'role'=>'admin'
            ],
            [
                'username'=>"031202",
                "password"=>Hash::make("guru"),
                'uuid'=>Str::uuid('guru'),
                'role'=>'guru'
            ] 
            ];
            \DB::table('users')->insert($users);
    }
}
