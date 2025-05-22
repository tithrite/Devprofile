<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PublicProfileController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Projects routes
    Route::resource('projects', ProjectController::class);
    
    // Skills routes
    Route::resource('skills', SkillController::class)->except(['create', 'edit', 'update']);
    
    // PDF generation route
    Route::get('/pdf/{username}', [PDFController::class, 'generate'])->name('pdf.generate');
});

// Public profile route
Route::get('/profile/{username}', [PublicProfileController::class, 'show'])->name('profile.show');

require __DIR__.'/auth.php';
