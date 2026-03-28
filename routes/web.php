<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;

// Route::get('/', function () {
//     // return view('dashboard');
//     return view('auth.login');
// });

Route::get('/', [AuthController::class, 'showLogin'])->name('showLoginDefault');
Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/attendance', [AttendanceController::class, 'index'])->middleware('auth');
