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

/* Manejemen Akun */


/* Tahun Ajaran */
--Add Tahun Ajaran ()()
DELIMITER ?
CREATE PROCEDURE add_tahun_ajaran(
    IN tahun_ajaran CHAR(9),
    IN semester CHAR(6),
    IN start DATETIME,
    IN end DATETIME,
    admin CHAR(36)
)
BEGIN

    INSERT INTO tahun_ajarans(tahun_ajaran, semester, tanggal_mulai, tanggal_berakhir, created_at, updated_at)
    VALUES(tahun_ajaran, semester, start, end, NOW(), NOW());

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "insert", "tahun_ajarans", NOW());

END?
DELIMITER ;

--Update Tahun Ajaran
DELIMITER ?
CREATE PROCEDURE add_tahun_ajaran(
    IN tahun_ajaran CHAR(9),
    IN start DATETIME,
    IN end DATETIME,
    admin CHAR(36)
)
BEGIN

    UPDATE tahun_ajarans SET tanggal_mulai = start, tanggal_berakhir = end, updated_at = NOW() wHERE tahun_ajaran;

    INSERT INTO log_activities(actor, action, at, created_at)
    VALUES(admin, "insert", "tahun_ajarans", NOW());

END?
DELIMITER ;

/* Tahun Ajaran */


/* Manajemen Mata Pelajaran */

/* Manajemen Mata Pelajaran */


/* Manajemen Kelas */

/* Manajemen Kelas */


/* Manajemen Nilai */

/* Manajemen Nilai */