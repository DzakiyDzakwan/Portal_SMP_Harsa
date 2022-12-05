<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SPPController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\guru;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\siswa;
use App\Models\Kelas;

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
    //Dashboard/SPP
    Route::get('/spp', [SPPController::class, 'index'])->name('spp');
    //Dashboard/Kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
    Route::post('/kelas/addKelas', [KelasController::class, 'store'])->name('addKelas');
    Route::post('/kelas/updateKelas/{id}', [KelasController::class, 'update'])->name('updateKelas');
    Route::delete('/kelas/deleteKelas/{id}', [KelasController::class, 'destroy'])->name('deleteKelas');
    //Dashboard/User
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/users/addAdmin', [UserController::class, 'store'])->name('addAdmin');
    Route::delete('/users/deleteAdmin/{uuid}', [UserController::class, 'delete'])->name('deleteAdmin');
    //Dashboard/Mapel
    Route::get('/mapel', [MapelController::class, 'index'])->name('mapel');
    Route::post('/mapel/addMapel', [MapelController::class, 'store'])->name('addMapel');
    Route::post('/mapel/updateMapel/{mapel_id}', [MapelController::class, 'update'])->name('updateMapel');
    Route::delete('/mapel/deleteMapel/{mapel_id}', [MapelController::class, 'destroy'])->name('deleteMapel');
    //Dashboard/eskul
    Route::get('/ekstrakulikuler',[EkskulController::class,'index'])->name('ekskul');
    Route::post('/ekskul/addEkskul',[EkskulController::class,'store'])->name('addEkskul');
    Route::post('/ekskul/updateEkskul/{id}', [EkskulController::class, 'update'])->name('updateEkskul');
    Route::delete('/ekskul/deleteEkskul/{id}', [EkskulController::class, 'destroy'])->name('deleteEkskul');
    //Dashboard/Siswa
    Route::get('/siswa',[SiswaController::class,'index'])->name('siswa');
    Route::post('/siswa/add-siswa',[SiswaController::class,'store'])->name('add-siswa');
    Route::post('/siswa/update-siswa/{id}', [SiswaController::class, 'edit'])->name('edit-siswa');
    Route::delete('/siswa/delete-siswa/{uuid}',[SiswaController::class,'delete'])->name('delete-siswa');
    //Dashboard/Guru
    Route::get('/guru', [GuruController::class, 'index'])->name('guru');
    Route::post('/guru/addGuru', [GuruController::class, 'store'])->name('addGuru');
    Route::patch('/guru/inactiveGuru/{uuid}', [GuruController::class, 'delete'])->name('inactiveGuru');
    Route::patch('/guru/updateGuru/{id}', [GuruController::class, 'edit'])->name('updateGuru');
    //Dashboard/Log-Users
    Route::get('/log-activities',[LogController::class,'activity'])->name('log-activities');
    //Dashboard/Log-Users
    Route::get('/log-activities', [LogController::class, 'activity'])->name('log-activities');
    //Dashboard/Log-Users
    Route::get('/log-users', [LogController::class, 'user'])->name('log-user');
    //Dashboard/Log-Siswa
    Route::get('/log-siswa', [LogController::class, 'siswa'])->name('log-siswa');
    //Dashboard/Log-Guru
    Route::get('/log-guru', [LogController::class, 'guru'])->name('log-guru');
    //Dashboard/Log-Kelas
    Route::get('/log-kelas', [LogController::class, 'kelas'])->name('log-kelas');
    //Dashboard/Log-Mapel
    Route::get('/log-mapel', [LogController::class, 'mapel'])->name('log-mapel');
    //Dashboard/Log-SPP
    Route::get('/log-tagihan', [LogController::class, 'tagihanSpp'])->name('log-tagihan');
    //Dashboard/Log-SPP
    Route::get('/log-ekstrakulikuler', [LogController::class, 'ekskul'])->name('log-ekskul');
});

//Siswa
//Dashboard-Siswa
Route::group(['middleware' => ['auth', 'ceklevel:siswa']], function () {
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
Route::group(['middleware' => ['auth', 'ceklevel:guru']], function () {
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
