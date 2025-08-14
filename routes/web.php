<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MaleController;
use App\Http\Controllers\FemelleController;
use App\Http\Controllers\SaillieController;
use App\Http\Controllers\MiseBasController;

// Route pour le tableau de bord (page d'accueil)
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Routes CRUD pour les mâles et femelles
Route::resource('males', MaleController::class);
Route::resource('femelles', FemelleController::class);

// Routes CRUD pour les saillies et mises bas (si existantes)
Route::resource('saillies', SaillieController::class);
Route::resource('mises-bas', MiseBasController::class);
// Formulaire unique de création
Route::get('/lapin/create', [App\Http\Controllers\LapinController::class, 'create'])->name('lapin.create');
Route::post('/lapin/store', [App\Http\Controllers\LapinController::class, 'store'])->name('lapin.store');
// Route pour changer l'état
Route::patch('femelles/{femelle}/etat', [FemelleController::class, 'toggleEtat'])
     ->name('femelles.toggleEtat');// web.php
Route::patch('males/{male}/toggle-etat', [MaleController::class, 'toggleEtat'])->name('males.toggleEtat');
