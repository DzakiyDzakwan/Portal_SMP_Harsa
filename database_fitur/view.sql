/* Table Kelas */
CREATE VIEW table_kelas AS
SELECT kelas.kelas_id, kelas.nama_kelas, kelas.kelompok_kelas, user_profiles.nama AS Wali_Kelas, COUNT(siswas.NIS) AS Jumlah_Siswa
FROM kelas
LEFT JOIN gurus ON kelas.wali_kelas = gurus.NIP 
LEFT JOIN users ON gurus.user = users.uuid
INNER JOIN user_profiles ON users.uuid = user_profiles.user
LEFT JOIN siswas ON kelas.kelas_id = siswas.ruang_kelas
GROUP BY kelas.kelas_id, kelas.nama_kelas, kelas.kelompok_kelas, user_profiles.nama, siswas.NIS


/* Detail Siswa */
CREATE VIEW detail_siswa AS
SELECT user_profiles.nama, siswas.NIS, user_profiles.jenis_kelamin, user_profiles.tgl_lahir
FROM user_profiles 
LEFT JOIN users ON user_profiles.user = users.uuid
RIGHT JOIN siswas ON siswas.user = user_profiles.user;

/* Detail Guru */
CREATE VIEW detail_guru AS
SELECT user_profile.foto, user_profile.nama, g.nip, user_profile.jenis_kelamin, user_profile.tgl_lahir, user_profile.tempat_lahir
SELECT user_profiles.nama, gurus.NIP, user_profiles.jenis_kelamin, user_profiles.tgl_lahir
FROM user_profiles 
LEFT JOIN users ON user_profiles.user = users.uuid
RIGHT JOIN gurus ON gurus.user = user_profiles.user;

/* Table Siswa */
CREATE VIEW table_siswa AS
SELECT users.username, user_profiles.nama, siswas.NIS, user_profiles.jenis_kelamin, siswas.status_keaktifan
FROM user_profiles
LEFT JOIN users ON user_profiles.user = users.uuid
RIGHT JOIN siswas ON siswas.user = user_profiles.user;

/* Table Guru */
CREATE VIEW table_guru AS
SELECT users.username, user_profiles.nama, gurus.NIP, user_profiles.jenis_kelamin, gurus.status_keaktifan
FROM user_profiles
LEFT JOIN users ON user_profiles.user = users.uuid
RIGHT JOIN gurus ON gurus.user = user_profiles.user;

/* Table Mapel */
CREATE VIEW table_mapel AS
SELECT mapels.nama_mapel, mapels.kelompok_mapel, user_profiles.nama
FROM mapels
LEFT JOIN mapel_gurus ON mapels.mapel_id = mapel_gurus.mapel_guru_id
LEFT JOIN gurus ON gurus.nip = mapel_gurus.guru
LEFT JOIN users ON users.uuid = gurus.user
RIGHT JOIN user_profiles ON user_profiles.user = users.uuid;

/* Table Ekskul */
CREATE VIEW table_ekskul AS
SELECT nama, hari, waktu_mulai, waktu_akhir, tempat FROM ekskuls;

/* Table Prestasi */
CREATE VIEW table_prestasi AS
SELECT user_profiles.nama, prestasis.jenis_prestasi, prestasis.keterangan, 
prestasis.tanggal_prestasi, prestasis.semester
FROM prestasis
LEFT JOIN siswas ON siswas.nisn = prestasis.siswa
LEFT JOIN users ON users.uuid = siswas.user
RIGHT JOIN user_profiles ON user_profiles.user = users.uuid;

/* Table Roster */
CREATE VIEW table_roster AS
SELECT mapels.nama_mapel, kelas.kelompok_kelas AS kelas, roster_kelas.jam_masuk,
roster_kelas.jam_keluar, roster_kelas.hari, user_profiles.nama
FROM roster_kelas
LEFT JOIN mapel_gurus ON mapel_gurus.mapel_guru_id = roster_kelas.mapel_guru_id
LEFT JOIN mapels ON mapels.mapel_id = mapel_gurus.mapel_guru_id
LEFT JOIN kelas ON kelas.kelas_id = roster_kelas.ruang_kelas
LEFT JOIN gurus ON gurus.nip = roster_kelas.guru
LEFT JOIN users ON users.uuid = gurus.user
RIGHT JOIN user_profiles ON user_profiles.user = users.uuid;

/* Detail siswa Kelas */
CREATE view siswa_kelas AS
SELECT siswas.NISN, siswas.kelas, user_profiles.nama, kontrak_semesters.sakit, kontrak_semesters.izin, kontrak_semesters.alpa FROM siswas JOIN user_profiles ON user_profiles.user = siswas.user JOIN kontrak_semesters ON kontrak_semesters.siswa = siswas.NISN;

CREATE VIEW info_siswa AS
SELECT  p.foto, p.nama, p.email, s.NISN, s.NIS, IF(p.jenis_kelamin = "LK", "Pria", "Wanita" ) AS jenis_kelamin, k.nama_kelas AS kelas, DATE_FORMAT(s.tanggal_masuk, "%d %M %Y") AS tanggal_masuk, s.status, p.tempat_lahir, DATE_FORMAT(p.tgl_lahir, "%d %M %Y") AS tanggal_lahir, umur(p.tgl_lahir) AS tanggal_lahir, p.alamat_tinggal, p.alamat_domisili, s.anak_ke, s.telepon_orangtua, s.alamat_orangtua, s.nama_ayah, s.pekerjaan_ayah, s.nama_ibu, s.pekerjaan_ibu, s.telepon_wali, s.nama_wali, s.pekerjaan_wali FROM `siswas` AS s JOIN users AS u ON s.user = u.uuid JOIN user_profiles AS p ON u.uuid = p.user JOIN kelas AS k ON s.kelas = k.kelas_id;

CREATE VIEW list_guru AS
SELECT g.nip, p.nama, g.jabatan, g.status FROM `gurus` AS g JOIN user_profiles AS p ON g.user = p.user;

CREATE VIEW info_guru AS
SELECT p.nama, p.email, g.nip, g.jabatan, IF(p.jenis_kelamin = "LK", "Pria", "Wanita" ) AS jenis_kelamin, DATE_FORMAT(g.tanggal_masuk, "%d %M %Y") AS tanggal_masuk, g.status, masa_mengajar(g.tanggal_masuk), g.pendidikan, g.tahun_ijazah, g.status_perkawinan, p.alamat_tinggal, p.alamat_domisili, p.tempat_lahir, DATE_FORMAT(p.tgl_lahir, "%d %M %Y") AS tanggal_lahir, umur(p.tgl_lahir) AS umur FROM `gurus` AS g JOIN users AS u ON g.user = u.uuid JOIN user_profiles AS p ON u.uuid = p.user;


