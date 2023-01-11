<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KontrakSemester;

class KontrakTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Update Kontrak
        KontrakSemester::where('kontrak_semester_id', 1)->update([
            "status" => "lulus",
        ]);
        KontrakSemester::where('kontrak_semester_id', 2)->update([
            "status" => "lulus",
        ]);
        KontrakSemester::where('kontrak_semester_id', 3)->update([
            "status" => "lulus",
        ]);
        KontrakSemester::where('kontrak_semester_id', 4)->update([
            "status" => "lulus",
        ]);
        KontrakSemester::where('kontrak_semester_id', 5)->update([
            "status" => "lulus",
        ]);
        KontrakSemester::where('kontrak_semester_id', 6)->update([
            "status" => "lulus",
        ]);

        KontrakSemester::create([
            "siswa" => "1111111111",
            "kelas" => "2a18b5be-8df3-11ed-86b2-f875a4fd08d6",
            "grade" => 7,
            "semester_aktif" => "genap",
            "tahun_ajaran_aktif" => "2022-2023",
            "status" => "ongoing"
        ]);

        KontrakSemester::create([
            "siswa" => "2222222222",
            "kelas" => "2a18f2c2-8df3-11ed-86b2-f875a4fd08d6",
            "grade" => 7,
            "semester_aktif" => "genap",
            "tahun_ajaran_aktif" => "2022-2023",
            "status" => "ongoing"
        ]);

        KontrakSemester::create([
            "siswa" => "3333333333",
            "kelas" => "2a18b5be-8df3-11ed-86b2-f875a4fd08d6",
            "grade" => 7,
            "semester_aktif" => "genap",
            "tahun_ajaran_aktif" => "2022-2023",
            "status" => "ongoing"
        ]);

        KontrakSemester::create([
            "siswa" => "4444444444",
            "kelas" => "2a18b5be-8df3-11ed-86b2-f875a4fd08d6",
            "grade" => 7,
            "semester_aktif" => "genap",
            "tahun_ajaran_aktif" => "2022-2023",
            "status" => "ongoing"
        ]);
    }
}
