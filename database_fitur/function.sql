--Indeks--
/* Stored Function untuk mendapatkan indeks penilaian siswa */
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

--Masa Mengajar--
/* Stored Function untuk mendapatkan lama bekerja guru di sekolah */
DELIMTER ?
CREATE function masa_mengajar(
    tanggal_masuk DATE
)
RETURNS INT
BEGIN
    RETURN(DATEDIFF(NOW(), tanggal_masuk));
END?
DELIMITER ;

--Umur--
/* Stored Function untuk mendapatkan umur user */
DELIMTER ?
CREATE function umur(
    tgl_lahir DATE
)
RETURNS INT
BEGIN
    DECLARE umur INT;
    SET umur = YEAR(curdate())-YEAR(tgl_lahir) - (RIGHT(curdate(),5) < RIGHT(tgl_lahir,5));
    RETURN(umur);
END?
DELIMITER ;

DELIMITER ?
CREATE FUNCTION waktu_akhir(
    waktu_awal TIME,
    durasi INT 
)
RETURNS TIME
BEGIN
    DECLARE waktu_akhir TIME;
    SET waktu_akhir = ADDTIME(waktu_awal, SEC_TO_TIME(durasi*60));
RETURN (waktu_akhir);
END?
DELIMITER ;


--time status--
/* Function untuk menentukan status dari tahun ajaran dan sesi penilaian */
DELIMITER ?
CREATE FUNCTION time_status(
    start DATETIME,
    end DATETIME
)
RETURNS CHAR(7)
BEGIN
    DECLARE status CHAR(7);
    IF start > NOW()
        SET status = "inaktif";
    ELSE IF start < NOW() AND end > NOW() THEN
        SET status = "aktif";
    ELSE
        SET status = "selesai";
    END IF;
    RETURN(status);
END?
DELIMITER;

--get Sesi Aktif--
DELIMITER ?
CREATE FUNCTION sesi_aktif(
    waktu_awal DATETIME,
    waktu_akhir DATETIME
)
RETURNS INT
BEGIN
    DECLARE id INT;
    SELECT sesi_id INTO id WHERE cek_sesi(waktu_awal, waktu_akhir) = 1;
    RETURN(id);
END?
DELIMITER;

--Cek Nilai Tersedia--
/* Stored Function untuk memeriksa nilai yang tersedia */
/* DELIMITER ?
CREATE FUNCTION is_nilai_exists(
    sesi INT,
    mapel CHAR(3),
    kontrak INT,
    jenis CHAR(3)
)
RETURNS INT
BEGIN
    RETURN (SELECT EXISTS(SELECT 1 FROM nilais WHERE sesi = sesi AND mapel = mapel AND kontrak_siswa = kontrak AND jenis= jenis));
END?
DELIMITER ; */


--Function Nilai Rapot Tengah Semester--
/* Stored Function untuk mendapatkan nilai rapot tengah semester siswa */
DELIMTER ?
CREATE function nilai_uts(
    ph1 FLOAT,
    ph2 FLOAT,
    ph3 FLOAT,
    uts FLOAT
)
RETURNS FLOAT
BEGIN
    DECLARE nilai FLOAT;
    SET nilai = FLOOR((ph1 + ph2 + ph3 + uts)/4);
    RETURN (nilai);
END?
DELIMITER ;

--Function Nilai Rapot Semester--
/* Stored Function untuk mendapatkan nilai rapot semester siswa */
DELIMTER ?
CREATE function nilai_uas(
    ph1 FLOAT,
    ph2 FLOAT,
    ph3 FLOAT,
    uts FLOAT,
    uas FLOAT
)
RETURNS FLOAT
BEGIN
    DECLARE nilai FLOAT;
    DECLARE rts FLOAT;
    SELECT nilai_uts(ph1, ph2, ph3, uts) INTO rts;
    SET nilai = FLOOR((rts + uas)/2);
    RETURN (nilai);
END?
DELIMITER ;