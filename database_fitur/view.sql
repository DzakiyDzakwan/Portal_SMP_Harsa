/* Table Kelas */
CREATE VIEW table_kelas AS
SELECT kelas.nama_kelas, kelas.nomor_kelas, kelas.ruangan, wk.wali_kelas, COUNT(siswa.nisn) AS Jumlah_Siswa
FROM kelas
    LEFT JOIN (
        SELECT guru.nip AS id, user_profile.nama AS wali_kelas
        FROM guru
        LEFT JOIN user_profile ON guru.user = user_profile.user;
    ) AS wk ON kelas.wali_kelas = wk.id,
    LEFT JOIN siswa ON siswa.ruang_kelas = kelas.kelas_id;



/* Detail Siswa */
CREATE VIEW detail_siswa AS
SELECT user_profile.foto, user_profile.nama, s.nis, user_profile.jenis_kelamin, user_profile.tgl_lahir, user_profile.tempat_lahir
FROM user_profile
    LEFT JOIN(
        SELECT siswa.user AS id, siswa.nis AS nip
        FROM siswa
        LEFT JOIN user ON id = user.uuid;
    ) AS s ON user_profile.user = s.id;


/* Detail Guru */
CREATE VIEW detail_guru AS
SELECT user_profile.foto, user_profile.nama, g.nip, user_profile.jenis_kelamin, user_profile.tgl_lahir, user_profile.tempat_lahir
FROM user_profile
    LEFT JOIN(
        SELECT guru.user AS id, guru.nip AS nip 
        FROM siswa
        LEFT JOIN user ON id = user.uuid;
    ) AS g ON user_profile.user = g.id;


/* Table Siswa */
CREATE VIEW table_siswa AS
SELECT user_profile.nama, s.nis, user_profile.jenis_kelamin, user_profile.agama, s.status_aktif
FROM user_profile
    LEFT JOIN(
        SELECT siswa.user AS id, siswa.nis AS nis, siswa.status_keaktifan AS status_aktif
        FROM siswa
        LEFT JOIN user ON id = user.uuid;
    ) AS s ON user_profile.user = s.id;


/* Table Guru */
CREATE VIEW table_siswa AS
SELECT user_profile.nama, g.nip, m.mapel, user_profile.jenis_kelamin, user_profile.agama, g.status_aktif
FROM user_profile
    LEFT JOIN(
        SELECT guru.user AS id, guru.nip AS nip, guru.status_keaktifan AS status_aktif
        FROM guru
        LEFT JOIN user ON id = user.uuid;
    ) AS g ON user_profile.user = g.id;
    JOIN (
        SELECT mapel.nama_mapel AS mapel
        FROM mapel
        LEFT JOIN mapel_guru ON mapel_guru.mapel = mapel.mapel_id
    ) AS m ON m.Guru = g.nip;

--Detail Siswa Dashboard Admin--
CREATE VIEW informasi_siswa AS
SELECT s.status_keaktifan as Keterangan FROM siswas AS s JOIN users AS u ON s.user = u.uuid JOIN user_profiles AS p ON p.user = u.uuid GROUP BY s.status_keaktifan;

SELECT COUNT(*) as Laki_Laki FROM siswas AS s JOIN users AS u ON s.user = u.uuid JOIN user_profiles AS p ON p.user = u.uuid WHERE p.jenis_kelamin = 'L';

SELECT COUNT(*) as Laki_Laki FROM siswas AS s JOIN users AS u ON s.user = u.uuid JOIN user_profiles AS p ON p.user = u.uuid WHERE p.jenis_kelamin = 'P';

--Detail Guru Dashboard Admin--