<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        Permission::create(['name' => 'view-user'])->assignRole(["kepsek","wakepsek"]);
        Permission::create(['name' => 'view-role'])->assignRole(["kepsek", "wakepsek"]);
        Permission::create(['name' => 'view-permission'])->assignRole(["kepsek"]);
        Permission::create(['name' => 'view-admin'])->assignRole("kepsek", "wakepsek");
        Permission::create(['name' => 'view-guru'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'view-siswa'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'view-tahun-akademik'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'view-mapel'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'view-mapel-guru'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'view-wali-kelas'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'view-kelas-saya'])->assignRole(["wali"]);
        Permission::create(['name' => 'view-kelas-guru'])->assignRole(["guru"]);
        Permission::create(['name' => 'view-kelas'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'view-kelas-aktif'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'view-roster'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'view-sesi-penilaian'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'view-konfirmasi-nilai'])->assignRole(["kepsek", "wakepsek"]);
        Permission::create(['name' => 'view-rapor'])->assignRole(["siswa"]);
        Permission::create(['name' => 'view-pembina-ekstrakurikuler'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'view-ekstrakurikuler-pembina'])->assignRole(["pembina"]);
        Permission::create(['name' => 'view-ekstrakurikuler-siswa'])->assignRole(["siswa"]);
        Permission::create(['name' => 'view-log'])->assignRole(["kepsek"]);
        

        //User
        Permission::create(['name' => 'assign-role-user'])->assignRole(["kepsek", "wakepsek"]);
        Permission::create(['name' => 'delete-user'])->assignRole(["kepsek", "wakepsek"]);
        Permission::create(['name' => 'update-user'])->assignRole(["kepsek", "wakepsek"]);

        //Role
        Permission::create(['name' => 'assign-permission-role'])->assignRole(["kepsek", "wakepsek"]);
        Permission::create(['name' => 'create-role'])->assignRole(["kepsek", "wakepsek"]);
        Permission::create(['name' => 'delete-role'])->assignRole(["kepsek", "wakepsek"]);
        Permission::create(['name' => 'update-role'])->assignRole(["kepsek", "wakepsek"]);

        //Permission
        Permission::create(['name' => 'create-permission'])->assignRole(["kepsek"]);
        Permission::create(['name' => 'delete-permission'])->assignRole(["kepsek"]);

        Permission::create(['name' => 'create admins'])->assignRole(["pembina"]);
        Permission::create(['name' => 'create siswas'])->assignRole(["pembina"]);
        Permission::create(['name' => 'create gurus'])->assignRole(["pembina"]);
        Permission::create(['name' => 'create tahuns'])->assignRole(["pembina"]);
        Permission::create(['name' => 'create mapelss'])->assignRole(["pembina"]);
        Permission::create(['name' => 'create mapel gurus'])->assignRole(["pembina"]);
        Permission::create(['name' => 'create kelas'])->assignRole(["pembina"]);
        Permission::create(['name' => 'create wali'])->assignRole(["pembina"]);
        Permission::create(['name' => 'create kelas aktif'])->assignRole(["pembina"]);
        Permission::create(['name' => 'create rosters'])->assignRole(["pembina"]);
        Permission::create(['name' => 'create pembina'])->assignRole(["pembina"]);
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
