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
