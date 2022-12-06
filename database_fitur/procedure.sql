/* Admin */
--Registrasi Admin
DELIMITER ?
CREATE PROCEDURE registrasi_admin(
    IN uname VARCHAR(255),
    IN pass VARCHAR(255)
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
    COMMIT;
END?
DELIMITER ;

--Non Aktifkan Admin Sementara
DELIMITER ?
CREATE PROCEDURE inactive_admin (
    IN uuid CHAR(36) COLLATE utf8mb4_general_ci
)
BEGIN
    DECLARE errno INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;
    START TRANSACTION;
    UPDATE users SET deleted_at = NOW() WHERE uuid = uuid; 
    COMMIT;
END?
DELIMITER;

/* Guru */
--Registrasi Guru
DELIMITER ?
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
    END?

    SET uuid = UUID();

    START TRANSACTION;
    INSERT INTO users(uuid, username, password, role, created_at, updated_at) 
    VALUES (uuid, nip, pass, "guru", NOW(), NOW());

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, 'insert', "users", NOW());

    INSERT INTO user_profiles(user, nama, jenis_kelamin, created_at, updated_at)
    VALUES (uuid, nama, jk, NOW(), NOW());

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, 'insert', "user_profiles", NOW());

    INSERT INTO gurus(nip, user, jabatan, tanggal_masuk, status, is_wali_kelas, created_at, updated_at)
    VALUES(nip, uuid, jabatan, tgl_masuk, 'aktif', 'tidak', NOW(), NOW());

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, 'insert', "gurus", NOW());
    COMMIT;

END?
DELIMITER ;

--Non Aktifkan Guru
DELIMITER ?
CREATE PROCEDURE inactive_guru (
    IN uuid CHAR(36) COLLATE utf8mb4_general_ci
)
BEGIN
    DECLARE errno INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;
    START TRANSACTION;
    UPDATE gurus SET status = "Inaktif" WHERE user = uuid;
    
    UPDATE users SET deleted_at = NOW() WHERE uuid = uuid; 
    COMMIT;
END?
DELIMITER;

/* Siswa */
--Registrasi Siswa
DELIMITER ?
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
    VALUES (uuid, nis, pass, "siswa", NOW(), NOW());

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, 'insert', "users", NOW());

     INSERT INTO user_profiles(user, nama, jenis_kelamin, created_at ,updated_at)
    VALUES (uuid, nama, jk, NOW(), NOW());

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, 'insert', "user_profiles", NOW());

    INSERT INTO siswas(nisn, kelas, user, nis, tanggal_masuk, kelas_awal, status, created_at, updated_at)
    VALUES(nisn, kelas_id, uuid, nis, tgl_masuk, kelas_id, 'aktif', uuid, NOW(), NOW());

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, 'insert', "siswas", NOW());

    COMMIT;

END?
DELIMITER ;

--Non Aktifkan Siswa
DELIMITER ?
CREATE PROCEDURE inactive_siswa (
    IN uuid CHAR(36) COLLATE utf8mb4_general_ci,
    IN status VARCHAR(10)
)
BEGIN
    DECLARE errno INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;
    START TRANSACTION;
    UPDATE siswas SET status = status WHERE user = uuid;
    
    UPDATE users SET deleted_at = NOW() WHERE uuid = uuid; 
    COMMIT;
END?
DELIMITER;

/* Input Nilai */
DELIMITER ?
CREATE PROCEDURE input_nilai(
    IN nilai_p FLOAT,
    IN nilai_k FLOAT,
    IN deskripsi_p TEXT,
    IN deskripsi_k TEXT,
    IN semester CHAR(1),
    IN kategori CHAR(2),
    IN siswa CHAR(10),
    IN mapel CHAR(3)
)
BEGIN

DECLARE timenow tinyint(1);
SET timenow = CURRENT_TIMESTAMP();

IF EXIST(SELECT * FROM sesi_penilaian WHERE waktu_mulai <= timenow AND waktu_akhir >= timenow AND kategori_nilai = kategori) THEN 
    INSERT INTO nilai(semester, tahun_pelajaran, nilai_pengetahuan, deskripsi_pengetahuan, nilai_keterampilan, deskripsi_keterampilan, kategori_nilai, siswa, mata_pelajaran)
    VALUES(semester, tahun_p, nilai_p, deskripsi_p, nilai_k, deskripsi_k, kategori, siswa, mapel);
ELSE
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "Sesi tidak ada";
END IF;

END?
DELIMITER ;
/* Input Nilai END */

--Prestasi Siswa Akademik--
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
