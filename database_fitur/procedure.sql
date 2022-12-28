/* Admin */

--Update User (✅)
DELIMITER ?
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
END?
DELIMITER ;

--Add Role (✅)
DELIMITER ?
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
END?
DELIMITER ;

--Update Role (❌)
DELIMITER ?
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
END?
DELIMITER ;

--Delete Role (❌)
DELIMITER ?
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
END?
DELIMITER ;

--Add Permission (❌)
DELIMITER ?
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
END?
DELIMITER ;

--Delete Permission (❌)
DELIMITER ?
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
END?
DELIMITER ;

--Add Admin (✅)
DELIMITER ?
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
END?
DELIMITER ;

--Update Admin (✅)
DELIMITER ?
CREATE PROCEDURE update_admin (
    IN admin CHAR(36),
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
    VALUES(admin, "update", "users", NOW());
    COMMIT;

END?
DELIMITER;

--Non Aktifkan Admin Sementara (✅)
DELIMITER ?
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
    END?
DELIMITER;

--Restore Admin (✅)
DELIMITER ?
CREATE PROCEDURE restore_admin(
    IN admin CHAR(36)
)
BEGIN
    UPDATE users SET deleted_at = NULL WHERE uuid = admin COLLATE utf8mb4_general_ci;
END?
DELIMITER;

--Delete Admin (✅)
DELIMITER ?
CREATE PROCEDURE delete_admin (
    IN admin CHAR(36),
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
    VALUES(admin, "delete", "users", NOW());
    COMMIT;
END?
DELIMITER;


/* Guru */
--Add Guru (✅)
DELIMITER ?
CREATE PROCEDURE add_guru(
    IN nama VARCHAR(255),
    IN NUPTK CHAR(18),
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
    INSERT INTO users(uuid, username, password, created_at, updated_at) 
    VALUES (uuid, NUPTK, pass, NOW(), NOW());

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "insert", "users", NOW());

    INSERT INTO user_profiles(user, nama, jenis_kelamin, created_at, updated_at)
    VALUES (uuid, nama, jk, NOW(), NOW());

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "insert", "user_profiles", NOW());

    INSERT INTO gurus(NUPTK, user, jabatan, tanggal_masuk, status, created_at, updated_at)
    VALUES(NUPTK, uuid, "guru", tgl_masuk, "aktif", NOW(), NOW());

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "insert", "gurus", NOW());

    INSERT INTO model_has_roles(role_id, model_type, model_id)
    VALUES ("4", "App\Models\User", uuid);

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "insert", "model_has_roles", NOW());
    COMMIT;
END?
DELIMITER ;

--Update Guru Admin(✅)
DELIMITER ?
CREATE PROCEDURE update_guru(
    IN oldnip CHAR(18),
    IN newnip CHAR(18),
    IN jabatan CHAR(4),
    IN admin CHAR(36)
)
BEGIN
    DECLARE guru CHAR(36);
    DECLARE errno INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;
    SELECT user INTO guru FROM gurus WHERE nip = oldnip COLLATE utf8mb4_general_ci;
        
    UPDATE gurus SET NIP = newnip, jabatan = jabatan WHERE NIP = oldnip COLLATE utf8mb4_general_ci;
        
    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "update", "gurus", NOW());
        
    UPDATE users SET username = newnip WHERE uuid = guru COLLATE utf8mb4_general_ci;

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "update", "gurus", NOW());
END?
DELIMITER ;

--Non Aktifkan Guru (✅)
DELIMITER ?
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
END?
DELIMITER;

--Restore Guru(✅)
DELIMITER ?
CREATE PROCEDURE restore_guru (
    IN guru CHAR(36),
    IN admin CHAR(36)
)
    BEGIN
        DECLARE errno INT;
        DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
        END;
        UPDATE gurus SET status = "Aktif", updated_at = NOW()  WHERE user = guru COLLATE utf8mb4_general_ci;

        INSERT INTO log_activities(actor, action, at, created_at)
        VALUES(admin, "update", "gurus", NOW());
        
        UPDATE users SET deleted_at = NULL WHERE uuid = guru COLLATE utf8mb4_general_ci; 
    END?
DELIMITER;

--Delete Guru(✅)
DELIMITER ?
CREATE PROCEDURE delete_guru (
    IN guru CHAR(36),
    IN admin CHAR(36)
)
    BEGIN
        DECLARE nip CHAR(18);
        DECLARE errno INT;
        DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
        END;
        SELECT NIP INTO nip FROM gurus WHERE user = guru COLLATE utf8mb4_general_ci;

        START TRANSACTION;

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
        COMMIT;
    END?
DELIMITER;

/* Mapel */
--Insert Mapel (✅)
DELIMITER ?
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
    COMMIT

END?
DELIMITER ;

--Nonaktifkan Mapel (✅)
DELIMITER ?
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
    
END?
DELIMITER ;

--Hapus Mapel (✅)
DELIMITER ?
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

END?
DELIMITER ;

/* Kelas */
--Insert Kelas (✅)
DELIMITER ?
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
END?
DELIMITER ;

