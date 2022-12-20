<?php

use App\Http\Controllers\guru;
use App\Http\Controllers\siswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\RosterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MapelGuruController;
use App\Http\Controllers\siswa\ProfilController;

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
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Dashboard
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
    //Dashboard/Log-Activity
    Route::get('/log-activities', [LogController::class, 'activity'])->name('log-activities');
    //Dashboard/Log-Users
    Route::get('/log-users', [LogController::class, 'user'])->name('log-user');
    //Dashboard/Log-Profile
    Route::get('/log-profiles', [LogController::class, 'profiles'])->name('log-profiles');
    //Dashboard/Log-Siswa
    Route::get('/log-siswa', [LogController::class, 'siswa'])->name('log-siswa');
    //Dashboard/Log-Prestasi
    Route::get('/log-prestasi', [LogController::class, 'prestasi'])->name('log-prestasi');
    //Dashboard/Log-Nilai
    Route::get('/log-nilai', [LogController::class, 'nilai'])->name('log-nilai');
    //Dashboard/Log-Guru
    Route::get('/log-guru', [LogController::class, 'guru'])->name('log-guru');
    //Dashboard/Log-Kelas
    Route::get('/log-kelas', [LogController::class, 'kelas'])->name('log-kelas');
    //Dashboard/Log-Mapel
    Route::get('/log-mapel', [LogController::class, 'mapel'])->name('log-mapel');
    //Dashboard/Log-Ekstrakurikuler
    Route::get('/log-ekstrakulikuler', [LogController::class, 'ekskul'])->name('log-ekskul');
    //Dashboard/Log-Roster
    Route::get('/log-roster', [LogController::class, 'roster'])->name('log-roster');
    //Dashboard/Log-Ekstrakurikuler-Siswa
    Route::get('/log-ekstrakurikuler-siswa', [LogController::class, 'ekskulSiswa'])->name('log-ekskul-siswa');
    //Dashboard/Log-Kontrak
    Route::get('/log-kontrak', [LogController::class, 'kontrak'])->name('log-kontrak');
});

//Siswa
//Dashboard-Siswa
Route::group(['middleware' => ['auth', 'ceklevel:siswa']], function () {
    Route::get('/dashboard-siswa', [DashboardController::class, 'siswa'])->name('dashboardSiswa');
    //Profile-Siswa
    Route::get('/profil-siswa', [siswa\ProfilController::class, 'profilSiswa'])->name('profilSiswa');
    Route::get('/edit-profil-siswa', [siswa\ProfilController::class, 'editProfilSiswa'])->name('editProfilSiswa');
    //Route::post('/edit-profil-siswa', [ProfilController::class, 'updateProfilSiswa'])->name('updateProfilSiswa');
    //Rapor
    Route::get('/rapor', [siswa\RaporController::class,  'index'])->name('rapor');
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
//Dashboard-Guru
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
});

Route::get('/test', function () {
    $pages = 'test';
    $users = auth()->user()->username;
    return view('admin.test', compact('users', 'pages'));
});
