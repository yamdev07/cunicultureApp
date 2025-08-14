@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Nouvelle Entrée</h2>
    <form action="{{ route('lapins.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" id="type" class="form-select" required>
                <option value="">Sélectionner</option>
                <option value="male">Mâle</option>
                <option value="female">Femelle</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="race" class="form-label">Race</label>
            <input type="text" name="race" id="race" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="origine" class="form-label">Origine</label>
            <input type="text" name="origine" id="origine" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="date_naissance" class="form-label">Date de naissance</label>
            <input type="date" name="date_naissance" id="date_naissance" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="etat" class="form-label">État</label>
            <select name="etat" id="etat" class="form-select" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>

</div>
@endsection
