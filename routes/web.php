<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return view('home');
    }
    return view('welcome');
});


// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Projects routes (full CRUD)
Route::middleware(['auth'])->group(function () {
    Route::resource('projects', ProjectController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('projects.tasks', TaskController::class);
});

Route::get('/dashboard',[DashboardController::class, 'index'])
->middleware(['auth', 'verified'])
->name('dashboard');

require __DIR__.'/auth.php';
