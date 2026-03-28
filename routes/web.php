<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    // return view('dashboard');
    return view('auth.login');
});

Route::get('/dashboard', [AuthController::class, 'dashboard']);
