<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(KepsekTableSeeder::class);
        $this->call(GuruTableSeeder::class);
        $this->call(WaliTableSeeder::class);
        $this->call(TahunAjaranTableSeeder::class);
        $this->call(MapelTableSeeder::class);
        $this->call(MapelGuruTableSeeder::class);
        $this->call(KelasTableSeeder::class);
        $this->call(KelasAktifTableSeeder::class);
        $this->call(RosterTableSeeder::class);
        $this->call(EskstrakurikulerTableSeeder::class);
        $this->call(SiswaTableSeeder::class);
        $this->call(PrestasiTableSeeder::class);
        $this->call(SesiTableSeeder::class);
        $this->call(NilaiSiswa1TableSeeder::class);
        $this->call(NilaiSiswa2TableSeeder::class);
        $this->call(KontrakTableSeeder::class);
    }
}
