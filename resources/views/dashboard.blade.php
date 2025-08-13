@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-5">Tableau de bord 🐇</h1>

    <div class="row g-4">
        <!-- Mâles -->
        <div class="col-md-3">
            <div class="stat-card bg-primary text-center shadow">
                <i class="bi bi-gender-male stat-icon"></i>
                <h5>Mâles</h5>
                <h2>{{ $nbMales }}</h2>
            </div>
        </div>

        <!-- Femelles -->
        <div class="col-md-3">
            <div class="stat-card bg-success text-center shadow">
                <i class="bi bi-gender-female stat-icon"></i>
                <h5>Femelles</h5>
                <h2>{{ $nbFemelles }}</h2>
            </div>
        </div>

        <!-- Saillies -->
        <div class="col-md-3">
            <div class="stat-card bg-warning text-center shadow">
                <i class="bi bi-heart-fill stat-icon"></i>
                <h5>Saillies</h5>
                <h2>{{ $nbSaillies }}</h2>
            </div>
        </div>

        <!-- Mises bas -->
        <div class="col-md-3">
            <div class="stat-card bg-danger text-center shadow">
                <i class="bi bi-egg-fill stat-icon"></i>
                <h5>Mises Bas</h5>
                <h2>{{ $nbMisesBas }}</h2>
            </div>
        </div>
    </div>

    <!-- Boutons navigation -->
    <div class="mt-5 text-center">
        <a href="{{ url('/males') }}" class="btn btn-primary btn-lg m-2">Gérer les Mâles</a>
        <a href="{{ url('/femelles') }}" class="btn btn-success btn-lg m-2">Gérer les Femelles</a>
        <a href="{{ url('/saillies') }}" class="btn btn-warning btn-lg m-2">Gérer les Saillies</a>
        <a href="{{ url('/mises-bas') }}" class="btn btn-danger btn-lg m-2">Gérer les Mises Bas</a>
    </div>
</div>
@endsection
