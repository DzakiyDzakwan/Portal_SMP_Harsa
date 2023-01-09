<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE function umur(
            tgl_lahir DATE
        )
        RETURNS INT
        BEGIN
            DECLARE umur INT;
            SET umur = YEAR(curdate())-YEAR(tgl_lahir) - (RIGHT(curdate(),5) < RIGHT(tgl_lahir,5));
            RETURN(umur);
        END
        ');

        DB::unprepared('
        CREATE function masa_mengajar(
            tanggal_masuk DATE
        )
        RETURNS INT
        BEGIN
            RETURN(DATEDIFF(NOW(), tanggal_masuk));
        END
        ');

        DB::unprepared('
        CREATE FUNCTION time_status(
            start DATETIME,
            end DATETIME
        )
        RETURNS CHAR(7)
        BEGIN
            DECLARE status CHAR(7);
            IF start > NOW() THEN
                SET status = "inaktif";
            ELSEIF start < NOW() AND end > NOW() THEN
                SET status = "aktif";
            ELSE
                SET status = "selesai";
            END IF;
            RETURN(status);
        END
        ');


        /* DB::unprepared('
        CREATE FUNCTION waktu_akhir(
            waktu_awal TIME,
            durasi INT 
        )
        RETURNS TIME
        BEGIN
            DECLARE waktu_akhir TIME;
            SET waktu_akhir = ADDTIME(waktu_awal, SEC_TO_TIME(durasi*60));
        return (waktu_akhir);
        END
        '); */

        DB::unprepared('
        CREATE FUNCTION durasi(
            waktu_awal TIME,
            waktu_akhir TIME 
        )
        RETURNS INT
        BEGIN
            DECLARE durasi INT;
            SET durasi = TIMEDIFF(waktu_akhir, waktu_awal)*0.006;
            return durasi;
        END
        ');

        DB::unprepared('
        CREATE FUNCTION cek_sesi(
            waktu_awal DATETIME,
            waktu_akhir DATETIME
        )
        RETURNS INT
        BEGIN
            DECLARE hasil INT;
            IF waktu_awal > NOW() OR waktu_akhir < NOW() THEN
                SET hasil = 0;
            ELSE
                SET hasil = 1;
            END IF;
            RETURN(hasil);
        END
        ');

        DB::unprepared('
        CREATE FUNCTION get_sesi(
            waktu_awal DATETIME,
            waktu_akhir DATETIME
        )
        RETURNS INT
        BEGIN
            DECLARE id INT;
            SELECT sesi_id INTO id WHERE cek_sesi(waktu_awal, waktu_akhir) = 1;
            RETURN(id);
        END
        ');

        DB::unprepared('
        CREATE function indeks(
            kkm INT,
            nilai FLOAT
        )
        RETURNS CHAR(1)
        BEGIN
        DECLARE i CHAR(1);
            IF kkm = 81 THEN
                IF nilai >= 0 AND nilai < 81 THEN
                SET i = "D";
                ELSEIF nilai >= 81 AND nilai <= 86 THEN
                SET i = "C";
                ELSEIF nilai > 86 AND nilai <= 92 THEN
                SET i = "B";
                ELSEIF nilai > 92 AND nilai <= 100 THEN
                SET i = "A";
                ELSE
                SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "indeks Error";
                END IF;
            ELSEIF kkm = 82 THEN
                IF nilai >= 0 AND nilai < 82 THEN
                SET i = "D";
                ELSEIF nilai >= 82 AND nilai <= 87 THEN
                SET i = "C";
                ELSEIF nilai > 87 AND nilai <= 93 THEN
                SET i = "B";
                ELSEIF nilai > 93 AND nilai <= 100 THEN
                SET i = "A";
                ELSE
                SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "indeks Error";
                END IF;
            ELSEIF kkm = 83 THEN
                IF nilai >= 0 AND nilai < 83 THEN
                SET i = "D";
                ELSEIF nilai >= 83 AND nilai <= 88 THEN
                SET i = "C";
                ELSEIF nilai > 88 AND nilai <= 94 THEN
                SET i = "B";
                ELSEIF nilai > 94 AND nilai <= 100 THEN
                SET i = "A";
                ELSE
                SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "indeks Error";
                END IF;
            ELSEIF kkm = 84 THEN
                IF nilai >= 0 AND nilai < 84 THEN
                SET i = "D";
                ELSEIF nilai >= 84 AND nilai <= 89 THEN
                SET i = "C";
                ELSEIF nilai > 89 AND nilai <= 95 THEN
                SET i = "B";
                ELSEIF nilai > 95 AND nilai <= 100 THEN
                SET i = "A";
                ELSE
                SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "indeks Error";
                END IF;
            END IF;
            RETURN (i);
        END
        ');

        /* DB::unprepared('
        CREATE FUNCTION is_nilai_exists(
            sesi INT,
            mapel CHAR(3),
            kontrak INT,
            jenis CHAR(3)
        )
        RETURNS INT
        BEGIN
            RETURN (SELECT EXISTS(SELECT 1 FROM nilais WHERE sesi = sesi AND mapel = mapel AND kontrak_siswa = kontrak AND jenis= jenis));
        END
        '); */

        DB::unprepared('
        CREATE FUNCTION nilai_tengah_semester(
            uh1 float,
            uh2 float,
    		uh3 float,
    		uts float
        )
        RETURNS FLOAT
        BEGIN
            DECLARE nilai FLOAT;
            SET nilai = (uh1 + uh2 + uh3 + uts)/4;
            return nilai;
        END
        ');

        DB::unprepared('
        CREATE FUNCTION nilai_akhir_semester(
            nilai_tengah_semester float,
            uas float
        )
        RETURNS FLOAT
        BEGIN
            DECLARE nilai FLOAT;
            SET nilai = (nilai_tengah_semester + uas)/2;
            return nilai;
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION umur');
        DB::unprepared('DROP FUNCTION masa_mengajar');
        DB::unprepared('DROP FUNCTION time_status');
        DB::unprepared('DROP FUNCTION durasi');
        DB::unprepared('DROP FUNCTION nilai_tengah_semester');
        DB::unprepared('DROP FUNCTION nilai_akhir_semester');
        // DB::unprepared('DROP FUNCTION get_sesi');
        // DB::unprepared('DROP FUNCTION indeks');
        // DB::unprepared('DROP FUNCTION is_nilai_exists');

    }
};
