<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Login
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'role:kepsek|wakepsek|admin|guru', 'ceklevel']], function(){

    Route::get('/guru/dashboard', [DashboardController::class, 'indexguru'])->name('dashboardGuru');
    Route::get('/profil-guru', [ProfilController::class, 'profilGuru'])->name('profilGuru');
    Route::get('/edit-profil-guru/{id}/edit', [ProfilController::class, 'editProfilGuru'])->name('editProfilGuru');
    Route::put('/edit-profil-guru', [ProfilController::class, 'updateProfilGuru'])->name('updateProfilGuru');

    //Kepala Sekolah
    Route::group(['middleware'=> ['role:kepsek']], function(){
        //Log-Activity
        Route::get('/guru/log-activities', [LogController::class, 'activity'])->name('log-activities');
        //Log-Users
        Route::get('/guru/log-users', [LogController::class, 'user'])->name('log-user');
        //Log-Profile
        Route::get('/guru/log-profiles', [LogController::class, 'profiles'])->name('log-profiles');
        //Log-Siswa
        Route::get('/guru/log-siswa', [LogController::class, 'siswa'])->name('log-siswa');
        //Log-Prestasi
        Route::get('/guru/log-prestasi', [LogController::class, 'prestasi'])->name('log-prestasi');
        //Log-Nilai
        Route::get('/guru/log-nilai', [LogController::class, 'nilai'])->name('log-nilai');
        //Log-Guru
        Route::get('/guru/log-guru', [LogController::class, 'guru'])->name('log-guru');
        //Log-Kelas
        Route::get('/guru/log-kelas', [LogController::class, 'kelas'])->name('log-kelas');
        //Log-Mapel
        Route::get('/guru/log-mapel', [LogController::class, 'mapel'])->name('log-mapel');
        //Log-Ekstrakurikuler
        Route::get('/guru/log-ekstrakulikuler', [LogController::class, 'ekskul'])->name('log-ekskul');
        //Log-Roster
        Route::get('/guru/log-roster', [LogController::class, 'roster'])->name('log-roster');
        //Log-Ekstrakurikuler-Siswa
        Route::get('/guru/log-ekstrakurikuler-siswa', [LogController::class, 'ekskulSiswa'])->name('log-ekskul-siswa');
        //Log-Kontrak
        Route::get('/guru/log-kontrak', [LogController::class, 'kontrak'])->name('log-kontrak');
    });

    //Wakil Kepala Sekolah
    Route::group(['middleware'=> ['role:kepsek|wakepsek']], function(){
        Route::controller(ViewController::class)->group(function(){
            Route::get('/guru/user', 'user')->name('user');
            Route::get('/guru/role', 'role')->name('role');
            Route::get('/guru/permission', 'permission')->name('permission');
            Route::get('/guru/admin', 'admin')->name('admin');
        });
    });

    //Admin
    Route::group(['middleware'=> ['role:kepsek|wakepsek|admin']], function(){
        Route::controller(ViewController::class)->group(function(){
            Route::get('/guru/guru', 'guru')->name('guru');
            Route::get('/guru/siswa', 'siswa')->name('siswa');
            Route::get('/guru/tahun-akademik', 'tahunAkademik')->name('tahun-akademik');
            Route::get('/guru/mata-pelajaran', 'mapel')->name('mata-pelajaran');
            Route::get('/guru/mata-pelajaran-guru', 'mapelGuru')->name('mata-pelajaran-guru');
            Route::get('/guru/kelas', 'kelas')->name('kelas');
            Route::get('/guru/roster', 'roster')->name('roster');
            Route::get('/guru/ekstrakurikuler', 'ekstrakurikuler')->name('ekstrakurikuler');
            Route::get('/guru/ekstrakurikuler-siswa', 'ekstrakurikulerSiswa')->name('ekstrakurikuler-siswa');
            Route::get('/guru/nilai-ekstrakurikuler', 'nilaiEkstrakurikuler')->name('nilai-ekstrakurikuler');
            Route::get('/guru/sesi-penilaian', 'sesiPenilaian')->name('sesi-penilaian');
            
        });
    });

    //Guru
    Route::group(['middleware'=> ['role:kepsek|wakepsek']], function(){
    });

    //Wali Kelas
    Route::group(['middleware'=> ['role:wali']], function(){
        Route::controller(ViewController::class)->group(function(){
            Route::get('/guru/kelas-saya', 'kelasSaya')->name('kelas-saya');           
        });
    });

});

Route::group(['middleware' => ['auth', 'role:siswa', 'ceklevel']], function(){
    Route::get('siswa/dashboard', [DashboardController::class, 'siswa'])->name('dashboardSiswa');
    Route::get('/profil-siswa', [siswa\ProfilController::class, 'profilSiswa'])->name('profilSiswa');
    Route::get('/edit-profil-siswa', [siswa\ProfilController::class, 'editProfilSiswa'])->name('editProfilSiswa');
    Route::get('/change-password', [ProfilController::class, 'changePassword'])->name('changePassword');
});

