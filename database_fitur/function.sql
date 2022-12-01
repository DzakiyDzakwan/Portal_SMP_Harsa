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

--Function Indeks Rapot--
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
    DECLARE tahun_sekarang, tahun_masuk INT
    SET tahun_sekarang = YEAR(now());
    SET tahun_masuk = YEAR(tanggal_masuk);
    RETURN(tahun_sekarang-tahun_masuk);
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
    DECLARE tahun_sekarang, tahun_lahir INT
    SET tahun_sekarang = YEAR(now());
    SET tahun_lahir = YEAR(tanggal_lahir);
    RETURN(tahun_sekarang - tahun_lahir);
END?
DELIMITER ;