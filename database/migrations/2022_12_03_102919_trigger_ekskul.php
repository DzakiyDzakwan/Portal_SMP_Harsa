<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* log insert ekskul */
        DB::unprepared('
        CREATE TRIGGER log_insert_ekskul
        AFTER INSERT on ekskuls
        FOR EACH ROW
        BEGIN
        INSERT INTO log_ekskuls (n_ekskul_id, n_nama, n_hari, n_waktu_mulai, n_waktu_akhir, n_tempat, n_kelas, keterangan, created_at)
        VALUES (NEW.ekskul_id, NEW.nama, NEW.hari, NEW.waktu_mulai, NEW.waktu_akhir, NEW.tempat, NEW.kelas, "insert", NOW());
<<<<<<< HEAD
        END;
=======
        END
>>>>>>> f08e942c9761112ee0719b3ed12a50c1839515ae
        ');

        /* log delete ekskul */
        DB::unprepared('
        CREATE TRIGGER log_delete_ekskul
        AFTER DELETE on ekskuls
        FOR EACH ROW
        BEGIN
        INSERT INTO log_ekskuls (o_ekskul_id, o_nama, o_hari, o_waktu_mulai, o_waktu_akhir, o_tempat, o_kelas, keterangan, created_at)
        VALUES (OLD.ekskul_id, OLD.nama, OLD.hari, OLD.waktu_mulai, OLD.waktu_akhir, OLD.tempat, OLD.kelas, "delete", NOW());
<<<<<<< HEAD
        END;
=======
        END
>>>>>>> f08e942c9761112ee0719b3ed12a50c1839515ae
        ');


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< HEAD
        DB::unprepared('DROP TRIGGER log_insert_ekskul');
=======
        DB::unprepared('DROP TRIGGER log_ekskul');
>>>>>>> f08e942c9761112ee0719b3ed12a50c1839515ae
        DB::unprepared('DROP TRIGGER log_delete_ekskul');
    }
};
