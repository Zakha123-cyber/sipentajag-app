<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('landing.index');
})->name('landing');

// Authentication Routes
require __DIR__ . '/auth.php';

// Admin Routes
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])
//         ->name('dashboard')
//         ->middleware('admin');
// });

// User Protected Routes
Route::middleware(['auth'])->group(function () {
    // Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Scan
    Route::prefix('scan')->group(function () {
        Route::get('/', [ScanController::class, 'index'])->name('scan');
        Route::post('/process', [ScanController::class, 'process'])->name('scan.process');
        Route::get('/result/{scan}', [ScanController::class, 'show'])->name('scan.result');
        Route::get('/history', [ScanController::class, 'history'])->name('scan.history');
    });

    // Articles
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
    Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

    // Profile
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});
