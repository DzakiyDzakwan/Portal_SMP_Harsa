<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        \DB::table('users')->insert([
            [
                'uuid' => '123',
                'username' => '12345',
                'password' => bcrypt('12345'),
                'role' => 'admin',
            ],
            [
                'uuid' => '321',
                'username' => '54321',
                'password' => bcrypt('54321'),
                'role' => 'guru',
            ],
        ]);
    }
}
