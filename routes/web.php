<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordController;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth.session')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/change-password', [PasswordController::class, 'edit'])->name('password.edit');
    Route::put('/change-password', [PasswordController::class, 'update'])->name('password.update');

    Route::prefix('programs')->group(function () {
        Route::get('/', [ProgramController::class, 'index'])->name('programs.index');

        Route::get('/create', [ProgramController::class, 'create'])
            ->middleware('staff.or.admin')
            ->name('programs.create');

        Route::post('/', [ProgramController::class, 'store'])
            ->middleware('staff.or.admin')
            ->name('programs.store');

        Route::get('/{program}/edit', [ProgramController::class, 'edit'])
            ->middleware('staff.or.admin')
            ->name('programs.edit');

        Route::put('/{program}', [ProgramController::class, 'update'])
            ->middleware('staff.or.admin')
            ->name('programs.update');
    });

    Route::prefix('subjects')->group(function () {
        Route::get('/', [SubjectController::class, 'index'])->name('subjects.index');

        Route::get('/create', [SubjectController::class, 'create'])
            ->middleware('staff.or.admin')
            ->name('subjects.create');

        Route::post('/', [SubjectController::class, 'store'])
            ->middleware('staff.or.admin')
            ->name('subjects.store');

        Route::get('/{subject}/edit', [SubjectController::class, 'edit'])
            ->middleware('staff.or.admin')
            ->name('subjects.edit');

        Route::put('/{subject}', [SubjectController::class, 'update'])
            ->middleware('staff.or.admin')
            ->name('subjects.update');
    });

    Route::prefix('users')->middleware('admin.only')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
    });
});