<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogController;

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

//Dashboard/Log-Users
Route::get('/log-users',[LogController::class,'user'])->name('log-user');

Route::get('/test', function () {
    return view('test');
});
