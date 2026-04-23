<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\KawanNelitaController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\EkstrakulikulerController; // Import controller baru

// --- Public Routes ---
Route::get('/', [AuthController::class, 'showLogin'])->name('showLoginDefault');
Route::get('/login', [AuthController::class, 'showLogin'])->middleware('throttle:5,1')->name('showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// --- Protected Routes (Perlu Login) ---
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Attendance
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance');
    Route::post('/attendance', [AttendanceController::class, 'insert'])->name('attendance.insert');

    // KawanNelita
    Route::get('/KawanNelita', [KawanNelitaController::class, 'index'])->name('kawanNelita');
    Route::get('/KawanNelita/reply', [KawanNelitaController::class, 'reply']);

    // Ekstrakurikuler (Baru)
    Route::get('/ekstrakurikuler', [EkstrakulikulerController::class, 'index'])->name('ekstrakulikuler.index');
    Route::post('/ekstrakurikuler/daftar/{id}', [EkstrakulikulerController::class, 'daftar'])->name('ekstrakulikuler.daftar');

    // Manage User (Biasanya untuk Admin)
    Route::get('/ManageUser', [ManageUserController::class, 'index'])->name('ManageUser');
    Route::post('/ManageUser/user/insert', [ManageUserController::class, 'insert'])->name('user.insert');
    Route::get('/ManageUser/User/Destroy{id}', [ManageUserController::class, 'userDestroy'])->name('user.destroy');
});
