<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::Create(['name' => 'kepsek']);
        Role::Create(['name' => 'wakepsek']);
        Role::Create(['name' => 'admin']);
        Role::Create(['name' => 'guru']);
        Role::Create(['name' => 'wali']);
        Role::Create(['name' => 'siswa']);
        Role::Create(['name' => 'pembina']);
    }
}
