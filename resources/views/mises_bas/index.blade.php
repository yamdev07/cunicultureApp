@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="card shadow-sm rounded-3 border-0">
        <div class="card-header bg-white border-bottom-0 py-3 d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0 fw-semibold text-gray-800">
                <i class="bi bi-pencil-square me-2"></i> Modifier une mise bas
            </h2>
        </div>

        <div class="card-body">
            {{-- Formulaire de mise à jour --}}
            <form action="{{ route('mises-bas.update', $miseBas->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="femelle_id" class="form-label">Femelle</label>
                    <select name="femelle_id" id="femelle_id" class="form-control" required>
                        @foreach($femelles as $femelle)
                            <option value="{{ $femelle->id }}" {{ $miseBas->femelle_id == $femelle->id ? 'selected' : '' }}>
                                {{ $femelle->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="male_id" class="form-label">Mâle</label>
                    <select name="male_id" id="male_id" class="form-control" required>
                        @foreach($males as $male)
                            <option value="{{ $male->id }}" {{ $miseBas->male_id == $male->id ? 'selected' : '' }}>
                                {{ $male->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="date_mise_bas" class="form-label">Date de mise bas</label>
                    <input type="date" name="date_mise_bas" id="date_mise_bas" class="form-control"
                           value="{{ $miseBas->date_mise_bas }}" required>
                </div>

                <div class="mb-3">
                    <label for="nombre_jeunes" class="form-label">Nombre de jeunes</label>
                    <input type="number" name="nombre_jeunes" id="nombre_jeunes" class="form-control"
                           value="{{ $miseBas->nombre_jeunes }}" min="0" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Mettre à jour
                </button>
                <a href="{{ route('mises-bas.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Retour
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
