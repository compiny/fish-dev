<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/reg', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/users/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users', [UserController::class, 'update'])->name('users.update');

Route::post('/projects', [ProjectController::class, 'index'])->name('projects');
Route::post('/activate', [AuthController::class, 'activate'])->name('activate');
