--User--
--Log Insert User
DELIMTER ?
CREATE TRIGGER log_insert_user
AFTER INSERT ON users
FOR EACH ROW
BEGIN
INSERT INTO log_users(uuid, n_username, n_password, role, keterangan, created_at)
VALUES (NEW.uuid, NEW.username, NEW.password, NEW.role, "insert", NOW());
END?
DELIMITER ;

--Log Update User
DELIMTER ?
CREATE TRIGGER log_update_user
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
INSERT INTO log_users(uuid, n_username, o_username, n_password, o_password, role, keterangan, created_at)
VALUES (OLD.uuid, NEW.username, OLD.username, NEW.password, OLD.password, OLD.role, "update", NOW());
END?
DELIMITER ;

-- Log Delete User
DELIMTER ?
CREATE TRIGGER log_delete_user
AFTER DELETE ON users
FOR EACH ROW
BEGIN
INSERT INTO log_users(uuid, o_username, o_password, role, keterangan, created_at)
VALUES (OLD.uuid, OLD.username, OLD.password, OLD.role, "delete", NOW());
END?
DELIMITER ;

--Profile--
--Log Insert Profile
DELIMTER ?
CREATE TRIGGER log_insert_profile
AFTER INSERT ON user_profiles
FOR EACH ROW
BEGIN
INSERT INTO log_profiles(profile_id, n_email, n_nama, n_alamat, jenis_kelamin, n_foto, keterangan, created_at)
VALUES (NEW.profile_id, NEW.email, NEW.nama, NEW.alamat, NEW.jenis_kelamin, NEW.foto, "insert", NOW());
END?
DELIMITER ;

--Log Update Profile
DELIMTER ?
CREATE TRIGGER log_update_profile
AFTER UPDATE ON user_profiles
FOR EACH ROW
BEGIN
INSERT INTO log_profiles(profile_id, n_email, o_email, n_nama, o_nama, n_alamat, o_alamat, jenis_kelamin, n_foto, o_foto, keterangan, created_at)
VALUES (OLD.profile_id, NEW.email, OLD.email, NEW.nama, OLD.nama, NEW.alamat, OLD.alamat, OLD.jenis_kelamin, NEW.foto, OLD.foto, "update", NOW());
END?
DELIMITER ;

--Log Delete Profile
DELIMTER ?
CREATE TRIGGER log_delete_profile
AFTER DELETE ON user_profiles
FOR EACH ROW
BEGIN
INSERT INTO log_profiles(profile_id, o_email, o_nama, o_alamat, jenis_kelamin, o_foto, keterangan, created_at)
VALUES (OLD.profile_id, OLD.email, OLD.email, OLD.nama, OLD.alamat, OLD.jenis_kelamin, OLD.foto, "delete", NOW());
END?
DELIMITER ;

--Guru--
--Log Insert Guru
DELIMTER ?
CREATE TRIGGER log_insert_guru
AFTER INSERT ON gurus
FOR EACH ROW
BEGIN
INSERT INTO log_gurus(user, n_NIP, n_jabatan, n_pendidikan, n_tahun_ijazah, n_status_perkawinan, tanggal_masuk, n_status_keaktifan, n_is_wali_kelas, keterangan, created_at)
VALUES (NEW.user, NEW.NIP, NEW.jabatan, NEW.pendidikan, NEW.tahun_ijazah, NEW.status_perkawinan, NEW.tanggal_masuk, NEW.status_keaktifan, NEW.is_wali_kelas, "insert", NOW());
END?
DELIMITER ;

--Log Update Guru
DELIMTER ?
CREATE TRIGGER log_update_guru
AFTER UPDATE ON gurus
FOR EACH ROW
BEGIN
INSERT INTO log_gurus(user, n_NIP, o_nip, n_jabatan, o_jabatan, n_pendidikan, o_pendidikan, n_tahun_ijazah, o_tahun_ijazah, n_status_perkawinan, o_status_perkawinan, tanggal_masuk, n_status_keaktifan, o_status_keaktifan, n_is_wali_kelas, o_is_wali_kelas, keterangan, created_at)
VALUES (OLD.user, NEW.NIP, OLD.NIP, NEW.jabatan, OLD.jabatan, NEW.pendidikan, OLD.pendidikan, NEW.tahun_ijazah, OLD.tahun_ijazah, NEW.status_perkawinan, OLD.status_perkawinan, OLD.tanggal_masuk, NEW.status_keaktifan, OLD.status_keaktifan, NEW.n_is_wali_kelas, OLD.is_wali_kelas, "update", NOW());
END?
DELIMITER ;

