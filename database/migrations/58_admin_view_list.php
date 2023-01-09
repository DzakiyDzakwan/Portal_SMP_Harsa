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

        /* DB::unprepared('
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
        ');*/

        DB::unprepared('
        CREATE VIEW list_guru_active AS
        SELECT gurus.NUPTK, gurus.jabatan, gurus.status, gurus.user, user_profiles.nama
        FROM gurus
        LEFT JOIN users ON users.uuid = gurus.user
        LEFT JOIN user_profiles ON user_profiles.user = users.uuid
        WHERE gurus.jabatan = "guru" AND gurus.status = "aktif"
        ORDER BY gurus.created_at DESC
        ');

        DB::unprepared('
        CREATE VIEW list_guru_inactive AS
        SELECT gurus.NUPTK, gurus.jabatan, gurus.status, gurus.user, user_profiles.nama
        FROM gurus
        LEFT JOIN users ON users.uuid = gurus.user
        LEFT JOIN user_profiles ON user_profiles.user = users.uuid
        WHERE gurus.jabatan = "guru" AND gurus.status = "inaktif"
        ORDER BY gurus.created_at DESC
        ');

        /* DB::unprepared('
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
        '); */

        DB::unprepared('
        CREATE VIEW list_tahun_ajaran AS
        SELECT tahun_ajaran_id AS id , tahun_ajaran, semester, DATE_FORMAT(tanggal_mulai, "%d %M %Y") AS tanggal_mulai, DATE_FORMAT(tanggal_berakhir, "%d %M %Y") AS tanggal_berakhir, time_status(tanggal_mulai, tanggal_berakhir) AS status
        FROM tahun_ajarans
        ORDER BY status;
        ');

        // DB::unprepared('
        // CREATE VIEW list_kelas AS
        // SELECT kelas.kelas_id, kelas.nama_kelas, kelas.grade, kelas.kelompok_kelas, gurus.NUPTK, user_profiles.nama AS 		Wali_Kelas, COUNT(siswas.NIS) AS jumlah
        // FROM kelas
        // LEFT JOIN gurus ON kelas.wali_kelas = gurus.NUPTK
        // LEFT JOIN users ON gurus.user = users.uuid
        // LEFT JOIN user_profiles ON users.uuid = user_profiles.user
        // LEFT JOIN kontrak_semesters ON kontrak_semesters.kelas = kelas.kelas_id
        // LEFT JOIN siswas ON kontrak_semesters.siswa = siswas.NISN
        // GROUP BY kelas.kelas_id;
        // ');

        // DB::unprepared('
        // CREATE VIEW list_inactive_kelas AS
        // SELECT kelas_id, nama_kelas, deleted_at 
        // FROM kelas WHERE deleted_at IS NOT NULL;
        // ');

        DB::unprepared('
        CREATE VIEW list_kelas_aktif AS
        SELECT kelas_aktifs.kelas_aktif_id, kelas_aktifs.nama_kelas_aktif, kelas.grade, kelas.kelompok_kelas,  kelas_aktifs.tahun_ajaran_aktif, gurus.NUPTK, user_profiles.nama AS wali_kelas, COUNT(siswas.NIS) AS jumlah_siswa
        FROM kelas_aktifs
        LEFT JOIN kelas ON kelas.kelas_id = kelas_aktifs.kelas
        LEFT JOIN gurus ON gurus.NUPTK = kelas_aktifs.wali_kelas
        LEFT JOIN user_profiles ON user_profiles.user = gurus.user
        LEFT JOIN kontrak_semesters ON kontrak_semesters.kelas = kelas_aktifs.kelas_aktif_id
        LEFT JOIN siswas ON kontrak_semesters.siswa = siswas.NISN
        GROUP BY kelas_aktifs.kelas_aktif_id
        ');
        // DB::unprepared('
        // CREATE VIEW list_assign_wali AS
        // SELECT
        // `model_has_roles`.`model_id`,
        // `model_has_roles`.`role_id`,
        // `gurus`.`USER`,
        // `gurus`.`NUPTK`,
        // `gurus`.`jabatan`,
        // `gurus`.`status`,
        // `user_profiles`.`nama`
        // FROM
        // `users`
        // INNER JOIN `gurus` ON `gurus`.`USER` = `users`.`uuid`
        // INNER JOIN `user_profiles` ON `users`.`uuid` = `user_profiles`.`USER`
        // LEFT JOIN `model_has_roles` ON `model_has_roles`.`model_id` = `user_profiles`.`user`
        // WHERE role_id != "5" ;
        // ');

        DB::unprepared('
        CREATE VIEW list_mapel AS
        SELECT mapel_id, nama_mapel, kelompok_mapel, kkm, kurikulum
        FROM mapels WHERE deleted_at IS NULL;
        ');

        DB::unprepared('
        CREATE VIEW list_inactive_mapel AS
        SELECT mapel_id, nama_mapel, kelompok_mapel, kkm, kurikulum, deleted_at FROM mapels WHERE deleted_at IS NOT NULL;
        ');

        DB::unprepared('
        CREATE VIEW list_mapel_guru AS
        SELECT mg.mapel_guru_id, p.nama, m.nama_mapel, m.kelompok_mapel 
        FROM mapel_gurus AS mg 
        JOIN gurus AS g ON g.NUPTK = mg.guru 
        JOIN mapels AS m ON mg.mapel = m.mapel_id 
        JOIN user_profiles AS p ON g.user = p.user;
        ');

        DB::unprepared('
        CREATE VIEW list_roster AS 
        SELECT r.roster_id AS id, m.nama_mapel, p.nama, k.kelas_aktif_id, k.nama_kelas_aktif, r.tahun_ajaran_aktif, r.semester_aktif, TIME_FORMAT(r.waktu_mulai, "%H:%i") AS waktu_mulai, TIME_FORMAT(r.waktu_akhir, "%H:%i") AS waktu_akhir, durasi(r.waktu_mulai, r.waktu_akhir) AS durasi, r.hari
        FROM rosters AS r
        JOIN mapel_gurus AS mg ON r.mapel_guru = mg.mapel_guru_id
        JOIN gurus AS g ON g.NUPTK = mg.guru 
        JOIN mapels AS m ON mg.mapel = m.mapel_id 
        JOIN user_profiles AS p ON g.user = p.user
        JOIN kelas_aktifs AS k ON r.kelas = k.kelas_aktif_id
        ORDER BY r.kelas, r.waktu_mulai, r.hari;
        ');

        /* DB::unprepared('
        CREATE VIEW list_roster_kelas AS
        SELECT r.roster_id AS id, m.nama_mapel, p.nama, k.kelas_id, k.nama_kelas, TIME_FORMAT(r.waktu_mulai, "%H:%i") AS waktu_mulai, TIME_FORMAT(waktu_akhir(r.waktu_mulai, r.durasi), "%H:%i") AS waktu_akhir, SEC_TO_TIME(r.durasi*60) AS durasi, r.hari
        FROM roster_kelas AS r
        JOIN mapel_gurus AS mg ON r.mapel = mg.mapel_guru_id
        JOIN gurus AS g ON g.NIP = mg.guru 
        JOIN mapels AS m ON mg.mapel = m.mapel_id 
        JOIN user_profiles AS p ON g.user = p.user
        JOIN kelas AS k ON r.kelas = k.kelas_id
        ORDER BY r.hari;
        '); */

        DB::unprepared('
        CREATE VIEW list_kelas_guru AS
        SELECT r.tahun_ajaran_aktif, mg.guru, r.kelas, ka.nama_kelas_aktif, k.grade, k.kelompok_kelas, m.mapel_id, m.nama_mapel
        FROM rosters AS r
        JOIN mapel_gurus AS mg ON r.mapel_guru = mg.mapel_guru_id
        JOIN mapels AS m ON mg.mapel = m.mapel_id
        JOIN kelas_aktifs AS ka ON ka.kelas_aktif_id = r.kelas
        JOIN kelas AS k ON ka.kelas = k.kelas_id
        GROUP BY r.mapel_guru, r.kelas;
        ');

        DB::unprepared('
        CREATE VIEW list_sesi_penilaian AS
        SELECT sesi_id AS id , nama_sesi, tahun_ajaran_aktif, semester_aktif, DATE_FORMAT(tanggal_mulai, "%d %M %Y") AS tanggal_mulai, DATE_FORMAT(tanggal_berakhir, "%d %M %Y") AS tanggal_berakhir, TIMESTAMPDIFF(DAY, tanggal_mulai, tanggal_berakhir) AS jumlah_hari, time_status(tanggal_mulai, tanggal_berakhir) AS status
        FROM sesi_penilaians
        ORDER BY status;
        ');

        /* DB::unprepared('
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
        '); */

        DB::unprepared('
        CREATE VIEW list_nilai_pending AS
        SELECT n.nilai_id, p.nama AS siswa, m.nama_mapel, n.nilai_pengetahuan, n.nilai_keterampilan, sp.nama_sesi AS sesi, g.NUPTK AS guru, n.status 
        FROM nilais AS n
        JOIN sesi_penilaians AS sp ON n.sesi = sp.sesi_id
        JOIN kontrak_semesters AS k ON n.kontrak_siswa = k.kontrak_semester_id
        JOIN siswas AS s ON k.siswa = s.NISN
        JOIN user_profiles AS p ON p.user = s.user
        JOIN gurus AS g ON n.guru = g.NUPTK
        JOIN mapels AS m ON m.mapel_id = n.mapel
        WHERE n.status = "pending"
        ORDER BY n.mapel;
        ');

        /* DB::unprepared('
        CREATE VIEW list_prestasi AS
        SELECT p.keterangan, p.jenis_prestasi, DATE_FORMAT(p.tanggal_prestasi, "%d %M %Y") AS tanggal_prestasi, ktk.grade AS kelas
        FROM prestasis AS p
        JOIN siswas AS s ON p.siswa = s.NISN
        JOIN kontrak_semesters AS ktk ON ktk.siswa = s.NISN;

        '); */

        DB::unprepared('
        CREATE VIEW list_ekstrakurikuler AS
        SELECT ekstrakurikuler_id AS id, nama, hari, TIME_FORMAT(waktu_mulai, "%H:%i") AS waktu_mulai, TIME_FORMAT(waktu_akhir, "%H:%i") AS waktu_akhir, tempat, kelas 
        FROM ekstrakurikulers;
        ');

        DB::unprepared('
        CREATE VIEW list_ekstrakurikuler_siswa AS
        SELECT es.ekstrakurikuler_siswa_id AS id, e.nama AS nama_ekskul, u.nama AS nama_siswa, es.tahun_ajaran_aktif AS tahun_ajaran, n.nilai AS nilai_ekskul
        FROM ekstrakurikuler_siswas as es
        JOIN ekstrakurikulers AS e ON es.ekstrakurikuler = e.ekstrakurikuler_id
        JOIN siswas as s ON es.siswa = s.NISN
        JOIN user_profiles as u ON s.user = u.user
        JOIN kontrak_semesters as k ON es.siswa =  k.siswa
        JOIN nilai_ekstrakurikulers as n ON k.kontrak_semester_id = n.kontrak_siswa ;
        ');
        DB::unprepared('
        CREATE VIEW list_pembina_ekstrakurikuler AS
        SELECT e.ekstrakurikuler_id AS id, e.nama AS ekskul, g.NUPTK, u.nama AS guru
        FROM ekstrakurikulers as e
        JOIN gurus as g ON e.penanggung_jawab = g.NUPTK
        JOIN user_profiles as u ON g.user = u.user;
        ');

        DB::unprepared('
        CREATE VIEW list_siswa_kelas AS
        SELECT s.NISN, k.kontrak_semester_id, p.nama, k.semester_aktif, k.kelas 
        FROM siswas AS s
        JOIN user_profiles AS p ON s.user = p.user
        JOIN kontrak_semesters AS k ON s.NISN = k.siswa 
        WHERE k.status = "ongoing"
        ORDER BY p.nama;
        ');

        /* DB::unprepared('
        CREATE VIEW list_roster_siswa AS
        SELECT r.kelas, m.nama_mapel, TIME_FORMAT(r.waktu_mulai, "%H:%i") AS waktu_mulai, TIME_FORMAT(waktu_akhir(r.waktu_mulai, r.durasi), "%H:%i") AS waktu_akhir, r.hari
        FROM roster_kelas AS r
        JOIN mapel_gurus AS mg ON mg.mapel_guru_id = r.mapel
        JOIN mapels AS m ON m.mapel_id = mg.mapel
        '); */

        DB::unprepared('
        CREATE VIEW rapor_nilai_pengetahuan AS
        SELECT n.jenis, n.kontrak_siswa, k.siswa, m.kelompok_mapel, m.nama_mapel, n.kkm_aktif, n.nilai_pengetahuan, n.deskripsi_pengetahuan, indeks(n.kkm_aktif, n.nilai_pengetahuan) AS indeks
        FROM nilais AS n 
        JOIN mapels AS m ON n.mapel = m.mapel_id
        JOIN kontrak_semesters AS k ON n.kontrak_siswa = k.kontrak_semester_id
        WHERE n.status = "confirmed" AND n.jenis = "uh1" OR n.jenis = "uh2" OR n.jenis = "uh3"
        ');

        DB::unprepared('
        CREATE VIEW rapor_nilai_keterampilan AS
        SELECT n.jenis, n.kontrak_siswa, k.siswa, m.kelompok_mapel, m.nama_mapel, n.kkm_aktif, n.nilai_keterampilan, n.deskripsi_keterampilan, indeks(n.kkm_aktif, n.nilai_keterampilan) AS indeks  
        FROM nilais AS n
        JOIN mapels AS m ON n.mapel = m.mapel_id
        JOIN kontrak_semesters AS k ON n.kontrak_siswa = k.kontrak_semester_id
        WHERE n.status = "confirmed" AND n.jenis = "uh1" OR n.jenis = "uh2" OR n.jenis = "uh3"
        ');

        /* DB::unprepared('
        CREATE VIEW detail_kelas AS
        SELECT kelas.kelas_id, kelas.nama_kelas, kelas.grade, kelas.kelompok_kelas, user_profiles.jenis_kelamin, SUM(if(user_profiles.jenis_kelamin = "PR", 1, 0)) AS jumlah_PR, SUM(if(user_profiles.jenis_kelamin = "LK", 1, 0)) AS jumlah_LK
        FROM kelas
        LEFT JOIN siswas ON kelas.kelas_id = siswas.kelas 
        LEFT JOIN users ON siswas.user = users.uuid
        INNER JOIN user_profiles ON users.uuid = user_profiles.user
        GROUP BY kelas.kelas_id;
        '); */
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // DB::unprepared('DROP VIEW list_admin');
        // DB::unprepared('DROP VIEW list_inactive_admin');
        // DB::unprepared('DROP VIEW list_siswa');
        // DB::unprepared('DROP VIEW info_siswa');
        DB::unprepared('DROP VIEW list_guru');
        // DB::unprepared('DROP VIEW info_guru');
        // DB::unprepared('DROP VIEW calon_wali_kelas');
        DB::unprepared('DROP VIEW list_tahun_ajaran');
        DB::unprepared('DROP VIEW list_kelas');
        DB::unprepared('DROP VIEW list_roster');
        // DB::unprepared('DROP VIEW list_inactive_kelas');
        // DB::unprepared('DROP VIEW list_mapel');
        // DB::unprepared('DROP VIEW list_mapel_guru');
        // DB::unprepared('DROP VIEW list_inactive_mapel');
        // DB::unprepared('DROP VIEW list_roster_kelas');
        DB::unprepared('DROP VIEW list_kelas_guru');
        // DB::unprepared('DROP VIEW list_sesi_penilaian');
        // DB::unprepared('DROP VIEW list_nilai');
        // DB::unprepared('DROP VIEW detail_kelas');
        // DB::unprepared('DROP VIEW list_nilai_pending');
        // DB::unprepared('DROP VIEW list_prestasi');
        // DB::unprepared('DROP VIEW list_ekstrakurikuler');
        DB::unprepared('DROP VIEW list_siswa_kelas');
    }
};
