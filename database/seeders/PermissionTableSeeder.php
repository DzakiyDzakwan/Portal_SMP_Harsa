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
        Permission::create(['name' => 'view-ekstrakurikuler'])->assignRole(["kepsek", "wakepsek", "admin"]);
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

        //Admin
        Permission::create(['name' => 'create-admin'])->assignRole(["kepsek", "wakepsek"]);
        Permission::create(['name' => 'inactive-admin'])->assignRole(["kepsek", "wakepsek"]);
        Permission::create(['name' => 'restore-admin'])->assignRole(["kepsek", "wakepsek"]);

        //Guru
        Permission::create(['name' => 'create-guru'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'inactive-guru'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'restore-guru'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'cetak-guru'])->assignRole(["kepsek"]);

        //Siswa
        Permission::create(['name' => 'create-siswa'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'edit-siswa'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'inactive-siswa'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'restore-siswa'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'cetak-siswa'])->assignRole(["kepsek"]);
        
        //Tahun Akademik
        Permission::create(['name' => 'create-tahun'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'edit-tahun'])->assignRole(["kepsek", "wakepsek", "admin"]);

        //Mata Pelajaran
        Permission::create(['name' => 'create-mapel'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'edit-mapel'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'inactive-mapel'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'restore-mapel'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'delete-mapel'])->assignRole(["kepsek", "wakepsek", "admin"]);

        //Mata Pelajaran Guru
        Permission::create(['name' => 'create-mapel-guru'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'delete-mapel-guru'])->assignRole(["kepsek", "wakepsek", "admin"]);

        //Wali Kelas
        Permission::create(['name' => 'create-wali'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'delete-wali'])->assignRole(["kepsek", "wakepsek", "admin"]);

        //Kelas
        Permission::create(['name' => 'create-kelas'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'edit-kelas'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'inactive-kelas'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'restore-kelas'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'delete-kelas'])->assignRole(["kepsek", "wakepsek", "admin"]);

        //Kelas Aktif
        Permission::create(['name' => 'create-kelas-aktif'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'edit-kelas-aktif'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'delete-kelas-aktif'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'cetak-kelas-aktif'])->assignRole(["kepsek"]);

        //Roster
        Permission::create(['name' => 'create-roster'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'edit-roster'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'delete-roster'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'cetak-roster'])->assignRole(["kepsek"]);

        //Sesi Penilaian
        Permission::create(['name' => 'create-sesi'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'edit-sesi'])->assignRole(["kepsek", "wakepsek", "admin"]);

        //Pembina Ekstrakurikuler
        Permission::create(['name' => 'create-pembina'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'delete-pembina'])->assignRole(["kepsek", "wakepsek", "admin"]);

        //Ekstrakurikuler
        Permission::create(['name' => 'create-ekstrakurikuler'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'edit-ekstrakurikuler'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'delete-ekstrakurikuler'])->assignRole(["kepsek", "wakepsek", "admin"]);
        Permission::create(['name' => 'cetak-ekstrakurikuler'])->assignRole(["kepsek"]);
    }
}
