<?php

namespace App\Http\Controllers;

use App\Models\Male;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMales = Male::count(); // nombre total
        $males = Male::all(); // liste complète

        return view('dashboard', compact('totalMales', 'males'));
    }
}
