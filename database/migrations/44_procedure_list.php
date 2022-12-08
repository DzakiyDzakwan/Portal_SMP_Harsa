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
            CREATE PROCEDURE add_admin(
                IN uname VARCHAR(255),
                IN pass VARCHAR(255),
                IN admin CHAR(36)
            )
            BEGIN
            
                DECLARE errno INT;
                DECLARE uuid CHAR(36);
                DECLARE EXIT HANDLER FOR SQLEXCEPTION
                BEGIN
                    ROLLBACK;
                END;
            
                SET uuid = UUID();
            
                START TRANSACTION;
                INSERT INTO users(uuid, username, password, role, created_at, updated_at) 
                VALUES (uuid, uname, pass, "admin", NOW(), NOW());

                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(admin, "insert", "users", NOW());
                
                COMMIT;
            END
        ');

        DB::unprepared('
            CREATE PROCEDURE inactive_admin (
                IN admin CHAR(36)
            )
            BEGIN
                DECLARE errno INT;
                DECLARE EXIT HANDLER FOR SQLEXCEPTION
                BEGIN
                    ROLLBACK;
                END;
                START TRANSACTION;
                UPDATE users SET deleted_at = NOW() WHERE uuid = admin COLLATE utf8mb4_general_ci; 
                COMMIT;
            END
        ');

        DB::unprepared('
        CREATE PROCEDURE add_guru(
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
            DECLARE EXIT HANDLER for SQLWARNING
            BEGIN
                ROLLBACK;
            END;
        
            SET uuid = UUID();
        
            START TRANSACTION;
            INSERT INTO users(uuid, username, password, role, created_at, updated_at) 
            VALUES (uuid, nip, pass, "guru", NOW(), NOW());
        
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(admin, "insert", "users", NOW());
        
            INSERT INTO user_profiles(user, nama, jenis_kelamin, created_at, updated_at)
            VALUES (uuid, nama, jk, NOW(), NOW());
        
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(admin, "insert", "user_profiles", NOW());
        
            INSERT INTO gurus(nip, user, jabatan, tanggal_masuk, status, is_wali_kelas, created_at, updated_at)
            VALUES(nip, uuid, jabatan, tgl_masuk, "aktif", "tidak", NOW(), NOW());
        
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(admin, "insert", "gurus", NOW());
            COMMIT;
        
        END
        ');

        DB::unprepared('
            CREATE PROCEDURE inactive_guru (
                IN guru CHAR(36),
                IN admin CHAR(36)
            )
            BEGIN
                DECLARE errno INT;
                DECLARE EXIT HANDLER FOR SQLEXCEPTION
                BEGIN
                    ROLLBACK;
                END;
                START TRANSACTION;
                UPDATE gurus SET status = "Inaktif", updated_at = NOW()  WHERE user = guru COLLATE utf8mb4_general_ci;
            
                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(admin, "update", "gurus", NOW());
                
                UPDATE users SET deleted_at = NOW() WHERE uuid = guru COLLATE utf8mb4_general_ci; 
                COMMIT;
            END
        ');

        DB::unprepared('
        CREATE PROCEDURE add_mapel(
            IN mapel CHAR(3),
            IN nama VARCHAR(255),
            IN kelompok CHAR(1),
            IN krklm VARCHAR(255),
            IN admin CHAR(36)
            )
            BEGIN

                DECLARE errno INT;
                DECLARE EXIT HANDLER FOR SQLEXCEPTION
                BEGIN
                    ROLLBACK;
                END;
                START TRANSACTION;
            
                INSERT INTO mapels(mapel_id, nama_mapel, kelompok_mapel, kurikulum, created_at, updated_at)
                VALUES (mapel, nama, kelompok, krklm, NOW(), NOW());
            
                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(admin, "insert", "mapels", NOW());

                COMMIT;
            
        END
        ');

        DB::unprepared('
            CREATE PROCEDURE inactive_mapel(
                IN mapel CHAR(3),
                admin CHAR(36)
            )
            BEGIN

                DECLARE errno INT;
                DECLARE EXIT HANDLER FOR SQLEXCEPTION
                    BEGIN
                        ROLLBACK;
                    END;
                START TRANSACTION;
                UPDATE mapels SET deleted_at = NOW() WHERE mapel_id = mapel COLLATE utf8mb4_general_ci;
            
                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(admin, "update", "mapels", NOW());
            
                UPDATE mapel_gurus SET deleted_at = NOW() WHERE mapel = mapel COLLATE utf8mb4_general_ci;

                COMMIT;
                
            END
        ');

        DB::unprepared('
            CREATE PROCEDURE delete_mapel(
                IN mapel CHAR(3),
                IN admin CHAR(36)
            )
            BEGIN
                DECLARE errno INT;
                DECLARE EXIT HANDLER FOR SQLEXCEPTION
                    BEGIN
                        ROLLBACK;
                    END;

                START TRANSACTION;

                DELETE FROM mapels WHERE mapel_id = mapel COLLATE utf8mb4_general_ci;
            
                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(admin, "update", "mapels", NOW());

                COMMIT;

            END
        ');

        DB::unprepared('
            CREATE PROCEDURE add_kelas(
                IN kelas CHAR(3),
                IN wali CHAR(18),
                IN urutan CHAR(1),
                IN kelompok CHAR(1),
                IN nama VARCHAR(255),
                admin CHAR(36)
            )
            BEGIN

                DECLARE errno INT;
                DECLARE EXIT HANDLER FOR SQLEXCEPTION
                    BEGIN
                        ROLLBACK;
                    END;

                START TRANSACTION;
            
                INSERT INTO kelas(kelas_id, wali_kelas, grade, kelompok_kelas, nama_kelas, created_at, updated_at)
                VALUES(kelas, wali, urutan, kelompok, nama, NOW(), NOW());
            
                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(admin, "insert", "kelas", NOW());
            
                UPDATE gurus SET is_wali_kelas = "iya" WHERE NIP = wali COLLATE utf8mb4_general_ci;
            
                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(admin, "update", "gurus", NOW());

                COMMIT;
            
            END
        ');

        DB::unprepared('
            CREATE PROCEDURE inactive_kelas(
                IN kelas CHAR(3),
                IN admin CHAR(36)
            )
            BEGIN
                DECLARE wali CHAR(18);
            
                SELECT wali_kelas INTO wali FROM kelas WHERE kelas_id = kelas COLLATE utf8mb4_general_ci ;
            
                UPDATE kelas SET wali_kelas = NULL, deleted_at = NOW() WHERE kelas_id = kelas COLLATE utf8mb4_general_ci;
            
                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(admin, "update", "kelas", NOW());
                
                UPDATE gurus SET is_wali_kelas = "tidak" WHERE NIP = wali COLLATE utf8mb4_general_ci;
            
                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(admin, "update", "gurus", NOW());
            
            END
        ');

        DB::unprepared('
            CREATE PROCEDURE delete_kelas(
                IN kelas CHAR(3),
                IN admin CHAR(36)
            )
            BEGIN
                DECLARE wali CHAR(18);
                DECLARE errno INT;
                DECLARE EXIT HANDLER FOR SQLEXCEPTION
                    BEGIN
                        ROLLBACK;
                    END;

                START TRANSACTION;
            
                SELECT wali_kelas INTO wali FROM kelas WHERE kelas_id = kelas COLLATE utf8mb4_general_ci ;
            
                UPDATE gurus SET is_wali_kelas = "tidak" WHERE NIP = wali COLLATE utf8mb4_general_ci;
            
                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(admin, "update", "gurus", NOW());
            
                DELETE FROM kelas WHERE kelas_id = kelas COLLATE utf8mb4_general_ci;
            
                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(admin, "delete", "kelas", NOW());

                COMMIT;
                
            END
        ');

        DB::unprepared('
        CREATE PROCEDURE add_siswa(
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
        
            DECLARE uuid CHAR(36);
            SET uuid = UUID();

            INSERT INTO users(uuid, username, password, role, created_at, updated_at) 
            VALUES (uuid, nis, pass, "siswa", NOW(), NOW());

            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(admin, "insert", "users", NOW());

            INSERT INTO user_profiles(user, nama, jenis_kelamin, created_at, updated_at)
            VALUES (uuid, nama, jk, NOW(), NOW());

            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(admin, "insert", "user_profiles", NOW());

            INSERT INTO siswas(nisn, kelas, user, nis, tanggal_masuk, kelas_awal, status, created_at, updated_at)
            VALUES(nisn, kelas_id, uuid, nis, tgl_masuk, kelas_id, "Aktif",  NOW(), NOW());

            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(admin, "insert", "siswas", NOW());

            INSERT INTO kontrak_semesters(siswa, grade, semester, tahun_ajaran, status, created_at, updated_at)
            VALUES(nisn, "7", "Ganjil", YEAR(NOW()), "On Going", NOW(), NOW());

            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(admin, "insert", "kontrak_semesters", NOW());
        
        END
        ');

        DB::unprepared('
            CREATE PROCEDURE inactive_siswa (
                IN uuid CHAR(36),
                IN status VARCHAR(10)
            )
            BEGIN
                UPDATE siswas SET status = status WHERE user = uuid;
                
                UPDATE users SET deleted_at = NOW() WHERE uuid = uuid; 
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
        DB::unprepared("DROP PROCEDURE add_admin");
        DB::unprepared("DROP PROCEDURE inactive_admin");
        DB::unprepared("DROP PROCEDURE add_guru");
        DB::unprepared("DROP PROCEDURE inactive_guru");
        DB::unprepared("DROP PROCEDURE add_mapel");
        DB::unprepared("DROP PROCEDURE inactive_mapel");
        DB::unprepared("DROP PROCEDURE delete_mapel");
        DB::unprepared("DROP PROCEDURE add_kelas");
        DB::unprepared("DROP PROCEDURE inactive_kelas");
        DB::unprepared("DROP PROCEDURE delete_kelas");
        DB::unprepared("DROP PROCEDURE inactive_siswa");
        DB::unprepared("DROP PROCEDURE add_siswa");
    }
};
