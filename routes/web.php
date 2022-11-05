<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ManajemenKelasController;
use App\Http\Controllers\SiswaController;

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

//Dashboard
Route::get('/', [DashboardController::class,'index'])->name('home');

//Dashboard/User
Route::get('/users',[UserController::class,'index'])->name('users');

//Dashboard/Mapel
Route::get('/mapel',[ManajemenKelasController::class,'mapel'])->name('mapel');

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

Route::get('/test', function () {
    return view('test');
});
