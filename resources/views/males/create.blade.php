@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter un Lapin Mâle</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('males.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Code</label>
            <input type="text" name="code" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Race</label>
            <input type="text" name="race" class="form-control">
        </div>
        <div class="mb-3">
            <label>Origine</label>
            <select name="origine" class="form-control">
                <option value="Interne">Interne</option>
                <option value="Achat">Achat</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Date de naissance</label>
            <input type="date" name="date_naissance" class="form-control">
        </div>
        <div class="mb-3">
            <label>État</label>
            <select name="etat" class="form-control">
                <option value="Actif">Actif</option>
                <option value="Repos">Repos</option>
                <option value="Malade">Malade</option>
            </select>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Ajouter</button>
            <a href="{{ route('males.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
