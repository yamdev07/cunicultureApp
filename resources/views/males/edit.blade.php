@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="card shadow-sm rounded-3 border-0">
        <div class="card-header bg-white border-bottom-0 py-3 d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0 fw-semibold text-gray-800">
                <i class="bi bi-pencil-square me-2"></i>Modifier un Lapin Mâle
            </h2>
            <a href="{{ route('males.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Retour
            </a>
        </div>

        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger border-0 bg-danger-soft fade show mb-4">
                <div class="d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i>
                    <div>
                        <h5 class="mb-1">Erreurs de validation</h5>
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            <form action="{{ route('males.update', $male->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="code" class="form-label fw-semibold">Code</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-qr-code"></i></span>
                            <input type="text" class="form-control" id="code" name="code" 
                                   value="{{ old('code', $male->code) }}" required>
                            <div class="invalid-feedback">Veuillez saisir le code.</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="nom" class="form-label fw-semibold">Nom</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-tag"></i></span>
                            <input type="text" class="form-control" id="nom" name="nom" 
                                   value="{{ old('nom', $male->nom) }}" required>
                            <div class="invalid-feedback">Veuillez saisir le nom.</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="race" class="form-label fw-semibold">Race</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-egg-fill"></i></span>
                            <input type="text" class="form-control" id="race" name="race" 
                                   value="{{ old('race', $male->race) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="origine" class="form-label fw-semibold">Origine</label>
                        <select class="form-select" id="origine" name="origine">
                            <option value="Interne" {{ old('origine', $male->origine) == 'Interne' ? 'selected' : '' }}>Interne</option>
                            <option value="Achat" {{ old('origine', $male->origine) == 'Achat' ? 'selected' : '' }}>Achat</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="date_naissance" class="form-label fw-semibold">Date de naissance</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-calendar"></i></span>
                            <input type="date" class="form-control" id="date_naissance" name="date_naissance" 
                                   value="{{ old('date_naissance', $male->date_naissance ? \Carbon\Carbon::parse($male->date_naissance)->format('Y-m-d') : '') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="etat" class="form-label fw-semibold">État</label>
                        <select class="form-select" id="etat" name="etat">
                            <option value="Active" {{ old('etat', $male->etat) == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('etat', $male->etat) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-check-circle me-2"></i> Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tu peux conserver le même style CSS et script JS que pour les Femelles -->

@endsection
