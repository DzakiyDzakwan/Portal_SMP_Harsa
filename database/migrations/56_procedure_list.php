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
        CREATE PROCEDURE update_user (
            IN actor CHAR(36),
            IN user CHAR(36),
            IN pass VARCHAR(255)
        )
        BEGIN
        
            DECLARE errno INT;
            DECLARE EXIT HANDLER FOR SQLEXCEPTION
            BEGIN
                ROLLBACK;
            END;
            START TRANSACTION;
            
            UPDATE users SET password = pass WHERE uuid = user COLLATE utf8mb4_general_ci; 
        
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(actor, "update", "users", NOW());
            COMMIT;
        END
        ');

        DB::unprepared('
        CREATE PROCEDURE add_role(
            IN nama VARCHAR(255),
            IN user CHAR(36)
        )
        BEGIN
        
            DECLARE errno INT;
            DECLARE EXIT HANDLER FOR SQLEXCEPTION
            BEGIN
                ROLLBACK;
            END;
        
            START TRANSACTION;
            INSERT INTO roles(name, guard_name, created_at, updated_at) 
            VALUES (nama, "web", NOW(), NOW());
        
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(user, "insert", "roles", NOW());
            
            COMMIT;
        END
        ');

        DB::unprepared('
        CREATE PROCEDURE update_role(
            IN role INT,
            IN nama VARCHAR(255),
            IN user CHAR(36)
        )
        BEGIN
        
            DECLARE errno INT;
            DECLARE EXIT HANDLER FOR SQLEXCEPTION
            BEGIN
                ROLLBACK;
            END;
        
            START TRANSACTION;
            UPDATE roles SET name = nama WHERE id = role;
        
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(user, "insert", "users", NOW());
            
            COMMIT;
        END
        ');

        DB::unprepared('
        CREATE PROCEDURE delete_role(
            IN role INT,
            IN user CHAR(36)
        )
        BEGIN
        
            DECLARE errno INT;
            DECLARE EXIT HANDLER FOR SQLEXCEPTION
            BEGIN
                ROLLBACK;
            END;
        
            START TRANSACTION;
            DELETE FROM roles WHERE id = role;
        
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(user, "delete", "roles", NOW());
            
            COMMIT;
        END
        ');

        DB::unprepared('
        CREATE PROCEDURE add_permission(
            IN nama VARCHAR(255),
            IN user CHAR(36)
        )
        BEGIN
        
            DECLARE errno INT;
            DECLARE EXIT HANDLER FOR SQLEXCEPTION
            BEGIN
                ROLLBACK;
            END;
        
            START TRANSACTION;
            INSERT INTO permissions(name, guard_name, created_at, updated_at) 
            VALUES (nama, "web", NOW(), NOW());
        
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(user, "insert", "permissions", NOW());
            
            COMMIT;
        END
        ');

        DB::unprepared('
        CREATE PROCEDURE delete_permission(
            IN permission INT,
            IN user CHAR(36)
        )
        BEGIN
        
            DECLARE errno INT;
            DECLARE EXIT HANDLER FOR SQLEXCEPTION
            BEGIN
                ROLLBACK;
            END;
        
            START TRANSACTION;
            DELETE FROM permissions WHERE id = permission;
        
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(user, "delete", "permissions", NOW());
            
            COMMIT;
        END
        ');

        DB::unprepared('
            CREATE PROCEDURE add_admin(
                IN uname VARCHAR(255),
                IN pass VARCHAR(255),
                IN actor CHAR(36)
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
                INSERT INTO users(uuid, username, password, created_at, updated_at) 
                VALUES (uuid, uname, pass, NOW(), NOW());

                INSERT INTO model_has_roles(role_id, model_type, model_id)
                VALUES ("3", "App\Models\User", uuid);

                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(actor, "insert", "users", NOW());
                
                COMMIT;
            END
        ');

        DB::unprepared('
        CREATE PROCEDURE update_admin (
            IN actor CHAR(36),
            IN user CHAR(36),
            IN username VARCHAR(255),
            IN pass VARCHAR(255)
        )
        BEGIN
        
            DECLARE errno INT;
            DECLARE EXIT HANDLER FOR SQLEXCEPTION
            BEGIN
                ROLLBACK;
            END;
            START TRANSACTION;
            
            UPDATE users SET username = username, password = pass WHERE uuid = user COLLATE utf8mb4_general_ci; 
        
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(actor, "update", "users", NOW());
            COMMIT;
        END
        ');

        DB::unprepared('
        CREATE PROCEDURE delete_admin (
            IN actor CHAR(36),
            IN user CHAR(36)
        )
        BEGIN
            DECLARE errno INT;
            DECLARE EXIT HANDLER FOR SQLEXCEPTION
            BEGIN
                ROLLBACK;
            END;
            START TRANSACTION;

            DELETE FROM users WHERE uuid = user COLLATE utf8mb4_general_ci;

            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(actor, "delete", "users", NOW());

            COMMIT;
        END
        ');

        /*

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
        CREATE PROCEDURE restore_admin(
            IN admin CHAR(36)
        )
        BEGIN
            UPDATE users SET deleted_at = NULL WHERE uuid = admin COLLATE utf8mb4_general_ci;
        END
        ');
        */
        DB::unprepared('
        CREATE PROCEDURE add_guru(
            IN nama VARCHAR(255),
            IN NUPTK CHAR(18),
            IN pass VARCHAR(255),
            IN tgl_masuk DATE,
            IN jk CHAR(2),
            IN actor CHAR(36)
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
            INSERT INTO users(uuid, username, password, created_at, updated_at) 
            VALUES (uuid, NUPTK, pass, NOW(), NOW());
        
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(actor, "insert", "users", NOW());
        
            INSERT INTO user_profiles(user, nama, jenis_kelamin, created_at, updated_at)
            VALUES (uuid, nama, jk, NOW(), NOW());
        
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(actor, "insert", "user_profiles", NOW());
        
            INSERT INTO gurus(NUPTK, user, jabatan, tanggal_masuk, status, created_at, updated_at)
            VALUES(NUPTK, uuid, "guru", tgl_masuk, "aktif", NOW(), NOW());
        
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(actor, "insert", "gurus", NOW());

            INSERT INTO model_has_roles(role_id, model_type, model_id)
            VALUES ("4", "App\Models\User", uuid);

            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(actor, "insert", "model_has_roles", NOW());
            COMMIT;
        
        END
        ');
        /*
        DB::unprepared('
        CREATE PROCEDURE update_guru(
            IN nuptk CHAR(18),
            IN jabatan CHAR(4),
            IN guru CHAR(36),
            IN actor CHAR(36)
        )
        BEGIN
            DECLARE errno INT;
            DECLARE EXIT HANDLER FOR SQLEXCEPTION
            BEGIN
                ROLLBACK;
            END;
            START TRANSACTION;
            
            UPDATE users SET username = nuptk WHERE uuid = guru COLLATE utf8mb4_general_ci; 
        
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(actor, "update", "users", NOW());

            UPDATE gurus SET NUPTK = nuptk WHERE user = guru COLLATE utf8mb4_general_ci; 
        
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(actor, "update", "gurus", NOW());

            COMMIT;
        END
        '); */


        DB::unprepared('
        CREATE PROCEDURE inactive_guru (
            IN guru CHAR(36),
            IN actor CHAR(36)
        )
           BEGIN
                DECLARE errno INT;
                DECLARE EXIT HANDLER FOR SQLEXCEPTION
                BEGIN
                    ROLLBACK;
                END;
                START TRANSACTION;
                UPDATE gurus SET status = "inaktif", updated_at = NOW()  WHERE user = guru COLLATE utf8mb4_general_ci;
        
                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(actor, "update", "gurus", NOW());
                
                UPDATE users SET deleted_at = NOW() WHERE uuid = guru COLLATE utf8mb4_general_ci; 
                
                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(actor, "update", "users", NOW());
                COMMIT;
            END
        ');

        /*
        DB::unprepared('
        CREATE PROCEDURE restore_guru (
            IN guru CHAR(36),
            IN admin CHAR(36)
        )
            BEGIN
                UPDATE gurus SET status = "Aktif", updated_at = NOW()  WHERE user = guru COLLATE utf8mb4_general_ci;
        
                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(admin, "update", "gurus", NOW());
                
                UPDATE users SET deleted_at = NULL WHERE uuid = guru COLLATE utf8mb4_general_ci; 
            END
        ');

        DB::unprepared('
        CREATE PROCEDURE delete_guru (
            IN guru CHAR(36),
            IN admin CHAR(36)
        )
                BEGIN
                DECLARE nip CHAR(18);
                SELECT NIP INTO nip FROM gurus WHERE user = guru COLLATE utf8mb4_general_ci;

                IF EXISTS(SELECT * FROM kelas WHERE wali_kelas = nip COLLATE utf8mb4_general_ci) THEN
                    UPDATE kelas SET wali_kelas = NULL WHERE wali_kelas = nip COLLATE utf8mb4_general_ci;
                END IF;
                DELETE FROM gurus WHERE user = guru COLLATE utf8mb4_general_ci;
        
                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(admin, "delete", "gurus", NOW());
        
                DELETE FROM user_profiles WHERE user = guru COLLATE utf8mb4_general_ci;
        
                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(admin, "delete", "user_profiles", NOW());
                
                DELETE FROM users WHERE uuid = guru COLLATE utf8mb4_general_ci; 
        
                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(admin, "delete", "users", NOW());
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
        CREATE PROCEDURE inactive_mapel_guru(
            IN mapelguru CHAR(3),
            IN admin CHAR(36)
        )
        BEGIN

            DECLARE errno INT;
            DECLARE EXIT HANDLER FOR SQLEXCEPTION
                BEGIN
                    ROLLBACK;
                END;
            START TRANSACTION;
            UPDATE mapel_gurus SET deleted_at = NOW() WHERE mapel_guru_id = mapelguru COLLATE utf8mb4_general_ci;
        
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(admin, "update", "mapels", NOW());
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
        */
        DB::unprepared('
            CREATE PROCEDURE add_kelas(
                IN kelas CHAR(3),
                IN wali CHAR(18),
                IN urutan CHAR(1),
                IN kelompok CHAR(1),
                IN nama VARCHAR(255),
                actor CHAR(36)
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
                VALUES(actor, "insert", "kelas", NOW());

                COMMIT;
            
            END
        ');
        /*
        DB::unprepared('
        CREATE PROCEDURE update_kelas(
            IN old_kelas CHAR(3),
            IN new_kelas CHAR(3),
            IN old_wali CHAR(3),
            IN wali CHAR(18),
            IN nama VARCHAR(255),
            admin CHAR(36)
        )
        BEGIN
        
            UPDATE kelas SET kelas_id = new_kelas, wali_kelas = wali, nama_kelas = nama WHERE kelas_id = old_kelas COLLATE utf8mb4_general_ci;
        
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(admin, "update", "kelas", NOW());
        
            UPDATE guru SET is_wali_kelas = "Tidak" WHERE NIP = old_wali COLLATE utf8mb4_general_ci;
        
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(admin, "update", "gurus", NOW());
        
            UPDATE guru SET is_wali_kelas = "Iya" WHERE NIP = wali COLLATE utf8mb4_general_ci;
        
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(admin, "update", "gurus", NOW());
        
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
        CREATE PROCEDURE restore_kelas(
            IN kelas CHAR(3),
            IN wali CHAR(18),
            IN admin CHAR(36)
        )
        BEGIN
        
            UPDATE kelas SET deleted_at = NULL, wali_kelas = wali WHERE kelas COLLATE utf8mb4_general_ci;
        
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(admin, "update", "kelas", NOW());
            
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
        CREATE PROCEDURE update_siswa(
            IN oldnis CHAR(4),
            IN newnis CHAR(4),
            IN nama VARCHAR(255),
            IN admin CHAR(36)
        )
        BEGIN
            DECLARE siswa CHAR(36);
            DECLARE errno INT;
            DECLARE EXIT HANDLER FOR SQLEXCEPTION
            BEGIN
                ROLLBACK;
            END;
            SELECT user INTO siswa FROM siswas WHERE NIS = oldnis COLLATE utf8mb4_general_ci;
                
            UPDATE siswas SET NIS = newnis WHERE NIS = oldnis COLLATE utf8mb4_general_ci;
                
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(admin, "update", "siswas", NOW());

            UPDATE user_profiles SET nama = nama WHERE user = siswa COLLATE utf8mb4_general_ci;
                
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(admin, "update", "user_profiles", NOW());
            
            UPDATE users SET username = newnis WHERE uuid = siswa COLLATE utf8mb4_general_ci;
            
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(admin, "update", "users", NOW());
        END
        ');

        DB::unprepared('
            CREATE PROCEDURE inactive_siswa (
                IN siswa CHAR(36),
                IN status VARCHAR(10),
                IN admin CHAR(36)
            )
            BEGIN
                DECLARE errno INT;
                DECLARE EXIT HANDLER FOR SQLEXCEPTION
                    BEGIN
                        ROLLBACK;
                    END;
                START TRANSACTION;
                UPDATE siswas SET status = status, updated_at = NOW() WHERE user = siswa COLLATE utf8mb4_general_ci;
            
                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(admin, "update", "siswas", NOW());
                
                UPDATE users SET deleted_at = NOW() WHERE uuid = siswa COLLATE utf8mb4_general_ci; 
                COMMIT;
            END
        ');

        DB::unprepared('
            CREATE PROCEDURE delete_siswa (
                IN siswa CHAR(10),
                IN admin CHAR(36)
            )
            BEGIN
                DECLARE errno INT;
                DECLARE EXIT HANDLER FOR SQLEXCEPTION
                    BEGIN
                        ROLLBACK;
                    END;
                START TRANSACTION;

                DELETE FROM kontrak_semesters WHERE kontrak_semesters.siswa = siswa COLLATE utf8mb4_general_ci;
                
                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(admin, "delete", "kontrak_semesters", NOW());
                
                DELETE FROM siswas WHERE NISN = siswa COLLATE utf8mb4_general_ci;
                
                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(admin, "delete", "siswas", NOW());

                COMMIT;
            END
        ');

        DB::unprepared('
        CREATE PROCEDURE add_prestasi(
            IN nisn CHAR(10),
            IN jenis VARCHAR(12),
            IN ket TEXT,
            IN tgl DATE,
            IN admin CHAR(36)
            )
            BEGIN
                DECLARE errno INT;
                DECLARE EXIT HANDLER FOR SQLEXCEPTION
                BEGIN
                    ROLLBACK;
                END;
            
                START TRANSACTION;
                INSERT INTO prestasis(siswa, jenis_prestasi, keterangan, tanggal_prestasi)
                VALUES(nisn, jenis, ket, tgl);
            
                 INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(admin, "insert", "prestasis", NOW());
                COMMIT;
            END
        ');

        DB::unprepared('
        CREATE PROCEDURE update_prestasi(
            IN prestasi INT,
            IN jenis VARCHAR(12),
            IN ket TEXT,
            IN tgl DATE,
            IN admin CHAR(36)
        )
        BEGIN
            DECLARE errno INT;
            DECLARE EXIT HANDLER FOR SQLEXCEPTION
            BEGIN
                ROLLBACK;
            END;
        
            START TRANSACTION;
            UPDATE prestasis SET jenis_prestasi = jenis, keterangan = ket, tanggal_prestasi = tgl WHERE prestasi_id = prestasi;
        
            INSERT INTO log_activities(actor, action, at, created_at)
            VALUES(admin, "update", "prestasis", NOW());
        
            COMMIT;
        END
        ');

        DB::unprepared('
        CREATE PROCEDURE delete_prestasi(
            IN prestasi INT,
            IN admin CHAR(36)
            )
            BEGIN
                DECLARE errno INT;
                DECLARE EXIT HANDLER FOR SQLEXCEPTION
                BEGIN
                    ROLLBACK;
                END;
            
                START TRANSACTION;
                DELETE FROM prestasis WHERE prestasi_id = prestasi;
            
                 INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(admin, "delete", "prestasis", NOW());
                
                COMMIT;
            END
        ');

        DB::unprepared('
        CREATE PROCEDURE add_sesi(
            IN sesi VARCHAR(3),
            IN ta YEAR,
            IN start DATETIME,
            IN end DATETIME,
            IN admin CHAR(36)
        )
        BEGIN
            
            DECLARE uname VARCHAR(255);
            
            SELECT username INTO uname FROM users WHERE uuid = admin COLLATE utf8mb4_general_ci;
            
            INSERT INTO sesi_penilaians(nama_sesi, tahun_ajaran, tanggal_mulai, tanggal_berakhir, created_by)
            VALUES(sesi, ta, start, end, uname);
        
        END
        ');

        DB::unprepared('
            CREATE PROCEDURE add_nilai(
                IN sesi INT,
                IN jenis CHAR(5),
                IN mapel CHAR(3),
                IN guru CHAR(18),
                IN kontrak INT,
                IN kkm INT,
                IN nilai_p FLOAT,
                IN deskripsi_p TEXT,
                IN nilai_k FLOAT,
                IN deskripsi_k TEXT,
                IN user CHAR(36)
            )
            BEGIN
            
            DECLARE start DATETIME;
            DECLARE end DATETIME;
            
            SELECT tanggal_mulai INTO start FROM sesi_penilaians WHERE sesi_id = sesi;
            SELECT tanggal_berakhir INTO end FROM sesi_penilaians WHERE sesi_id = sesi;
            
            IF cek_sesi(start, end) = 1 THEN
                INSERT INTO nilais(sesi, mapel, guru, kontrak_siswa, jenis, kkm, nilai_pengetahuan, deskripsi_pengetahuan, nilai_keterampilan, deskripsi_keterampilan, status, created_at, updated_at)
                VALUES(sesi, mapel, guru, kontrak, jenis, kkm, nilai_p, deskripsi_p, nilai_k, deskripsi_k, "pending", NOW(), NOW());
            
                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(user, "insert", "prestasis", NOW());
                COMMIT;
            ELSE
            SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT ="Sesi tidak tersedia";
            END IF;
            
            END
        ');

        DB::unprepared('
        CREATE PROCEDURE add_ekstrakurikuler(
            IN admin CHAR(36),
            IN ekstrakurikuler CHAR(5),
            IN nama VARCHAR(30),
            IN hari CHAR(6),
            IN waktu_mulai TIME,
            IN durasi INT,
            IN tempat VARCHAR(100),
            IN kelas CHAR(1)
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
                INSERT INTO ekstrakurikulers(ekstrakurikuler_id, nama, hari, waktu_mulai, durasi, tempat, kelas,  created_at, updated_at) 
                VALUES (ekstrakurikuler, nama, hari, waktu_mulai, durasi, tempat, kelas, NOW(), NOW());

                INSERT INTO log_activities(actor, action, at, created_at)
                VALUES(admin, "insert", "ekstrakurikulers", NOW());
                
                COMMIT;
            END
        ');

        DB::unprepared('
CREATE PROCEDURE update_ekstrakurikuler(
    IN admin CHAR(36),
    IN ekstrakurikuler CHAR(5),
    IN nama VARCHAR(30),
    IN hari CHAR(6),
    IN waktu_mulai TIME,
    IN durasi INT,
    IN tempat VARCHAR(100),
    IN kelas CHAR(1)
    )
    BEGIN
        DECLARE errno INT;
        DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
        END;

        START TRANSACTION;
        UPDATE ekstrakurikulers SET nama = nama, hari = hari, waktu_mulai = waktu_mulai, durasi = durasi, tempat = tempat, kelas = kelas WHERE ekstrakurikuler_id = ekstrakurikuler COLLATE utf8mb4_general_ci;

        INSERT INTO log_activities(actor, action, at, created_at)
        VALUES(admin, "update", "ekstrakurikulers", NOW());

        COMMIT;
                
            END
        ');
        
        DB::unprepared('
CREATE PROCEDURE delete_ekstrakurikuler(
    IN admin CHAR(36),
    IN ekstrakurikuler CHAR(5)
    )
    BEGIN
    
        DECLARE errno INT;
        DECLARE admin CHAR(36);
        DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
        END;
    
        SET admin = UUID();
    
        START TRANSACTION;
        DELETE FROM ekstrakurikulers WHERE ekstrakurikuler_id = ekstrakurikuler COLLATE utf8mb4_general_ci;

        INSERT INTO log_activities(actor, action, at, created_at)
        VALUES(admin, "delete", "ekstrakurikulers", NOW());
        
        COMMIT;

            END
        ');

        DB::unprepared('
CREATE PROCEDURE add_roster(
    IN mapel INT,
    IN kelas CHAR(3),
    IN waktu_mulai TIME,
    IN durasi INT,
    IN hari CHAR(6),
    IN admin CHAR(36)
)
BEGIN
    DECLARE errno INT;
    DECLARE admin CHAR(36);
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;

    SET admin = UUID();

    START TRANSACTION;

    INSERT INTO roster_kelas(mapel, kelas, waktu_mulai, durasi, hari, created_at, updated_at) 
    VALUES (mapel, kelas, waktu_mulai, durasi, hari, NOW(), NOW());

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "insert", "roster_kelas", NOW());
    
    COMMIT;
        END
        ');

        DB::unprepared('
CREATE PROCEDURE update_roster(
    IN roster INT,
    IN waktu_mulai TIME,
    IN durasi INT,
    IN hari CHAR(6),
    IN admin CHAR(36)
)
BEGIN
    DECLARE errno INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;

    START TRANSACTION;
    UPDATE roster_kelas SET waktu_mulai = waktu_mulai, durasi = durasi, hari = hari WHERE roster_id = roster;

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "update", "roster_kelas", NOW());

    COMMIT;
            
        END
        ');

        DB::unprepared('
CREATE PROCEDURE delete_roster(
    IN roster INT,
    IN admin CHAR(36)
)
BEGIN
    DECLARE errno INT;
    DECLARE admin CHAR(36);
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;

    SET admin = UUID();

    START TRANSACTION;
    DELETE FROM roster_kelas WHERE roster_id = roster;

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "delete", "roster_kelas", NOW());
    
    COMMIT;

        END
        '); */
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP PROCEDURE update_user");
        DB::unprepared("DROP PROCEDURE add_role");
        DB::unprepared("DROP PROCEDURE update_role");
        DB::unprepared("DROP PROCEDURE delete_role");
        DB::unprepared("DROP PROCEDURE add_permission");
        DB::unprepared("DROP PROCEDURE delete_permission");
        DB::unprepared("DROP PROCEDURE add_admin");
        DB::unprepared("DROP PROCEDURE update_admin");
        DB::unprepared("DROP PROCEDURE delete_admin");
        // DB::unprepared("DROP PROCEDURE inactive_admin");
        // DB::unprepared("DROP PROCEDURE restore_admin");
        // DB::unprepared("DROP PROCEDURE add_guru");
        // DB::unprepared("DROP PROCEDURE update_guru");
        // DB::unprepared("DROP PROCEDURE inactive_guru");
        // DB::unprepared("DROP PROCEDURE restore_guru");
        // DB::unprepared("DROP PROCEDURE delete_guru");
        // DB::unprepared("DROP PROCEDURE add_mapel");
        // DB::unprepared("DROP PROCEDURE inactive_mapel");
        // DB::unprepared("DROP PROCEDURE delete_mapel");
        // DB::unprepared("DROP PROCEDURE add_kelas");
        // DB::unprepared("DROP PROCEDURE update_kelas");
        // DB::unprepared("DROP PROCEDURE restore_kelas");
        // DB::unprepared("DROP PROCEDURE inactive_kelas");
        // DB::unprepared("DROP PROCEDURE delete_kelas");
        // DB::unprepared("DROP PROCEDURE inactive_siswa");
        // DB::unprepared("DROP PROCEDURE add_siswa");
        // DB::unprepared("DROP PROCEDURE update_siswa");
        // DB::unprepared("DROP PROCEDURE delete_siswa");
        // DB::unprepared("DROP PROCEDURE add_prestasi");
        // DB::unprepared("DROP PROCEDURE delete_prestasi");
        // DB::unprepared("DROP PROCEDURE update_prestasi");
        // DB::unprepared("DROP PROCEDURE add_nilai");
        // DB::unprepared("DROP PROCEDURE add_sesi");
        // DB::unprepared("DROP PROCEDURE add_ekstrakurikuler");
        // DB::unprepared("DROP PROCEDURE update_ekstrakurikuler");
        // DB::unprepared("DROP PROCEDURE delete_ekstrakurikuler");
        // DB::unprepared("DROP PROCEDURE add_roster");
        // DB::unprepared("DROP PROCEDURE update_roster");
        // DB::unprepared("DROP PROCEDURE delete_roster");
    }
};
