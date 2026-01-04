<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientConferenceController;
use App\Http\Controllers\EmployeeConferenceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ConferenceController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Client subsystem
Route::prefix('client')->name('client.')->group(function () {
    Route::get('/conferences', [ClientConferenceController::class, 'index'])->name('conferences.index');
    Route::get('/conferences/{id}', [ClientConferenceController::class, 'show'])->name('conferences.show');
    Route::post('/conferences/{id}/register', [ClientConferenceController::class, 'register'])->name('conferences.register');
});

// Employee subsystem
Route::prefix('employee')->name('employee.')->group(function () {
    Route::get('/conferences', [EmployeeConferenceController::class, 'index'])->name('conferences.index');
    Route::get('/conferences/{id}', [EmployeeConferenceController::class, 'show'])->name('conferences.show');
});

// Admin subsystem
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // User management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

    // Conference management
    Route::get('/conferences', [ConferenceController::class, 'index'])->name('conferences.index');
    Route::get('/conferences/create', [ConferenceController::class, 'create'])->name('conferences.create');
    Route::post('/conferences', [ConferenceController::class, 'store'])->name('conferences.store');
    Route::get('/conferences/{id}/edit', [ConferenceController::class, 'edit'])->name('conferences.edit');
    Route::put('/conferences/{id}', [ConferenceController::class, 'update'])->name('conferences.update');
    Route::delete('/conferences/{id}', [ConferenceController::class, 'destroy'])->name('conferences.destroy');
});

