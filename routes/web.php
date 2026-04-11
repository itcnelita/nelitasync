<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\KawanNelitaController;
use App\Http\Controllers\ManageUserController;


//Login
Route::get('/', [AuthController::class, 'showLogin'])->name('showLoginDefault');
Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


// Attendance
Route::get('/attendance', [AttendanceController::class, 'index'])->middleware('auth')->name('attendance');
Route::post('/attendance', [AttendanceController::class, 'insert'])->middleware('auth')->name('attendance.insert');

//KawanNelita
Route::get('/KawanNelita', [KawanNelitaController::class, 'index'])->middleware('auth')->name('kawanNelita');
Route::get('/KawanNelita/reply', [KawanNelitaController::class, 'reply'])->middleware('auth');


//Manage User
Route::get('/ManageUser', [ManageUserController::class, 'index'])->middleware('auth')->name('ManageUser');
Route::post('/ManageUser/user/insert', [ManageUserController::class, 'insert'])->middleware('auth')->name('user.insert');
Route::get('/ManageUser/User/Destroy{id}', [ManageUserController::class, 'userDestroy'])->middleware('auth')->name('user.destroy');
