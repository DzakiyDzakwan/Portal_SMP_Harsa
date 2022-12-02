<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SPPController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ManajemenKelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\guru;
use App\Http\Controllers\siswa;



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
Route::group(['middleware' => ['auth','ceklevel:admin']], function() {
    Route::get('/', [DashboardController::class,'index'])->name('home');
    //Dashboard/SPP
    Route::get('/spp',[SPPController::class,'index'])->name('spp');
    //Dashboard/Kelas
    Route::get('/kelas', [ManajemenKelasController::class, 'kelas'])->name('kelas');
    //Dashboard/User
    Route::get('/users',[UserController::class,'index'])->name('users');
    Route::post('/users/addAdmin',[UserController::class,'store'])->name('addAdmin');
    //Dashboard/Mapel
    Route::get('/mapel',[ManajemenKelasController::class,'mapel'])->name('mapel');
    //Dashboard/eskul
    Route::get('/ekstrakulikuler',[ManajemenKelasController::class,'ekskul'])->name('ekskul');
    //Dashboard/Siswa
    Route::get('/siswa',[SiswaController::class,'index'])->name('siswa');
    //Dashboard/Guru
    Route::get('/guru', [GuruController::class,'index'])->name('guru');
    //Dashboard/Log-Users
    Route::get('/log-users',[LogController::class,'user'])->name('log-user');
    //Dashboard/Log-Siswa
    Route::get('/log-siswa',[LogController::class,'siswa'])->name('log-siswa');
    //Dashboard/Log-Guru
    Route::get('/log-guru',[LogController::class,'guru'])->name('log-guru');
    //Dashboard/Log-Kelas
    Route::get('/log-kelas',[LogController::class,'kelas'])->name('log-kelas');
    //Dashboard/Log-Mapel
    Route::get('/log-mapel',[LogController::class,'mapel'])->name('log-mapel');
    //Dashboard/Log-SPP
    Route::get('/log-tagihan', [LogController::class, 'tagihanSpp'])->name('log-tagihan');
    //Dashboard/Log-SPP
    Route::get('/log-ekstrakulikuler', [LogController::class, 'ekskul'])->name('log-ekskul');
});

//Siswa
//Dashboard-Siswa
Route::group(['middleware' => ['auth','ceklevel:siswa']], function() {
    Route::get('/dashboard-siswa', [DashboardController::class, 'siswa'])->name('dashboardSiswa');
    //Rapor
    Route::get('/rapor', [siswa\RaporController::class, 'rapor'])->name('rapor');
    //Pilih rapor
    Route::get('/pilih-rapor-ganjil-7', [siswa\RaporController::class, 'ganjil7'])->name('pilih-rapor-ganjil-7');
    Route::get('/pilih-rapor-genap-7', [siswa\RaporController::class, 'genap7'])->name('pilih-rapor-genap-7');
    /* Route::get('/pilih-rapor-ganjil-8', [siswa\RaporController::class, 'ganjil8'])->name('pilih-rapor-ganjil-8');
    Route::get('/pilih-rapor-genap-8', [siswa\RaporController::class, 'genap8'])->name('pilih-rapor-genap-8');
    Route::get('/pilih-rapor-ganjil-9', [siswa\RaporController::class, 'ganjil9'])->name('pilih-rapor-ganjil-9');
    Route::get('/pilih-rapor-genap-9', [siswa\RaporController::class, 'genap9'])->name('pilih-rapor-genap-9');
    */
    Route::get('/rapor-bulanan', [siswa\RaporController::class, 'bulanan'])->name('rapor-bulanan');
    Route::get('/rapor-semester', [siswa\RaporController::class, 'semester'])->name('rapor-semester');
    //SPP
    Route::get('/tagihan-spp', [SPPController::class, 'tagihanSPP'])->name('tagihanSPP');
    Route::get('/profil-siswa', [siswa\ProfilController::class, 'profilSiswa'])->name('profilSiswa');
    Route::get('/edit-profil-siswa', [siswa\ProfilController::class, 'editProfilSiswa'])->name('editProfilSiswa');
});

//Guru
//Dashboard-Guru
Route::group(['middleware' => ['auth','ceklevel:guru']], function() {
    Route::get('/dashboard-guru', [DashboardController::class, 'guru'])->name('dashboardGuru');
    //Direktori-Guru
    Route::get('/direktori-guru', [guru\direktoriController::class, 'direktori'])->name('direktoriGuru');
    //Profil-Guru
    Route::get('/profil-guru', [guru\ProfilController::class, 'profilGuru'])->name('profilGuru');
    Route::get('/edit-profil-guru', [guru\ProfilController::class, 'editProfilGuru'])->name('editProfilGuru');
    //List-Kelas
    Route::get('/list-kelas', [guru\ListkelasController::class, 'index'])->name('listKelas');
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
    return view('test');
});
