<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PerfilController;
use Illuminate\Support\Facades\Route;

Route::post('auth/login', [LoginController::class, 'login']);
Route::get('auth/me', [PerfilController::class, 'me'])->middleware(['auth:sanctum']);
Route::post('auth/logout', [LogoutController::class, 'logout'])->middleware(['auth:sanctum']);
Route::post('auth/register', [RegisterController::class, 'register']);
 