--Log Delete Guru
DELIMTER ?
CREATE TRIGGER log_delete_guru
AFTER DELETE ON gurus
FOR EACH ROW
BEGIN
INSERT INTO log_gurus(user, o_nip, o_jabatan, o_pendidikan, o_tahun_ijazah, o_status_perkawinan, tanggal_masuk, o_status_keaktifan, o_is_wali_kelas, keterangan, created_at)
VALUES (OLD.user, OLD.NIP, OLD.jabatan, OLD.pendidikan, OLD.tahun_ijazah, OLD.status_perkawinan, OLD.tanggal_masuk, OLD.status_keaktifan, OLD.is_wali_kelas, "delete", NOW());
END?
END?
DELIMITER ;

--Mapel--
--Log Insert mapel
DELIMTER ?
CREATE TRIGGER log_insert_mapel
AFTER INSERT ON mapels
FOR EACH ROW
BEGIN
INSERT INTO log_mapels(n_mapel_id, n_nama_mapel, n_kelompok_mapel, keterangan, created_at)
VALUES (NEW.mapel_id, NEW.nama_mapel, NEW.kelompok_mapel, "insert", NOW());
END?
DELIMITER ;

--Log Update mapel
DELIMTER ?
CREATE TRIGGER log_update_mapel
AFTER UPDATE ON mapels
FOR EACH ROW
BEGIN
INSERT INTO log_mapels(n_mapel_id, o_mapel_id, n_nama_mapel, o_nama_mapel, n_kelompok_mapel, o_kelompok_mapel, keterangan, created_at)
VALUES (NEW.mapel_id, OLD.mapel_id, NEW.nama_mapel, OLD.nama_mapel, NEW.kelompok_mapel, OLD.kelompok_mapel, "update", NOW());
END?
DELIMITER ;

-- Log Delete mapel
DELIMTER ?
CREATE TRIGGER log_delete_mapel
AFTER DELETE ON mapels
FOR EACH ROW
BEGIN
INSERT INTO log_mapels(o_mapel_id, o_nama_mapel, o_kelompok_mapel, keterangan, created_at)
VALUES (OLD.mapel_id, OLD.nama_mapel, OLD.kelompok_mapel, "delete", NOW());
END?
DELIMITER ;

--Kelas--
--Log Insert kelas
DELIMTER ?
CREATE TRIGGER log_insert_kelas
AFTER INSERT ON kelas
FOR EACH ROW
BEGIN
INSERT INTO log_kelas(n_kelas_id, n_wali_kelas, n_kelompok_kelas, n_nama_kelas, keterangan, created_at)
VALUES (NEW.kelas_id, NEW.wali_kelas, NEW.kelompok_kelas, NEW.nama_kelas, "insert", NOW());
END?
DELIMITER ;

--Log Update kelas
DELIMTER ?
CREATE TRIGGER log_update_kelas
AFTER UPDATE ON kelas
FOR EACH ROW
BEGIN
INSERT INTO log_kelas(n_kelas_id, o_kelas_id, n_kelompok_kelas, o_kelompok_kelas, n_nama_kelas, o_nama_kelas, keterangan, created_at)
VALUES (NEW.kelas_id, OLD.kelas_id, NEW.kelompok_kelas, OLD.kelompok_kelas, NEW.nama_kelas, OLD.nama_kelas,  "update", NOW());
END?
DELIMITER ;

-- Log Delete kelas
DELIMTER ?
CREATE TRIGGER log_delete_kelas
AFTER DELETE ON kelas
FOR EACH ROW
BEGIN
INSERT INTO log_kelas(o_kelas_id, o_nama_kelas, o_kelompok_kelas, keterangan, created_at)
VALUES (OLD.kelas_id, OLD.nama_kelas, OLD.kelompok_kelas "delete", NOW());
END?
DELIMITER ;

