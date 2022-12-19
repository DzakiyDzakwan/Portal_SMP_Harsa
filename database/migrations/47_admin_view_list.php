<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::unprepared('
        CREATE VIEW list_admin AS
        SELECT uuid, username, role, created_at F
        FROM users 
        WHERE deleted_at IS NULL;
        ');

        DB::unprepared('
        CREATE VIEW list_inactive_admin AS
        SELECT uuid, username, deleted_at 
        FROM users 
        WHERE deleted_at IS NOT NULL;
        ');

        DB::unprepared('
        CREATE VIEW list_siswa AS
        SELECT s.nisn, p.nama, DATE_FORMAT(s.tanggal_masuk, "%d %M %Y") AS tanggal_masuk, s.status  
        FROM siswas AS s 
        JOIN users AS u ON s.user = u.uuid 
        JOIN user_profiles AS p ON u.uuid = p.user;
        ');

        DB::unprepared('
        CREATE VIEW info_siswa AS
        SELECT  p.foto, p.nama, p.email, s.NISN, s.NIS, IF(p.jenis_kelamin = "LK", "Pria", "Wanita" ) AS jenis_kelamin, k.nama_kelas AS kelas, DATE_FORMAT(s.tanggal_masuk, "%d %M %Y") AS tanggal_masuk, s.status, p.tempat_lahir, DATE_FORMAT(p.tgl_lahir, "%d %M %Y") AS tanggal_lahir, p.alamat_tinggal, p.alamat_domisili, s.anak_ke, s.telepon_orangtua, s.alamat_orangtua, s.nama_ayah, s.pekerjaan_ayah, s.nama_ibu, s.pekerjaan_ibu, s.telepon_wali, s.nama_wali, s.pekerjaan_wali 
        FROM siswas AS s 
        JOIN users AS u ON s.user = u.uuid 
        JOIN user_profiles AS p ON u.uuid = p.user 
        JOIN kelas AS k ON s.kelas = k.kelas_id
        ');

        DB::unprepared('
        CREATE VIEW list_guru AS
        SELECT g.nip, p.nama, g.jabatan, g.status 
        FROM `gurus` AS g 
        JOIN user_profiles AS p ON g.user = p.user;
        ');

        DB::unprepared('
        CREATE VIEW info_guru AS
        SELECT p.nama, p.email, g.nip, g.jabatan, IF(p.jenis_kelamin = "LK", "Pria", "Wanita" ) AS jenis_kelamin, DATE_FORMAT(g.tanggal_masuk, "%d %M %Y") AS tanggal_masuk, g.status, masa_mengajar(g.tanggal_masuk), g.pendidikan, g.tahun_ijazah, g.status_perkawinan, p.alamat_tinggal, p.alamat_domisili, p.tempat_lahir, DATE_FORMAT(p.tgl_lahir, "%d %M %Y") AS tanggal_lahir, umur(p.tgl_lahir) AS umur 
        FROM `gurus` AS g 
        JOIN users AS u ON g.user = u.uuid 
        JOIN user_profiles AS p ON u.uuid = p.user;
        ');

        DB::unprepared('
        CREATE VIEW calon_wali_kelas AS
        SELECT g.NIP, p.nama 
        FROM gurus AS g
        JOIN user_profiles AS p ON p.user = g.user
        WHERE is_wali_kelas = "tidak";
        ');

        DB::unprepared('
        CREATE VIEW list_kelas AS
        SELECT kelas.kelas_id, kelas.nama_kelas, kelas.grade, kelas.kelompok_kelas, gurus.NIP, user_profiles.nama AS Wali_Kelas, COUNT(siswas.NIS) AS jumlah
        FROM kelas
        LEFT JOIN gurus ON kelas.wali_kelas = gurus.NIP 
        LEFT JOIN users ON gurus.user = users.uuid
        INNER JOIN user_profiles ON users.uuid = user_profiles.user
        LEFT JOIN siswas ON kelas.kelas_id = siswas.kelas
        GROUP BY kelas.kelas_id;
        ');

        DB::unprepared('
        CREATE VIEW list_inactive_kelas AS
        SELECT kelas_id, nama_kelas, deleted_at 
        FROM kelas WHERE deleted_at IS NOT NULL;
        ');

        DB::unprepared('
        CREATE VIEW list_mapel AS
        SELECT mapel_id, nama_mapel, kelompok_mapel, kurikulum 
        FROM mapels WHERE deleted_at IS NULL;
        ');

        DB::unprepared('
        CREATE VIEW list_inactive_mapel AS
        SELECT mapel_id, nama_mapel, deleted_at FROM mapels WHERE deleted_at IS NOT NULL;
        ');

        DB::unprepared('
        CREATE VIEW list_mapel_guru AS
        SELECT mg.mapel_guru_id, p.nama, m.nama_mapel, m.kelompok_mapel 
        FROM mapel_gurus AS mg 
        JOIN gurus AS g ON g.NIP = mg.guru 
        JOIN mapels AS m ON mg.mapel = m.mapel_id 
        JOIN user_profiles AS p ON g.user = p.user;
        ');

        DB::unprepared('
        CREATE VIEW list_roster_kelas AS
        SELECT r.roster_id AS id, m.nama_mapel, p.nama, k.kelas_id, k.nama_kelas, TIME_FORMAT(r.waktu_mulai, "%H:%i") AS waktu_mulai, TIME_FORMAT(waktu_akhir(r.waktu_mulai, r.durasi), "%H:%i") AS waktu_akhir, SEC_TO_TIME(r.durasi*60) AS durasi, r.hari
        FROM roster_kelas AS r
        JOIN mapel_gurus AS mg ON r.mapel = mg.mapel_guru_id
        JOIN gurus AS g ON g.NIP = mg.guru 
        JOIN mapels AS m ON mg.mapel = m.mapel_id 
        JOIN user_profiles AS p ON g.user = p.user
        JOIN kelas AS k ON r.kelas = k.kelas_id
        ORDER BY r.hari;
        ');

        DB::unprepared('
        CREATE VIEW list_kelas_guru AS
        SELECT mg.guru, k.kelas_id, k.nama_kelas, m.nama_mapel
        FROM roster_kelas AS r
        JOIN mapel_gurus AS mg ON r.mapel = mg.mapel_guru_id
        JOIN mapels AS m ON mg.mapel = m.mapel_id
        JOIN kelas AS k ON r.kelas = k.kelas_id
        GROUP BY r.mapel, r.kelas;
        ');

        DB::unprepared('
        CREATE VIEW list_sesi_penilaian AS
        SELECT sesi_id, nama_sesi, tahun_ajaran, DATE_FORMAT(tanggal_mulai, "%d %M %Y %H:%i:%s") AS waktu_mulai, DATE_FORMAT(tanggal_berakhir, "%d %M %Y %H:%i:%s") AS waktu_selesai, TIMESTAMPDIFF(DAY, tanggal_mulai, tanggal_berakhir) AS jumlah_hari, created_by AS admin , IF(cek_sesi(tanggal_mulai, tanggal_berakhir) = 1 , "Aktif", "Inaktif") AS status 
        FROM sesi_penilaians
        ORDER BY status;
        ');

        DB::unprepared('
        CREATE VIEW list_nilai AS
        SELECT n.nilai_id, p.nama AS siswa, m.nama_mapel, n.nilai_pengetahuan, n.nilai_keterampilan, sp.nama_sesi AS sesi, g.NIP AS guru, n.status 
        FROM nilais AS n
        JOIN sesi_penilaians AS sp ON n.sesi = sp.sesi_id
        JOIN kontrak_semesters AS k ON n.kontrak_siswa = k.kontrak_semester_id
        JOIN siswas AS s ON k.siswa = s.NISN
        JOIN user_profiles AS p ON p.user = s.user
        JOIN gurus AS g ON n.guru = g.NIP
        JOIN mapels AS m ON m.mapel_id = n.mapel
        WHERE n.status <> "pending"
        ORDER BY n.mapel;
        ');

        DB::unprepared('
        CREATE VIEW list_nilai_pending AS
        SELECT n.nilai_id, p.nama AS siswa, m.nama_mapel, n.nilai_pengetahuan, n.nilai_keterampilan, sp.nama_sesi AS sesi, g.NIP AS guru, n.status 
        FROM nilais AS n
        JOIN sesi_penilaians AS sp ON n.sesi = sp.sesi_id
        JOIN kontrak_semesters AS k ON n.kontrak_siswa = k.kontrak_semester_id
        JOIN siswas AS s ON k.siswa = s.NISN
        JOIN user_profiles AS p ON p.user = s.user
        JOIN gurus AS g ON n.guru = g.NIP
        JOIN mapels AS m ON m.mapel_id = n.mapel
        WHERE n.status = "pending"
        ORDER BY n.mapel;
        ');

        DB::unprepared('
        CREATE VIEW list_prestasi AS
        SELECT p.keterangan, p.jenis_prestasi, DATE_FORMAT(p.tanggal_prestasi, "%d %M %Y") AS tanggal_prestasi, ktk.grade AS kelas
        FROM prestasis AS p
        JOIN siswas AS s ON p.siswa = s.NISN
        JOIN kontrak_semesters AS ktk ON ktk.siswa = s.NISN;

        ');

        DB::unprepared('
        CREATE VIEW list_ekstrakurikuler AS
        SELECT ekstrakurikuler_id AS id, nama, hari, TIME_FORMAT(waktu_mulai, "%H:%i") AS waktu_mulai, waktu_akhir(waktu_mulai, durasi) AS waktu_akhir, SEC_TO_TIME(durasi*60) AS durasi, tempat, kelas 
        FROM ekstrakurikulers;
        ');

        DB::unprepared('
        CREATE VIEW table_log_activities AS 
        SELECT * FROM log_activities
        ');
        DB::unprepared('
        CREATE VIEW table_log_users AS 
        SELECT * FROM log_users
        ');


        DB::unprepared('
        CREATE VIEW table_log_siswas AS 
        SELECT * FROM log_siswas
        ');
        DB::unprepared('
        CREATE VIEW table_log_gurus AS 
        SELECT * FROM log_gurus
        ');

        DB::unprepared('
        CREATE VIEW table_log_mapels AS 
        SELECT * FROM log_mapels
        ');

        DB::unprepared('
        CREATE VIEW table_log_kelas AS
        SELECT log_kelas.kelas_id, user_profiles.nama AS wali_kelas, log_kelas.grade, log_kelas.kelompok_kelas, log_kelas.nama_kelas, log_kelas.action, log_kelas.created_at
        FROM log_kelas
        LEFT JOIN gurus ON log_kelas.wali_kelas = gurus.NIP
        LEFT JOIN users ON users.uuid = gurus.user
        LEFT JOIN user_profiles ON user_profiles.user = users.uuid
        GROUP BY log_kelas.kelas_id, user_profiles.nama, log_kelas.grade, log_kelas.kelompok_kelas, log_kelas.nama_kelas, log_kelas.action, log_kelas.created_at
        ');

        DB::unprepared('
        CREATE VIEW table_log_ekstrakurikulers AS 
        SELECT * FROM log_ekstrakurikulers
        ');

        DB::unprepared('
        CREATE VIEW table_log_roster AS
        SELECT r.roster_id AS id, m.nama_mapel, p.nama, k.nama_kelas, TIME_FORMAT(r.waktu_mulai, "%H:%i") AS waktu_mulai, waktu_akhir(r.waktu_mulai, r.durasi) AS waktu_akhir, SEC_TO_TIME(r.durasi*60) AS durasi, r.hari, r.created_at
        FROM roster_kelas AS r
        JOIN mapel_gurus AS mg ON r.mapel = mg.mapel_guru_id
        JOIN gurus AS g ON g.NIP = mg.guru 
        JOIN mapels AS m ON mg.mapel = m.mapel_id 
        JOIN user_profiles AS p ON g.user = p.user
        JOIN kelas AS k ON r.kelas = k.kelas_id;
        ');

        DB::unprepared('
        CREATE VIEW table_log_profiles AS 
        SELECT * FROM user_profiles
        ');

        DB::unprepared('
        CREATE VIEW table_log_nilai AS
        SELECT n.nilai_id, p.nama AS siswa, m.nama_mapel, n.nilai_pengetahuan, n.nilai_keterampilan, sp.nama_sesi AS sesi, g.NIP AS guru, n.status, n.created_at
        FROM nilais AS n
        JOIN sesi_penilaians AS sp ON n.sesi = sp.sesi_id
        JOIN kontrak_semesters AS k ON n.kontrak_siswa = k.kontrak_semester_id
        JOIN siswas AS s ON k.siswa = s.NISN
        JOIN user_profiles AS p ON p.user = s.user
        JOIN gurus AS g ON n.guru = g.NIP
        JOIN mapels AS m ON m.mapel_id = n.mapel
        ORDER BY n.mapel;
        ');

        DB::unprepared('
        CREATE VIEW table_log_prestasi AS
        SELECT up.nama, p.siswa, p.jenis_prestasi, p.keterangan, p.tanggal_prestasi, p.created_at
        FROM prestasis AS p JOIN siswas AS s ON p.siswa = s.NISN
        JOIN user_profiles AS up ON s.user = up.user
        GROUP BY up.nama, p.siswa, p.jenis_prestasi, p.keterangan, p.tanggal_prestasi, p.created_at;
        ');
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW list_admin');
        DB::unprepared('DROP VIEW list_inactive_admin');
        DB::unprepared('DROP VIEW list_siswa');
        DB::unprepared('DROP VIEW info_siswa');
        DB::unprepared('DROP VIEW list_guru');
        DB::unprepared('DROP VIEW info_guru');
        DB::unprepared('DROP VIEW calon_wali_kelas');
        DB::unprepared('DROP VIEW list_kelas');
        DB::unprepared('DROP VIEW list_inactive_kelas');
        DB::unprepared('DROP VIEW list_mapel');
        DB::unprepared('DROP VIEW list_mapel_guru');
        DB::unprepared('DROP VIEW list_inactive_mapel');
        DB::unprepared('DROP VIEW list_roster_kelas');
        DB::unprepared('DROP VIEW list_kelas_guru');
        DB::unprepared('DROP VIEW list_sesi_penilaian');
        DB::unprepared('DROP VIEW list_nilai');
        DB::unprepared('DROP VIEW list_nilai_pending');
        DB::unprepared('DROP VIEW list_prestasi');
        DB::unprepared('DROP VIEW list_ekstrakurikuler');
        DB::unprepared('DROP VIEW table_log_activities');
        DB::unprepared('DROP VIEW table_log_users');
        DB::unprepared('DROP VIEW table_log_siswas');
        DB::unprepared('DROP VIEW table_log_gurus');
        DB::unprepared('DROP VIEW table_log_mapels');
        DB::unprepared('DROP VIEW table_log_kelas');
        DB::unprepared('DROP VIEW table_log_ekstrakurikulers');
        DB::unprepared('DROP VIEW table_log_roster');
        DB::unprepared('DROP VIEW table_log_profiles');
        DB::unprepared('DROP VIEW table_log_nilai');
        DB::unprepared('DROP VIEW table_log_prestasi');
    }
};
