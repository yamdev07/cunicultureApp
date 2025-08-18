<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MaleController;
use App\Http\Controllers\FemelleController;
use App\Http\Controllers\SaillieController;
use App\Http\Controllers\MiseBasController;
use App\Http\Controllers\LapinController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Tableau de bord
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// CRUD Mâles
Route::resource('males', MaleController::class);
Route::patch('males/{male}/toggle-etat', [MaleController::class, 'toggleEtat'])->name('males.toggleEtat');

// CRUD Femelles
Route::resource('femelles', FemelleController::class);
Route::patch('femelles/{femelle}/etat', [FemelleController::class, 'toggleEtat'])->name('femelles.toggleEtat');

// CRUD Saillies
Route::resource('saillies', SaillieController::class)->parameters([
    'saillies' => 'saillie'
]);

// CRUD Mises Bas
Route::resource('mises-bas', MiseBasController::class);

// Lapin – création et stockage
Route::get('/lapin/create', [LapinController::class, 'create'])->name('lapin.create');
Route::post('/lapin/store', [LapinController::class, 'store'])->name('lapin.store');
