/* Manajemen User */
--Update User (✅)(📄)
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

--Add Role (✅)(📄)
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

--Update Role (✅)(📄)
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

--Delete Role (✅)(📄)
DELIMITER ?
CREATE PROCEDURE delete_role(
    IN role_id INT,
    IN user CHAR(36)
)
BEGIN

    DECLARE errno INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;

    START TRANSACTION;
    DELETE FROM roles WHERE id = role_id;

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(user, "delete", "roles", NOW());
    
    COMMIT;
END?
DELIMITER ;

--Add Permission (✅)(📄)
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

--Delete Permission (✅)(📄)
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
/* Manejemen User */


/* Manajemen Akun */
--Add Admin (✅)(📄)
DELIMITER ?
CREATE PROCEDURE add_admin(
    IN NUPTK CHAR(36),
    IN pass VARCHAR(255),
    IN tgl_masuk DATE,
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
    VALUES (uuid, NUPTK, pass, NOW(), NOW());

    INSERT INTO model_has_roles(role_id, model_type, model_id)
    VALUES ("3", "App\Models\User", uuid);

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(actor, "insert", "users", NOW());

    INSERT INTO gurus(NUPTK, user, jabatan, tanggal_masuk, status, created_at, updated_at)
    VALUES(NUPTK, uuid, "tu", tgl_masuk, "aktif", NOW(), NOW());

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(actor, "insert", "gurus", NOW());
    
    COMMIT;
END?
DELIMITER ;

--Update Admin (✅)(📄)
DELIMITER ?
CREATE PROCEDURE update_admin (
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
DELIMITER;

--Non Aktifkan Admin Sementara (✅)(📄)
DELIMITER ?
CREATE PROCEDURE inactive_admin (
    IN admin CHAR(36),
    IN actor CHAR(36)
)
BEGIN
    DECLARE errno INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;
    START TRANSACTION;

    UPDATE users SET deleted_at = NOW() WHERE uuid = admin COLLATE utf8mb4_general_ci;

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(actor, "update", "users", NOW());

    UPDATE gurus SET status = "inaktif", updated_at = NOW() WHERE user = admin COLLATE utf8mb4_general_ci;

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(actor, "update", "gurus", NOW());

    COMMIT;
END ?
DELIMITER;

--Restore Admin (✅)(📄)
DELIMITER ?
CREATE PROCEDURE restore_admin(
    IN admin CHAR(36),
    IN actor CHAR(36)
)
BEGIN
    DECLARE errno INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;
    START TRANSACTION;

    UPDATE users SET deleted_at = NULL WHERE uuid = admin COLLATE utf8mb4_general_ci;

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(actor, "update", "users", NOW());

    COMMIT;
END?
DELIMITER;

--Add Guru (✅)(📄)
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

--Inactive Guru (✅)(📄)
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

--Restore Guru(✅)(📄)
DELIMITER ?
CREATE PROCEDURE restore_guru (
    IN guru CHAR(36),
    IN actor CHAR(36)
)
BEGIN
    UPDATE gurus SET status = "aktif", updated_at = NOW()  WHERE user = guru COLLATE utf8mb4_general_ci;

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(actor, "update", "gurus", NOW());
    
    UPDATE users SET deleted_at = NULL WHERE uuid = guru COLLATE utf8mb4_general_ci; 

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(actor, "update", "users", NOW());
END?
DELIMITER;

--Delete Guru(✅)(📄)
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
/* Manejemen Akun */


/* Tahun Ajaran */
--Add Tahun Ajaran (✅)(📄)
DELIMITER ?
CREATE PROCEDURE add_tahun_ajaran(
    IN tahun_ajaran CHAR(9),
    IN semester CHAR(6),
    IN start DATETIME,
    IN end DATETIME,
    admin CHAR(36)
)
BEGIN

    DECLARE errno INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;

    START TRANSACTION;

    INSERT INTO tahun_ajarans(tahun_ajaran_id ,tahun_ajaran, semester, tanggal_mulai, tanggal_berakhir, created_at, updated_at)
    VALUES(UUID(), tahun_ajaran, semester, start, end, NOW(), NOW());

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "insert", "tahun_ajarans", NOW());

    COMMIT;

END?
DELIMITER ;

--Update Tahun Ajaran()()
DELIMITER ?
CREATE PROCEDURE update_tahun_ajaran(
    IN tahun_ajaran CHAR(36),
    IN start DATETIME,
    IN end DATETIME,
    admin CHAR(36)
)
BEGIN

DECLARE errno INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;

    START TRANSACTION;

    UPDATE tahun_ajarans SET tanggal_mulai = start, tanggal_berakhir = end, updated_at = NOW() wHERE tahun_ajaran_id = tahun_ajaran COLLATE utf8mb4_general_ci;;

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "update", "tahun_ajarans", NOW());

    COMMIT;

END?
DELIMITER ;
/* Tahun Ajaran */


/* Manajemen Mata Pelajaran */

/* Manajemen Mata Pelajaran */


/* Manajemen Kelas */

/* Manajemen Kelas */


/* Manajemen Nilai */
--add sesi ()()
DELIMITER ?
CREATE PROCEDURE add_sesi(
    IN sesi CHAR(3),
    IN ta CHAR(9),
    IN semester CHAR(6),
    IN start DATETIME,
    IN end DATETIME,
    IN admin CHAR(36)
)
BEGIN

INSERT INTO sesi_penilaians(sesi_id ,nama_sesi, tahun_ajaran_aktif, semester_aktif, tanggal_mulai, tanggal_berakhir, created_at, updated_at)
VALUES(UUID(), sesi, ta, semester, start, end, NOW(), NOW());

INSERT INTO log_activities(actor, action, at, created_at)
VALUES(admin, "insert", "sesi_penilaians", NOW());

END?
DELIMITER ;
/* Manajemen Nilai */