--MapelGuru--
--Log Insert mapel_guru
DELIMTER ?
CREATE TRIGGER log_insert_mapel_guru
AFTER INSERT ON mapel_gurus
FOR EACH ROW
BEGIN
INSERT INTO log_mapel_gurus(mapel_guru_id, mapel, guru, keterangan, created_at)
VALUES (NEW.mapel_guru_id, NEW.mapel, NEW.guru, "insert", NOW());
END?
DELIMITER ;

-- Log Delete mapel_guru
DELIMTER ?
CREATE TRIGGER log_insert_mapel_guru
AFTER DELETE ON mapel_gurus
FOR EACH ROW
BEGIN
INSERT INTO log_mapel_gurus(mapel_guru_id, mapel, guru, keterangan, created_at)
VALUES (OLD.mapel_guru_id, OLD.mapel, OLD.guru, "delete", NOW());
END?
DELIMITER ;

--Roster Kelas--
--Log Insert roster_kelas
DELIMTER ?
CREATE TRIGGER log_insert_roster_kelas
AFTER INSERT ON roster_kelas
FOR EACH ROW
BEGIN
INSERT INTO log_roster_kelas(roster_id, mapel_guru, kelas, n_jam_masuk, n_jam_keluar, n_hari, keterangan, created_at)
VALUES (NEW.roster_id, NEW.mapel_guru, NEW.kelas, NEW.jam_masuk, NEW.jam_keluar, NEW.hari, "insert", NOW());
END?
DELIMITER ;

--Log Update roster_kelas
DELIMTER ?
CREATE TRIGGER log_update_roster_kelas
AFTER UPDATE ON roster_kelas
FOR EACH ROW
BEGIN
INSERT INTO log_roster_kelas(roster_id, mapel_guru, kelas, n_jam_masuk, o_jam_masuk n_jam_keluar, o_jam_keluar,  n_hari, o_hari, keterangan, created_at)
VALUES (OLD.roster_id, OLD.mapel_guru, OLD.kelas, NEW.jam_masuk, OLD.jam_masuk, NEW.jam_keluar, OLD.jam_keluar, NEW.hari, OLD.hari, "update", NOW());
END?
DELIMITER ;

-- Log Delete roster_kelas
DELIMTER ?
CREATE TRIGGER log_delete_roster_kelas
AFTER DELETE ON roster_kelas
FOR EACH ROW
BEGIN
INSERT INTO log_roster_kelas(roster_id, mapel_guru, kelas, o_jam_masuk, o_jam_keluar, o_hari, keterangan, created_at)
VALUES (OLD.roster_id, OLD.mapel_guru, OLD.kelas, OLD.jam_masuk, OLD.jam_keluar, OLD.hari, "delete", NOW());
END?
DELIMITER ;

--Siswa--
--Log Insert siswa
DELIMTER ?
CREATE TRIGGER log_insert_siswa
AFTER INSERT ON siswas
FOR EACH ROW
BEGIN
INSERT INTO log_siswas(o_NISN, o_kelas, user, NIS, tanggal_masuk, kelas_awal, o_semester, o_status_keaktifan, keterangan, created_at)
VALUES (OLD.NISN, OLD.kelas, OLD.user, OLD.NIS, OLD.tanggal_masuk, OLD.kelas_awal, OLD.semester, OLD.status_keaktifan, "insert", NOW());
END?
DELIMITER ;

--Log Update siswa
DELIMTER ?
CREATE TRIGGER log_update_siswa
AFTER UPDATE ON siswas
FOR EACH ROW
BEGIN
INSERT INTO log_siswas(n_NISN, o_NISN, n_kelas, o_kelas, user, NIS, tanggal_masuk, kelas_awal, n_semester, o_semester, n_status_keaktifan, o_status_keaktifan, keterangan, created_at)
VALUES (NEW.NISN, OLD.NISN, NEW.kelas, OLD.kelas, OLD.user, OLD.NIS, OLD.tanggal_masuk, OLD.kelas_awal, NEW.senester, OLD.semester, NEW.status_keaktifan, OLD.status_keaktifan, "update", NOW());
END?
DELIMITER ;

