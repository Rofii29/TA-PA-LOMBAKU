<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\RoleMiddleware;

use App\Http\Controllers\ProfileController;

Route::middleware(['auth', RoleMiddleware::class . ':mahasiswa'])->group(function () {
    Route::get('/mahasiswa/profile', [ProfileController::class, 'show'])->name('mahasiswa.profile');
});
Route::middleware(['auth', RoleMiddleware::class . ':mahasiswa'])->group(function () {
    Route::get('/mahasiswa/profile', [ProfileController::class, 'show'])->name('mahasiswa.profile');
    Route::get('/mahasiswa/profile/edit', [ProfileController::class, 'edit'])->name('mahasiswa.profile.edit');
    Route::post('/mahasiswa/profile/update', [ProfileController::class, 'update'])->name('mahasiswa.profile.update');
});

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
})->name('home');
// Halaman login dan register
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Proses login dan registrasi
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Halaman untuk mahasiswa, dosen, dan admin
Route::middleware([RoleMiddleware::class . ':mahasiswa'])->group(function () {
    Route::get('/mahasiswa/welcome', function () {
        return view('mahasiswa.welcome');
    });
});

Route::middleware([RoleMiddleware::class . ':dosen'])->group(function () {
    Route::get('/dosen/dashboard', function () {
        return view('dosen.dashboard');
    });
});

Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('password/reset', [AuthController::class, 'showResetForm'])->name('password.request');
Route::post('password/email', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('password/reset/{token}', [AuthController::class, 'showResetFormWithToken'])->name('password.reset');
Route::post('password/reset', [AuthController::class, 'resetPassword'])->name('password.update');