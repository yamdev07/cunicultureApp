@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Modifier la Mise Bas</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mises-bas.update', $miseBas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="femelle_id" class="form-label">Femelle</label>
            <select name="femelle_id" id="femelle_id" class="form-select" required>
                @foreach($femelles as $femelle)
                    <option value="{{ $femelle->id }}" {{ $femelle->id == $miseBas->femelle_id ? 'selected' : '' }}>
                        {{ $femelle->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="date_mise_bas" class="form-label">Date de Mise Bas</label>
            <input type="date" name="date_mise_bas" id="date_mise_bas" 
                   value="{{ $miseBas->date_mise_bas }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nombre_jeunes" class="form-label">Nombre de Jeunes</label>
            <input type="number" name="nombre_jeunes" id="nombre_jeunes" 
                   value="{{ $miseBas->nombre_jeunes }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('mises-bas.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
