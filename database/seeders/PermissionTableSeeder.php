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
        //Show
        Permission::create(['name' => 'show users']);
        Permission::create(['name' => 'show inactive users']);
        Permission::create(['name' => 'show roles']);
        Permission::create(['name' => 'show permissions']);
        Permission::create(['name' => 'show admins']);
        Permission::create(['name' => 'show siswas']);
        Permission::create(['name' => 'show gurus']);
        Permission::create(['name' => 'show tahuns']);
        Permission::create(['name' => 'show mapels']);
        Permission::create(['name' => 'show mapel gurus']);
        Permission::create(['name' => 'show kelas']);
        Permission::create(['name' => 'show rosters']);
        Permission::create(['name' => 'show ekstrakurikulers']);
        Permission::create(['name' => 'show ekstrakurikuler siswas']);
        Permission::create(['name' => 'show sesi penilaian']);

        //Create
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'create admins']);
        Permission::create(['name' => 'create siswas']);
        Permission::create(['name' => 'create gurus']);
        Permission::create(['name' => 'create tahuns']);
        Permission::create(['name' => 'create mapelss']);
        Permission::create(['name' => 'create mapel gurus']);
        Permission::create(['name' => 'create kelass']);
        Permission::create(['name' => 'create rosters']);
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