/* //Dashboard
Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    //Dashboard/Kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
    //Dashboard/Admin
    Route::get('/admin', [UserController::class, 'index'])->name('users');
    //Dashboard/Mapel
    Route::get('/mapel', [MapelController::class, 'index'])->name('mapel');
    //Dashboard/MapelGuru
    Route::get('/mapelguru', [MapelGuruController::class, 'index'])->name('mapelguru');
    //Dashboard/eskul
    Route::get('/ekstrakulikuler', [EkskulController::class, 'index'])->name('ekskul');
    //Dashboard/Siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
    //Dashboard/Guru
    Route::get('/guru', [GuruController::class, 'index'])->name('guru');
    //Dashboard/Roster
    Route::get('/roster', [RosterController::class, 'index'])->name('roster');
    //Dashboard/eskul
    Route::get('/penilaian', [NilaiController::class, 'index'])->name('nilai');
});

//Siswa
Route::group(['middleware' => ['auth', 'ceklevel:siswa']], function () {
    Route::get('/dashboard-siswa', [DashboardController::class, 'siswa'])->name('dashboardSiswa');
    //Profile-Siswa
    Route::get('/profil-siswa', [siswa\ProfilController::class, 'profilSiswa'])->name('profilSiswa');
    Route::get('/edit-profil-siswa', [siswa\ProfilController::class, 'editProfilSiswa'])->name('editProfilSiswa');
    Route::get('/change-password', [siswa\ProfilController::class, 'changePassword'])->name('changepassword');
    //Route::post('/edit-profil-siswa', [ProfilController::class, 'updateProfilSiswa'])->name('updateProfilSiswa');
    //Rapor
    Route::get('/rapor/{grade}', [siswa\RaporController::class,  'index'])->name('rapor');
    //Pilih rapor
    // Route::get('/pilih-rapor-ganjil-7', [siswa\RaporController::class, 'ganjil7'])->name('pilih-rapor-ganjil-7');
    // Route::get('/pilih-rapor-genap-7', [siswa\RaporController::class, 'genap7'])->name('pilih-rapor-genap-7');
    // Route::get('/rapor-bulanan', [siswa\RaporController::class, 'bulanan'])->name('rapor-bulanan');
    // Route::get('/rapor-semester', [siswa\RaporController::class, 'semester'])->name('rapor-semester');
    Route::get('/profil-siswa', [siswa\ProfilController::class, 'profilSiswa'])->name('profilSiswa');
    Route::get('/edit-profil-siswa', [siswa\ProfilController::class, 'editProfilSiswa'])->name('editProfilSiswa');
    Route::post('/edit-siswa', [ProfilController::class, 'updateProfilSiswa']);
});
//Guru
Route::group(['middleware' => ['auth', 'ceklevel:guru']], function () {
    Route::get('/dashboard-guru', [DashboardController::class, 'guru'])->name('dashboardGuru');
    //Direktori-Guru
    Route::get('/direktori-guru', [guru\direktoriController::class, 'direktori'])->name('direktoriGuru');
    //Profil-Guru
    Route::get('/profil-guru', [guru\ProfilController::class, 'profilGuru'])->name('profilGuru');
    Route::get('/edit-profil-guru/{id}/edit', [guru\ProfilController::class, 'editProfilGuru'])->name('editProfilGuru');
    Route::put('/edit-profil-guru', [guru\ProfilController::class, 'updateProfilGuru'])->name('updateProfilGuru');
    //Wali-Kelas
    Route::get('/kelas-saya', [guru\WaliKelasController::class, 'index'])->name('kelas-saya');
    //Ruangan-Kelas
    Route::get('/kelas/{kelas_id}', [guru\GuruKelasController::class, 'index'])->name('nilai-kelas');
    //Input-NilaiBulanan
    Route::get('/pilih-kelas', [guru\InputController::class, 'pilihKelas1'])->name('pilihKelas');
    Route::get('/input-nilai', [guru\InputController::class, 'inputNilai1'])->name('inputNilai');
    //Input-NilaiSemester
    Route::get('/pilih-kelas2', [guru\InputController::class, 'pilihKelas2'])->name('pilihKelas2');
    Route::get('/input-nilai2', [guru\InputController::class, 'inputNilai2'])->name('inputNiai2');
    //Input-Absen
    Route::get('/input-absen', [guru\InputController::class, 'inputAbsen1'])->name('inputAbsen');
    Route::get('/input-absen2', [guru\InputController::class, 'inputAbsen2'])->name('inputAbsen2');
    //Rekapitulasi-Absen
    Route::get('/rekap-absen', [guru\InputController::class, 'rekapAbsen'])->name('rekapAbsen');
}); */


