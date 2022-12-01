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

        DB::unprepared(
            'CREATE PROCEDURE registrasi_admin(
                IN uname VARCHAR(255),
                IN pass VARCHAR(255),
            )
            BEGIN
            
                DECLARE errno INT;
                DECLARE uuid CHAR(36);
                DECLARE EXIT HANDLER FOR SQLEXCEPTION
                BEGIN
                    ROLLBACK;
                END;
                DECLARE exit handler for sqlwarning
                BEGIN
                    ROLLBACK;
                END;
            
                SET uuid = UUID();
            
                START TRANSACTION;
                INSERT INTO users(uuid, username, password, role, created_at, updated_at) 
                VALUES (uuid, uname, pass, "admin", NOW(), NOW());
            END'
        );

        DB::unprepared('
        CREATE PROCEDURE registrasi_guru(
            IN nama VARCHAR(255),
            IN nip CHAR(18),
            IN jabatan CHAR(4),
            IN pass VARCHAR(255),
            IN tgl_masuk DATE,
            IN jk CHAR(2),
            IN admin CHAR(36)
        )
        BEGIN
        
            DECLARE errno INT;
            DECLARE uuid CHAR(36);
            DECLARE EXIT HANDLER FOR SQLEXCEPTION
            BEGIN
                ROLLBACK;
            END;
            DECLARE exit handler for sqlwarning
            BEGIN
                ROLLBACK;
            END;
        
            SET uuid = UUID();
        
            START TRANSACTION;
            INSERT INTO users(uuid, username, password, role, created_at, updated_at) 
            VALUES (uuid, nip, pass, "guru", NOW(), NOW());
        
            INSERT INTO log_activities(user, transaksi, at, created_at) 
            VALUES(admin,`insert`, "users", NOW());
        
            INSERT INTO gurus(nip, jabatan, tanggal_masuk, status_keaktifan, is_wali_kelas, user, created_at, updated_at)
            VALUES(nip, jabatan, tgl_masuk, `aktif`, `tidak`, uuid, NOW(), NOW());
        
            INSERT INTO log_activities(user, transaksi, at, created_at) 
            VALUES(admin,`insert`, "gurus", NOW());
        
            INSERT INTO user_profiles(user, nama, jenis_kelamin, created_at, updated_at)
            VALUES (uuid, nama, jk, NOW(), NOW());
        
            INSERT INTO log_activities(user, transaksi, at, created_at) 
            VALUES(admin,`insert`, "user_profiles", NOW());
            COMMIT;
        END
        ');

        DB::unprepared('
        CREATE PROCEDURE registrasi_siswa(
            IN nama VARCHAR(255),
            IN nisn CHAR(10),
            IN nis CHAR(4),
            IN pass VARCHAR(255),
            IN tgl_masuk DATE,
            IN kelas_id CHAR(3),
            IN jk CHAR(2),
            IN admin CHAR(36)
        )
        BEGIN
        
            DECLARE errno INT;
            DECLARE uuid CHAR(36);
            DECLARE EXIT HANDLER FOR SQLEXCEPTION
            BEGIN
                ROLLBACK;
            END;
            DECLARE exit handler for sqlwarning
            BEGIN
                ROLLBACK;
            END;
        
            SET uuid = UUID();
        
            START TRANSACTION;
        
            INSERT INTO users(uuid, username, password, role, created_at, updated_at) 
            VALUES (uuid, nisn, pass, "siswa", NOW(), NOW());
        
            INSERT INTO log_activities(user, transaksi, at, created_at)
            VALUES(admin, `insert`, "users", NOW());
        
            INSERT INTO siswas(nisn, nis, ruang_kelas, kelas_awal, semester, status_keaktifan, user, created_at, updated_at)
            VALUES(nisn, nis, kelas_id, kelas_id, `1`, `aktif`, uuid, NOW(), NOW());
        
            INSERT INTO log_activities(user, transaksi, at, created_at)
            VALUES(admin, `insert`, "user_profiles", NOW());
        
            INSERT INTO user_profiles(user, nama, jenis_kelamin, created_at ,updated_at)
            VALUES (uuid, nama, jk, NOW(), NOW());
        
            INSERT INTO log_activities(user, transaksi, at, created_at)
            VALUES(admin, `insert`, "user_profiles", NOW());
        
            COMMIT;
        
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
        DB::unprepared("DROP PROCEDURE registrasi_admin");
        DB::unprepared("DROP PROCEDURE registrasi_guru");
        DB::unprepared("DROP PROCEDURE registrasi_siswa");
    }
};
