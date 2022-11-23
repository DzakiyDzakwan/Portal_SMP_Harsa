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
    IN kategori_nilai CHAR(2),
    IN siswa CHAR(10),
    IN mapel CHAR(3)
)
BEGIN

END?
DELIMITER ;

/* Input tagihan */
DELIMITER ?
CREATE PROCEDURE notfikasi_tagihan(

)
BEGIN

END?
DELIMITER ;

//Belum tau
DELIMITER ?
CREATE PROCEDURE belum_tau(

)
BEGIN

END?
DELIMITER ;