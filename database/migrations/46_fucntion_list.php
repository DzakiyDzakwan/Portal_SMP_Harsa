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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION masa_mengajar');
        DB::unprepared('DROP FUNCTION umur');
        DB::unprepared('DROP FUNCTION indeks');
    }
};