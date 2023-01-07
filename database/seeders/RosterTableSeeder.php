<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RosterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Kelas A
        //Senin
        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [1, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '08:10:00', '08:50:00', "Senin", "10afab12-75d2-11ed-9489-f875a4fd08d6"]);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [1, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '08:50:00', '09:30:00', "Senin", "10afab12-75d2-11ed-9489-f875a4fd08d6"]);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [4, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '09:45:00', '10:25:00', "Senin", "10afab12-75d2-11ed-9489-f875a4fd08d6"]);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [4, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '10:25:00', '11:05:00', "Senin", "10afab12-75d2-11ed-9489-f875a4fd08d6"]);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [4, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '11:05:00', '11:45:00', "Senin", "10afab12-75d2-11ed-9489-f875a4fd08d6"]);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [6, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '11:45:00', '12:25:00', "Senin", "10afab12-75d2-11ed-9489-f875a4fd08d6"]);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [6, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '13:00:00', '13:40:00', "Senin", "10afab12-75d2-11ed-9489-f875a4fd08d6"]);

        //Selasa
        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [5, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '07:30:00', '08:10:00', "Selasa", '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [5, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '08:10:00', '08:50:00', "Selasa", '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [5, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '08:50:00', '09:30:00', "Selasa", '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [8, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '09:45:00', '10:25:00', "Selasa", '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [8, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '10:25:00', '11:05:00', "Selasa", '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [4, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '11:05:00', '11:45:00', "Selasa", '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [4, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '11:45:00', '12:25:00', "Selasa", '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [4, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '13:00:00', '13:40:00', "Senin", "10afab12-75d2-11ed-9489-f875a4fd08d6"]);
        
        //Rabu
        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [7, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '07:30:00', '08:10:00', "Selasa", '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [7, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '08:10:00', '08:50:00', "Selasa", '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [6, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '08:50:00', '09:30:00', "Selasa", '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [6, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '09:45:00', '10:25:00', "Selasa", '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [3, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '10:25:00', '11:05:00', "Selasa", '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [3, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '11:05:00', '11:45:00', "Selasa", '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [5, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '11:45:00', '12:25:00', "Selasa", '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [5, "2a18b5be-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '13:00:00', '13:40:00', "Senin", "10afab12-75d2-11ed-9489-f875a4fd08d6"]);


        //kelas B
        //Senin
        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [2, "2a18f2c2-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '08:10:00', '08:50:00', "Senin", "10afab12-75d2-11ed-9489-f875a4fd08d6"]);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [2, "2a18f2c2-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '08:50:00', '09:30:00', "Senin", "10afab12-75d2-11ed-9489-f875a4fd08d6"]);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [5, "2a18f2c2-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '09:45:00', '10:25:00', "Senin", "10afab12-75d2-11ed-9489-f875a4fd08d6"]);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [5, "2a18f2c2-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '10:25:00', '11:05:00', "Senin", "10afab12-75d2-11ed-9489-f875a4fd08d6"]);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [5, "2a18f2c2-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '11:05:00', '11:45:00', "Senin", "10afab12-75d2-11ed-9489-f875a4fd08d6"]);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [1, "2a18f2c2-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '11:45:00', '12:25:00', "Senin", "10afab12-75d2-11ed-9489-f875a4fd08d6"]);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [1, "2a18f2c2-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '13:00:00', '13:40:00', "Senin", "10afab12-75d2-11ed-9489-f875a4fd08d6"]);

        //Selasa
        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [8, "2a18f2c2-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '07:30:00', '08:10:00', "Selasa", '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [8, "2a18f2c2-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '08:10:00', '08:50:00', "Selasa", '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [6, "2a18f2c2-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '08:50:00', '09:30:00', "Selasa", '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [6, "2a18f2c2-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '09:45:00', '10:25:00', "Selasa", '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [4, "2a18f2c2-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '10:25:00', '11:05:00', "Selasa", '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [4, "2a18f2c2-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '11:05:00', '11:45:00', "Selasa", '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [7, "2a18f2c2-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '11:45:00', '12:25:00', "Selasa", '10afab12-75d2-11ed-9489-f875a4fd08d6']);

        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [7, "2a18f2c2-8df3-11ed-86b2-f875a4fd08d6", "2022-2023", "genap", '13:00:00', '13:40:00', "Senin", "10afab12-75d2-11ed-9489-f875a4fd08d6"]);
    }
}