--Update Kelas (✅)
DELIMITER ?
CREATE PROCEDURE update_kelas(
    IN old_kelas CHAR(3),
    IN new_kelas CHAR(3),
    IN wali CHAR(18),
    IN nama VARCHAR(255),
    admin CHAR(36)
)
BEGIN

    DECLARE old_wali CHAR(18);
    DECLARE errno INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
        END;

    SELECT wali_kelas INTO old_wali FROM kelas WHERE kelas_id = old_kelas COLLATE utf8mb4_general_ci;
    START TRANSACTION;

    IF EXISTs( SELECT * FROM gurus WHERE NIP = old_wali  COLLATE utf8mb4_general_ci) THEN
        UPDATE gurus SET is_wali_kelas = "Tidak" WHERE NIP = old_wali COLLATE utf8mb4_general_ci;
        INSERT INTO log_activities(actor, action, at, created_at)
        VALUES(admin, "update", "gurus", NOW());
    END IF;

    UPDATE kelas SET kelas_id = new_kelas, wali_kelas = wali, nama_kelas = nama WHERE kelas_id = old_kelas COLLATE utf8mb4_general_ci;

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "update", "kelas", NOW());


    UPDATE gurus SET is_wali_kelas = "Iya" WHERE NIP = wali COLLATE utf8mb4_general_ci;

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "update", "gurus", NOW());

    COMMIT;

END?
DELIMITER ;

--Nonaktifkan Kelas (✅)
DELIMITER ?
CREATE PROCEDURE inacitve_kelas(
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

    SELECT wali_kelas INTO wali FROM kelas WHERE kelas_id = kelas COLLATE utf8mb4_general_ci ;
    START TRANSACTION;

    UPDATE kelas SET wali_kelas = NULL, deleted_at = NOW() WHERE kelas_id = kelas COLLATE utf8mb4_general_ci;

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "update", "kelas", NOW());
    
    UPDATE gurus SET is_wali_kelas = "tidak" WHERE NIP = wali COLLATE utf8mb4_general_ci;

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "update", "gurus", NOW());
    COMMIT;

END?
DELIMITER ;

--Restore Kelas(✅)
DELIMITER ?
CREATE PROCEDURE restore_kelas(
    IN kelas CHAR(3),
    IN wali CHAR(18),
    IN admin CHAR(36)
)
BEGIN
    DECLARE errno INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
        END;
    START TRANSACTION;

    UPDATE kelas SET deleted_at = NULL, wali_kelas = wali WHERE kelas = kelas COLLATE utf8mb4_general_ci;

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "update", "kelas", NOW());

    UPDATE gurus SET is_wali_kelas = "iya" WHERE NIP = wali COLLATE utf8mb4_general_ci;

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "update", "gurus", NOW());
    COMMIT;
    
END?
DELIMITER ;

--Delete Kelas Permanen (✅)
DELIMITER ?
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
    
END?
DELIMITER ;


/* Siswa */
--Registrasi Siswa (✅)
DELIMITER ?
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
    VALUES(nisn, kelas_id, uuid, nis, tgl_masuk, kelas_id, 'Aktif',  NOW(), NOW());

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "insert", "siswas", NOW());

    INSERT INTO kontrak_semesters(siswa, grade, semester, tahun_ajaran, status, created_at, updated_at)
    VALUES(nisn, "7", "Ganjil", YEAR(NOW()), "On Going", NOW(), NOW());

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "insert", "kontrak_semesters", NOW());

END?
DELIMITER ;

--Update Siswa
DELIMITER ?
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
END?
DELIMITER ;

--Non Aktifkan Siswa (❌)
DELIMITER ?
CREATE PROCEDURE inactive_siswa (
    IN uuid CHAR(36),
    IN status VARCHAR(10)
)
BEGIN

    DECLARE siswa CHAR(10);

    SELECT NISN INTO siswa FROM siswas WHERE user = uuid COLLATE utf8mb4_general_ci;

    UPDATE siswas SET status = status WHERE user = uuid COLLATE utf8mb4_general_ci;

    UPDATE kontrak_semesters SET status = 'selesai' WHERE siswa = siswa;
    
    UPDATE users SET deleted_at = NOW() WHERE uuid = uuid COLLATE utf8mb4_general_ci;


END?
DELIMITER;

-- Delete siswa permanen
DELIMITER ?
CREATE PROCEDURE delete_siswa(
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
END?
DELIMITER ;

/* Sesi Penilaian */
--add sesi (✅)
DELIMITER ?
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

END?
DELIMITER ;

/* Nilai */
--Input Nilai(✅)
DELIMITER ?
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
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT ="Sesi tidak tersedia";
END IF;

END?
DELIMITER ;
/* Input Nilai END */

--Prestasi Siswa Akademik--
--Add Prestasi (✅)
DELIMITER ?
CREATE PROCEDURE add_prestasi(
IN nisn CHAR(10),
IN jenis VARCHAR(12),
IN ket TEXT,
IN tgl DATE,
IN admin CHAR(36)
)
BEGIN
    DECLARE errno INT;
    DECLARE uuid CHAR(36);
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
END?
DELIMITER ;

--Update Prestasi(✅)
DELIMITER ?
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
END?
DELIMITER ;

--Delete Prestasi (✅)
DELIMITER ?
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
END?
DELIMITER ;

/* Prosedur mencari prestasi siswa tertentu secara nonAkademik */
DELIMITER ?
CREATE PROCEDURE prestasi_akademik(
IN NIS CHAR(10)
)
BEGIN
SELECT * FROM prestasi WHERE siswa = NIS AND jenis_prestasi = "akademik";
END?
DELIMITER ;

--Prestasi Siswa nonAkademik--
/* Prosedur mencari prestasi siswa tertentu secara akademik */
DELIMITER ?
CREATE PROCEDURE prestasi_nonAkademik(
IN NIS CHAR(10)
)
BEGIN
SELECT * FROM prestasi WHERE siswa = NIS AND jenis_prestasi = "nonAkademik";
END?
DELIMITER ;

--Roster
--Add Roster
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

--Update Roster
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
    UPDATE roster_kelas SET waktu_mulai = waktu_mulai, durasi = durasi, hari = hari WHERE roster_id = roster COLLATE utf8mb4_general_ci;

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "update", "roster_kelas", NOW());

    COMMIT;
    
END

--Delete Roster
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
