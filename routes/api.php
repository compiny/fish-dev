<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('/reg', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth:api'], function() {

    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users', [UserController::class, 'update'])->name('users.update');

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
    Route::get('/projects/{id}', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::post('/projects', [ProjectController::class, 'update'])->name('projects.update');


    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
    Route::get('/contacts/{id}', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::post('/contacts', [ContactController::class, 'update'])->name('contacts.update');

    Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
    Route::get('/customers/{id}', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::post('/customers', [CustomerController::class, 'update'])->name('customers.update');
});
