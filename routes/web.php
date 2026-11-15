<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Admin\PerasaanController as AdminPerasaanController;
use App\Http\Controllers\Admin\LevelController as AdminLevelController;
use App\Http\Controllers\Admin\SoalController as AdminSoalController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\SkorController as AdminSkorUserController;

use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\User\PerasaankuController as UserPerasaankuController;
use App\Http\Controllers\User\PilihLevelController as UserPilihLevelController;
use App\Http\Controllers\User\SoalController as UserSoalController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::middleware(['auth',  RoleMiddleware::class . ':Admin'])->prefix('admin')->as('admin.')->group(function() {
    Route::resource('dashboard', AdminDashboardController::class)->only(['index']);
    Route::resource('master-users', AdminUsersController::class);
    Route::resource('master-perasaan', AdminPerasaanController::class);
    Route::resource('master-level', AdminLevelController::class);
    Route::resource('master-soal', AdminSoalController::class);
    Route::resource('skor-user', AdminSkorUserController::class)->only(['index', 'show']);
    Route::resource('profile', AdminProfileController::class);
});


Route::middleware(['auth', RoleMiddleware::class . ':User'])->prefix('user')->as('user.')->group(function() {
    Route::resource('home', UserHomeController::class)->only(['index']);
    Route::resource('emosiku', UserPerasaankuController::class);
    Route::resource('pilih-level', UserPilihLevelController::class);
    Route::post('/reset-semua-level', [UserPilihLevelController::class, 'resetSemuaLevel'])->name('reset-semua-level');
    Route::get('/level/{level}/soal/{soal}', [UserSoalController::class, 'showSoal'])->name('level.soal');
    Route::post('/level/{level}/soal/{soal}/submit', [UserSoalController::class, 'submitSoal'])->name('level.submit');
    Route::get('/level/{level}/selesai', [UserSoalController::class, 'levelSelesai'])->name('level.selesai');
    Route::post('/level/{level}/reset', [UserSoalController::class, 'resetLevel'])->name('level.reset');

});