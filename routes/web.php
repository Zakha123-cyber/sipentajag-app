<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\ScanHistoryController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('landing.index');
})->name('landing');

// Authentication Routes (if you're using Laravel Breeze/Fortify these are already included)
require __DIR__ . '/auth.php';

// Protected Routes
Route::middleware(['auth'])->group(function () {
    // Home/Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //Scan
    Route::get('/scan', [ScanController::class, 'index'])->name('scan');

    // Articles
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
    Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Scan History
    Route::get('/scan-history', [ScanHistoryController::class, 'index'])->name('scan-history');
    Route::get('/scan-history/{scan}', [ScanHistoryController::class, 'show'])->name('scan-history.show');
});

Route::get('/scan', function () {
    return view('scan.scan');
})->name('scan');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