-- Log Delete kelas
DELIMTER ?
CREATE TRIGGER log_delete_kelas
AFTER DELETE ON kelas
FOR EACH ROW
BEGIN
INSERT INTO log_kelas(roster_id, mapel_guru, kelas, o_jam_masuk, o_jam_keluar, o_hari, keterangan, created_at)
VALUES (OLD.roster_id, OLD.mapel_guru, OLD.kelas, OLD.jam_masuk, OLD.jam_keluar, OLD.hari, "delete", NOW());
END?
DELIMITER ;

--Prestasi--
--Log Insert prestasi
DELIMTER ?
CREATE TRIGGER log_insert_prestasi
AFTER INSERT ON prestasis
FOR EACH ROW
BEGIN
INSERT INTO log_prestasis(prestasi_id, siswa, n_jenis_prestasi, n_keterangan, n_tanggal_prestasi, n_semester, keterangan, created_at)
VALUES (NEW.prestasi_id, NEW.siswa, NEW.jenis_prestasi, NEW.keterangan, NEW.tanggal_prestasi, NEW.semester, "insert", NOW());
END?
DELIMITER ;

--Log Update prestasi
DELIMTER ?
CREATE TRIGGER log_update_prestasi
AFTER UPDATE ON prestasis
FOR EACH ROW
BEGIN
INSERT INTO log_prestasis(prestasi_id, siswa, n_jenis_prestasi, o_jenis_prestasi, n_keterangan, o_keterangan,  n_tanggal_prestasi, o_tanggal_prestasi, n_semester, o_semester, keterangan, created_at)
VALUES (OLD.prestasi_id, OLD.siswa, NEW.jenis_prestasi, OLD.jenis_prestasi, NEW.keterangan, OLD.keterangan, NEW.tanggal_prestasi, OLD.tanggal_prestasi, NEW.semester, OLD.semester, "update", NOW());
END?
DELIMITER ;

--Log Delete prestasi
DELIMTER ?
CREATE TRIGGER log_delete_prestasi
AFTER DELETE ON prestasis
FOR EACH ROW
BEGIN
INSERT INTO log_prestasis(prestasi_id, siswa, o_jenis_prestasi, o_keterangan, o_tanggal_prestasi, o_semester, keterangan, created_at)
VALUES (OLD.prestasi_id, OLD.siswa, OLD.jenis_prestasi, OLD.keterangan, OLD.tanggal_prestasi, OLD.semester, "delete", NOW());
END?
DELIMITER ;

--Nilai--
--Log Insert prestasi
DELIMTER ?
CREATE TRIGGER log_insert_prestasi
AFTER INSERT ON prestasis
FOR EACH ROW
BEGIN
INSERT INTO log_prestasis(prestasi_id, siswa, n_jenis_prestasi, n_keterangan, n_tanggal_prestasi, n_semester, keterangan, created_at)
VALUES (NEW.prestasi_id, NEW.siswa, NEW.jenis_prestasi, NEW.keterangan, NEW.tanggal_prestasi, NEW.semester, "insert", NOW());
END?
DELIMITER ;

--Log Update prestasi
DELIMTER ?
CREATE TRIGGER log_update_prestasi
AFTER UPDATE ON prestasis
FOR EACH ROW
BEGIN
INSERT INTO log_prestasis(prestasi_id, siswa, n_jenis_prestasi, o_jenis_prestasi, n_keterangan, o_keterangan,  n_tanggal_prestasi, o_tanggal_prestasi, n_semester, o_semester, keterangan, created_at)
VALUES (OLD.prestasi_id, OLD.siswa, NEW.jenis_prestasi, OLD.jenis_prestasi, NEW.keterangan, OLD.keterangan, NEW.tanggal_prestasi, OLD.tanggal_prestasi, NEW.semester, OLD.semester, "update", NOW());
END?
DELIMITER ;

--Log Delete prestasi
DELIMTER ?
CREATE TRIGGER log_delete_prestasi
AFTER DELETE ON prestasis
FOR EACH ROW
BEGIN
INSERT INTO log_prestasis(prestasi_id, siswa, o_jenis_prestasi, o_keterangan, o_tanggal_prestasi, o_semester, keterangan, created_at)
VALUES (OLD.prestasi_id, OLD.siswa, OLD.jenis_prestasi, OLD.keterangan, OLD.tanggal_prestasi, OLD.semester, "delete", NOW());
END?
DELIMITER ;


