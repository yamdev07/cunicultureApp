<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('dashboard', [
        'nbMales' => DB::table('males')->count(),
        'nbFemelles' => DB::table('femelles')->count(),
        'nbSaillies' => DB::table('saillies')->count(),
        'nbMisesBas' => DB::table('mises_bas')->count(),
    ]);
});

Route::get('/dashboard', [DashboardController::class, 'index']);
