<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ArticleManajemenController;
use App\Http\Controllers\Admin\DiseaseController;
use App\Http\Controllers\Admin\FertilizerController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('landing');

// Authentication Routes
require __DIR__ . '/auth.php';

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User Management
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');


    //Article Management
    Route::get('/admin/articles', [ArticleManajemenController::class, 'index'])->name('admin.articles.index');
    Route::get('/admin/articles/create', [ArticleManajemenController::class, 'create'])->name('admin.articles.create');
    Route::post('/admin/articles', [ArticleManajemenController::class, 'store'])->name('admin.articles.store');
    Route::get('/admin/articles/{article}/edit', [ArticleManajemenController::class, 'edit'])->name('admin.articles.edit');
    Route::patch('/admin/articles/{article}', [ArticleManajemenController::class, 'update'])->name('admin.articles.update');
    Route::delete('/admin/articles/{article}', [ArticleManajemenController::class, 'destroy'])->name('admin.articles.destroy');

    // Disease Management
    Route::get('/admin/diseases', [DiseaseController::class, 'index'])->name('admin.diseases.index');
    Route::get('/admin/diseases/create', [DiseaseController::class, 'create'])->name('admin.diseases.create');
    Route::post('/admin/diseases', [DiseaseController::class, 'store'])->name('admin.diseases.store');
    Route::get('/admin/diseases/{disease}/edit', [DiseaseController::class, 'edit'])->name('admin.diseases.edit');
    Route::patch('/admin/diseases/{disease}', [DiseaseController::class, 'update'])->name('admin.diseases.update');
    Route::delete('/admin/diseases/{disease}', [DiseaseController::class, 'destroy'])->name('admin.diseases.destroy');

    // Fertilizer Management
    Route::get('/admin/fertilizers', [FertilizerController::class, 'index'])->name('admin.fertilizers.index');
    Route::get('/admin/fertilizers/create', [FertilizerController::class, 'create'])->name('admin.fertilizers.create');
    Route::post('/admin/fertilizers', [FertilizerController::class, 'store'])->name('admin.fertilizers.store');
    Route::get('/admin/fertilizers/{fertilizer}/edit', [FertilizerController::class, 'edit'])->name('admin.fertilizers.edit');
    Route::patch('/admin/fertilizers/{fertilizer}', [FertilizerController::class, 'update'])->name('admin.fertilizers.update');
    Route::delete('/admin/fertilizers/{fertilizer}', [FertilizerController::class, 'destroy'])->name('admin.fertilizers.destroy');
});

// User Protected Routes
Route::middleware(['auth', 'role:user'])->group(function () {
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
