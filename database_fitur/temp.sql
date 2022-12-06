/*Admin*/
--Registrasi Admin
DELIMITER ?
CREATE PROCEDURE registrasi_admin(
    IN uname VARCHAR(255),
    IN pass VARCHAR(255)
)
BEGIN

    DECLARE uuid CHAR(36);
    SET uuid = UUID();
    INSERT INTO users(uuid, username, password, role, created_at, updated_at) 
    VALUES (uuid, uname, pass, "admin", NOW(), NOW());
END?
DELIMITER ;

--Non Aktifkan Admin
DELIMITER ?
CREATE PROCEDURE inactive_admin (
    IN uuid CHAR(36) COLLATE utf8mb4_general_ci
)
BEGIN
    UPDATE users SET deleted_at = NOW() WHERE uuid = uuid; 
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

    DECLARE uuid CHAR(36);
    SET uuid = UUID();

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

END?
DELIMITER ;

--Non Aktifkan Guru
DELIMITER ?
CREATE PROCEDURE inactive_guru (
    IN uuid CHAR(36) COLLATE utf8mb4_general_ci
)
BEGIN

    UPDATE gurus SET status = 'Inaktif' WHERE user = uuid;
    UPDATE users SET deleted_at = NOW() WHERE uuid = uuid; 
    
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

    DECLARE uuid CHAR(36);
    SET uuid = UUID();

    INSERT INTO users(uuid, username, password, role, created_at, updated_at) 
    VALUES (uuid, nis, pass, "siswa", NOW(), NOW());

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "insert", "users", NOW());

     INSERT INTO user_profiles(user, nama, jenis_kelamin, created_at ,updated_at)
    VALUES (uuid, nama, jk, NOW(), NOW());

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "insert", "user_profiles", NOW());

    INSERT INTO siswas(nisn, kelas, user, nis, tanggal_masuk, kelas_awal, status, created_at, updated_at)
    VALUES(nisn, kelas_id, uuid, nis, tgl_masuk, kelas_id, "aktif", uuid, NOW(), NOW());

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "insert", "siswas", NOW());

END?
DELIMITER ;

--Non Aktifkan Siswa
DELIMITER ?
CREATE PROCEDURE inactive_siswa (
    IN uuid CHAR(36) COLLATE utf8mb4_general_ci,
    IN status VARCHAR(10)
)
BEGIN
    UPDATE siswas SET status = status WHERE user = uuid;
    
    UPDATE users SET deleted_at = NOW() WHERE uuid = uuid; 
END?
DELIMITER;