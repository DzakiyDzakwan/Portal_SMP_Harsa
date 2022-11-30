/* Registrasi Siswa */
DELIMITER ?
CREATE PROCEDURE registrasi_siswa(
    IN uuid CHAR(36),
    IN nama VARCHAR(255),
    IN nisn CHAR(10)
    IN nis CHAR(4),
    IN pass VARCHAR(255),
    IN tgl_masuk DATE,
    IN kelas_id CHAR(3),
    IN jk CHAR(2)
)
BEGIN
DECLACRE kls_awal VARCHAR;
SELECT kelompok_kelas FROM kelas INTO kls_awal WHERE kelas_id = kelas_id;

INSERT INTO user(uuid, username, password, role) 
VALUES (uuid, nisn, pass, "siswa");

INSERT INTO siswa(nisn, nis, ruang_kelas, kelas_awal, semester, status_keaktifan, user)
VALUES(nisn, nis, kelas_id, kls_awal, '1', 'aktif', uuid);

INSERT INTO user_profile(user, nama, jenis_kelamin)
VALUES (uuid, nama, jk);

END?
DELIMITER ;
/* Registrasi Siswa End */

/* Registrasi Guru */
DELIMITER ?
CREATE PROCEDURE registrasi_guru(
    IN nama VARCHAR(255),
    IN nip CHAR(18),
    IN jabatan CHAR(4),
    IN pass VARCHAR(255),
    IN tgl_masuk DATE,
    IN jk CHAR(2)
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
    INSERT INTO users(uuid, username, password, role) 
    VALUES (uuid, nip, pass, "guru");

    INSERT INTO gurus(nip, jabatan, tanggal_masuk, status_keaktifan, is_wali_kelas, user)
    VALUES(nip, jabatan, tgl_masuk, 'aktif', 'tidak', uuid);

    INSERT INTO user_profiles(user, nama, jenis_kelamin)
    VALUES (uuid, nama, jk);
    COMMIT;
END?
DELIMITER ;
/* Registrasi Guru End */


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

/* Konfirmasi Pembayaran */
DELIMITER ?
CREATE PROCEDURE konfirmasi_pelunasan(
IN tagihan BIGINT,
IN ket TEXT,
IN bukti VARCHAR(255),
)
BEGIN

    DECLACRE pelunasan INT;

    INSERT INTO pelunasan_tagihan(tagihan_id, keterangan, bukti)
    VALUES (tagihan, ket,bukti );

    SELECT pelunasan_id INTO pelunasan FROM pelunasan_tagihan WHERE tagihan_id = tagihan;

    INSERT INTO konfirmasi (pelunasan, status)
    VALUES (pelunasan, "pending");

END?
DELIMITER ;