-----------------------------------------------------------

-- Log Update Rekap Absensi
DELIMITER//
CREATE TRIGGER log_update_rekap_absensi
BEFORE UPDATE on rekap_absensi
FOR EACH ROW
BEGIN
INSERT INTO log_update_rekap_absensi (absensi_id, siswa, sakit, izin, tanpa_keterangan, semester, created_at)
VALUES (OLD.absensi_id, OLD.siswa, NEW.sakit, NEW.izin, NEW.tanpa_keterangan, OLD.semester, NOW());
END?

-- Log Insert Rekap Absensi
CREATE TRIGGER log_insert_rekap_absensi
AFTER INSERT on rekap_absensi
FOR EACH ROW
BEGIN
INSERT INTO log_insert_rekap_absensi (absensi_id, siswa, sakit, izin, tanpa_keterangan, semester, created_at)
VALUES (NEW.absensi_id, NEW.siswa, NEW.sakit, NEW.izin, NEW.tanpa_keterangan, NEW.semester, NOW());
END?

-- Log Delete Rekap Absensi
CREATE TRIGGER log_delete_rekap_absensi
BEFORE DELETE on rekap_absensi
FOR EACH ROW
BEGIN
INSERT INTO log_insert_rekap_absensi (absensi_id, siswa, sakit, izin, tanpa_keterangan, semester, created_at)
VALUES (OLD.absensi_id, OLD.siswa, OLD.sakit, OLD.izin, OLD.tanpa_keterangan, OLD.semester, NOW());
END?
//

-- Log Update Konfirmasi Pelunasan
DELIMITER?
CREATE TRIGGER log_update_konfirmasi_pelunasan
AFTER UPDATE on Konfimasi_pelunasan
FOR EACH ROW
BEGIN
INSERT INTO log_update_konfirmasi_pelunasan (konfirmasi_id, pelunasan, keterangan, status)
VALUES (OLD.konfirmasi_id, OLD.pelunasan, NEW.keterangan, 'LUNAS');
END?
?

-- Log Update Roster Kelas
DELIMITER!
CREATE TRIGGER log_update_roster_kelas
AFTER UPDATE on Roster_kelas
FOR EACH ROW
BEGIN
INSERT INTO log_update_roster_kelas (roster_id, Mapel_guru, ruang_kelas, jam_masuk, jam_keluar, hari)
VALUES (OLD.roster_id, OLD.Mapel_guru, OLD.ruang_kelas, NEW.jam_masuk, NEW.jam_keluar, NEW.hari);
END;
!

-- Log  Update Nilai
DELIMITER!
CREATE TRIGGER log_insert_nilai
AFTER UPDATE on nilai
FOR EACH ROW
BEGIN
INSERT INTO log_insert_nilai (nilai_id, semester, tahun_pelajaran, nilai_pengetahuan, deskripsi_pengetahuan, nilai_keterampilan, deskripsi_keterampilan, kategori_nilai, siswa, mata_pelajaran, created_at, updated_at)
VALUES (OLD.nilai_id, OLD.semester, OLD.tahun_pelajaran, NEW.nilai_pengetahuan, NEW.deskripsi_pengetahuan, NEW.nilai_keterampilan, NEW.deskripsi_keterampilan, NEW.kategori_nilai, NEW.siswa, NEW.mata_pelajaran, NOW(), NOW());
END;
!

-- Log  Delete Nilai
DELIMITER!
CREATE TRIGGER log_delete_nilai
AFTER DELETE on nilai
FOR EACH ROW
BEGIN
INSERT INTO log_insert_nilai (nilai_id, semester, tahun_pelajaran, nilai_pengetahuan, deskripsi_pengetahuan, nilai_keterampilan, deskripsi_keterampilan, kategori_nilai, siswa, mata_pelajaran, created_at, updated_at)
VALUES (OLD.nilai_id, OLD.semester, OLD.tahun_pelajaran, OLD.nilai_pengetahuan, OLD.deskripsi_pengetahuan, OLD.nilai_keterampilan, OLD.deskripsi_keterampilan, OLD.kategori_nilai, OLD.siswa, OLD.mata_pelajaran, NOW(), NOW());
END;
!
