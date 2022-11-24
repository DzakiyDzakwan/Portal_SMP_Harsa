-- Log Update Rekap Absensi
DELIMITER//
CREATE TRIGGER log_update_rekap_absensi
BEFORE UPDATE on rekap_absensi
FOR EACH ROW
BEGIN
INSERT INTO log_update_rekap_absensi (absensi_id, siswa, sakit, izin, tanpa_keterangan, semester, created_at, updated_at)
VALUES (OLD.absensi_id, OLD.siswa, NEW.sakit, NEW.izin, NEW.tanpa_keterangan, OLD.semester, NOW(), NOW());
END;

-- Log Insert Rekap Absensi
CREATE TRIGGER log_insert_rekap_absensi
AFTER INSERT on rekap_absensi
FOR EACH ROW
BEGIN
INSERT INTO log_insert_rekap_absensi (absensi_id, siswa, sakit, izin, tanpa_keterangan, semester, created_at, updated_at)
VALUES (NEW.absensi_id, NEW.siswa, NEW.sakit, NEW.izin, NEW.tanpa_keterangan, NEW.semester, NOW(), NOW());
END;

-- Log Delete Rekap Absensi
CREATE TRIGGER log_delete_rekap_absensi
BEFORE DELETE on rekap_absensi
FOR EACH ROW
BEGIN
INSERT INTO log_insert_rekap_absensi (absensi_id, siswa, sakit, izin, tanpa_keterangan, semester, created_at, updated_at)
VALUES (OLD.absensi_id, OLD.siswa, OLD.sakit, OLD.izin, OLD.tanpa_keterangan, OLD.semester, NOW(), NOW());
END;
//

-- Log Update Konfirmasi Pelunasan
DELIMITER?
CREATE TRIGGER log_update_konfirmasi_pelunasan
AFTER UPDATE on Konfimasi_pelunasan
FOR EACH ROW
BEGIN
INSERT INTO log_update_konfirmasi_pelunasan (konfirmasi_id, pelunasan, keterangan, status)
VALUES (OLD.konfirmasi_id, OLD.pelunasan, NEW.keterangan, 'LUNAS');
END;
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

-- Log Insert User
DELIMITER//
CREATE TRIGGER log_insert_user
AFTER INSERT on user
FOR EACH ROW
BEGIN
INSERT INTO log_insert_user (uuid, username, password, role, created_at, updated_at)
VALUES (NEW.uuid, NEW.username, NEW.password, NEW.role, NOW(), NOW());
END;
//

-- Log Update User
DELIMITER//
CREATE TRIGGER log_update_user
AFTER UPDATE on user
FOR EACH ROW
BEGIN
INSERT INTO log_update_user (uuid, username, password, role, created_at, updated_at)
VALUES (OLD.uuid, NEW.username, NEW.password, OLD.role, NOW(), NOW());
END;
//

-- Log Delete User
DELIMITER//
CREATE TRIGGER log_delete_user
AFTER DELETE on user
FOR EACH ROW
BEGIN
INSERT INTO log_update_user (uuid, username, password, role, created_at, updated_at)
VALUES (OLD.uuid, OLD.username, OLD.password, OLD.role, NOW(), NOW());
END;
//
