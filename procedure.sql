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
    IN uuid CHAR(36),
    IN nama VARCHAR(255),
    IN nip CHAR(18),
    IN jabatan CHAR(4),
    IN pass VARCHAR(255),
    IN tgl_masuk DATE,
    IN jk CHAR(2)
)
BEGIN
DECLACRE kls_awal VARCHAR;
SELECT kelompok_kelas FROM kelas INTO kls_awal WHERE kelas_id = kelas_id;

INSERT INTO user(uuid, username, password, role) 
VALUES (uuid, nip, pass, "guru");

INSERT INTO guru(nip, jabatan, tanggal_masuk, status_keaktifan, is_wali_kelas, user)
VALUES(nisn, jabatan, tgl_masuk, 'aktif', 'tidak', uuid);

INSERT INTO user_profile(user, nama, jenis_kelamin)
VALUES (uuid, nama, jk);

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

/* Prestasi Siswa Akademik*/
DELIMITER ?
CREATE PROCEDURE prestasi_siswa_akademik(
IN NIS CHAR(10)
)
BEGIN
SELECT * FROM prestasi WHERE siswa = NIS AND jenis_prestasi = "akademik";
END?
DELIMITER ;
/* Prestasi Siswa Akademik End */

/* Prestasi Siswa nonAkademik*/
DELIMITER ?
CREATE PROCEDURE prestasi_siswa_akademik(
IN NIS CHAR(10)
)
BEGIN
SELECT * FROM prestasi WHERE siswa = NIS AND jenis_prestasi = "nonAkademik";
END?
DELIMITER ;
/* Prestasi Siswa nonAkademik End */

/* FUNCTION */

DELIMITER ?
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
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "indeks Error";
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
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "indeks Error";
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
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "indeks Error";
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
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "indeks Error";
        END IF;
    END IF;
    RETURN (i);
END?
DELIMITER ;
