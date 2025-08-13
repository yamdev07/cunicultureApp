@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">🐇 Gestion de Cuniculture</h1>

    <div class="row">
        <!-- Carte Mâles -->
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Mâles</h5>
                    <p class="display-5 text-primary">{{ $nbMales ?? 0 }}</p>
                </div>
            </div>
        </div>

        <!-- Carte Femelles -->
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Femelles</h5>
                    <p class="display-5 text-success">{{ $nbFemelles ?? 0 }}</p>
                </div>
            </div>
        </div>

        <!-- Carte Saillies -->
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Saillies</h5>
                    <p class="display-5 text-warning">{{ $nbSaillies ?? 0 }}</p>
                </div>
            </div>
        </div>

        <!-- Carte Mises bas -->
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Mises Bas</h5>
                    <p class="display-5 text-danger">{{ $nbMisesBas ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Boutons navigation -->
    <div class="mt-5 text-center">
        <a href="{{ url('/males') }}" class="btn btn-primary">Gérer les Mâles</a>
        <a href="{{ url('/femelles') }}" class="btn btn-success">Gérer les Femelles</a>
        <a href="{{ url('/saillies') }}" class="btn btn-warning">Gérer les Saillies</a>
        <a href="{{ url('/mises-bas') }}" class="btn btn-danger">Gérer les Mises Bas</a>
    </div>
</div>
@endsection
