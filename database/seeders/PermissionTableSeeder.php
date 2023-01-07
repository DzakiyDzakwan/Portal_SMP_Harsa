<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Menu
        Permission::create(['name' => 'menu users']);
        Permission::create(['name' => 'menu inactive users']);
        Permission::create(['name' => 'menu roles']);
        Permission::create(['name' => 'menu permissions']);
        Permission::create(['name' => 'menu admins']);
        Permission::create(['name' => 'menu siswas']);
        Permission::create(['name' => 'menu gurus']);
        Permission::create(['name' => 'menu tahuns']);
        Permission::create(['name' => 'menu mapels']);
        Permission::create(['name' => 'menu mapel gurus']);
        Permission::create(['name' => 'menu kelas']);
        Permission::create(['name' => 'menu rosters']);
        Permission::create(['name' => 'menu ekstrakurikulers']);
        Permission::create(['name' => 'menu ekstrakurikuler siswas']);
        Permission::create(['name' => 'menu sesi penilaian']);
        Permission::create(['name' => 'menu log']);

        //Create
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'create admins']);
        Permission::create(['name' => 'create siswas']);
        Permission::create(['name' => 'create gurus']);
        Permission::create(['name' => 'create tahuns']);
        Permission::create(['name' => 'create mapelss']);
        Permission::create(['name' => 'create mapel gurus']);
        Permission::create(['name' => 'create kelas']);
        Permission::create(['name' => 'create wali']);
        Permission::create(['name' => 'create kelas aktif']);
        Permission::create(['name' => 'create rosters']);
        Permission::create(['name' => 'create pembina']);
        Permission::create(['name' => 'create ekstrakurikulers']);
        Permission::create(['name' => 'create ekstrakurikuler siswas']);
        Permission::create(['name' => 'create sesi penilaians']);


        //Update
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'edit permissions']);
        Permission::create(['name' => 'edit gurus']);
        Permission::create(['name' => 'edit siswas']);

        //Inactive
        Permission::create(['name' => 'inactive siswas']);
        Permission::create(['name' => 'inactive gurus']);
        //Restore

        //Delete
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'delete roles']);
        Permission::create(['name' => 'delete permissions']);
        Permission::create(['name' => 'delete mapels']);
        Permission::create(['name' => 'delete mapel gurus']);
        Permission::create(['name' => 'delete kelass']);
        Permission::create(['name' => 'delete rosters']);

        //Assign
        Permission::create(['name' => 'assign roles']);
        Permission::create(['name' => 'assign permissions']);
    }
}
