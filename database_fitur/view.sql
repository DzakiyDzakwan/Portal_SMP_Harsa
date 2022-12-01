/* Table Kelas */
CREATE VIEW table_kelas AS
SELECT kelas.nama_kelas, kelas.kelompok_kelas, user_profiles.nama AS Wali_Kelas, COUNT(siswas.NIS) AS Jumlah_Siswa
FROM kelas
LEFT JOIN gurus ON kelas.wali_kelas = gurus.NIP 
LEFT JOIN users ON gurus.user = users.uuid
RIGHT JOIN user_profiles ON users.uuid = user_profiles.user
RIGHT JOIN siswas ON siswas.ruang_kelas = kelas.kelas_id;

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