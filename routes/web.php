<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/api/awards', [ApiController::class, 'awards']);
    Route::get('/api/modules', [ApiController::class, 'modules']);

    Route::get('/marks', [MarkController::class, 'index'])->name('marks.index');
    Route::post('/marks', [MarkController::class, 'store'])->name('marks.store');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/award', [DashboardController::class, 'selectAward'])->name('dashboard.award');
    Route::post('/dashboard/predict', [DashboardController::class, 'predict'])->name('dashboard.predict');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
