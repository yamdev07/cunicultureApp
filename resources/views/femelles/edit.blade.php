@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="card shadow-sm rounded-3 border-0">
        <div class="card-header bg-white border-bottom-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="h5 mb-0 fw-semibold text-gray-800">
                    <i class="bi bi-pencil-square me-2"></i>Modifier un Lapin Femelle
                </h2>
                <a href="{{ route('femelles.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Retour
                </a>
            </div>
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

            <form action="{{ route('femelles.update', $femelle->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="code" class="form-label fw-semibold">Code</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-qr-code"></i></span>
                            <input type="text" class="form-control" id="code" name="code" 
                                   value="{{ old('code', $femelle->code) }}" required>
                            <div class="invalid-feedback">
                                Veuillez saisir le code.
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="nom" class="form-label fw-semibold">Nom</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-tag"></i></span>
                            <input type="text" class="form-control" id="nom" name="nom" 
                                   value="{{ old('nom', $femelle->nom) }}" required>
                            <div class="invalid-feedback">
                                Veuillez saisir le nom.
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="race" class="form-label fw-semibold">Race</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-egg-fill"></i></span>
                            <input type="text" class="form-control" id="race" name="race" 
                                   value="{{ old('race', $femelle->race) }}">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="origine" class="form-label fw-semibold">Origine</label>
                        <select class="form-select" id="origine" name="origine">
                            <option value="Interne" {{ old('origine', $femelle->origine) == 'Interne' ? 'selected' : '' }}>Interne</option>
                            <option value="Achat" {{ old('origine', $femelle->origine) == 'Achat' ? 'selected' : '' }}>Achat</option>
                        </select>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="date_naissance" class="form-label fw-semibold">Date de naissance</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-calendar"></i></span>
                            <input type="date" class="form-control" id="date_naissance" name="date_naissance" 
                                   value="{{ old('date_naissance', $femelle->date_naissance) }}">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="etat" class="form-label fw-semibold">État</label>
                        <select class="form-select" id="etat" name="etat">
                            <option value="Active" {{ old('etat', $femelle->etat) == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Gestante" {{ old('etat', $femelle->etat) == 'Gestante' ? 'selected' : '' }}>Gestante</option>
                            <option value="Allaitante" {{ old('etat', $femelle->etat) == 'Allaitante' ? 'selected' : '' }}>Allaitante</option>
                            <option value="Vide" {{ old('etat', $femelle->etat) == 'Vide' ? 'selected' : '' }}>Vide</option>
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

<style>
:root {
    --primary: #4e73df;
    --primary-light: #eef2ff;
    --danger: #e74a3b;
    --danger-soft: rgba(231, 74, 59, 0.1);
    --gray-800: #2d3748;
    --border-radius: 0.5rem;
}

.card {
    border: none;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
}

.form-label {
    font-weight: 500;
    color: var(--gray-800);
    margin-bottom: 0.5rem;
}

.input-group-text {
    background-color: #f8f9fc;
    border-right: none;
}

.form-control, .form-select {
    border-left: none;
    padding-left: 0;
}

.form-control:focus, .form-select:focus {
    box-shadow: none;
    border-color: #ced4da;
}

.btn-primary {
    background-color: var(--primary);
    border-color: var(--primary);
}

.btn-outline-secondary {
    border-color: #d1d3e2;
}

.invalid-feedback {
    display: none;
    width: 100%;
    margin-top: 0.25rem;
    font-size: 0.875em;
    color: var(--danger);
}

.was-validated .form-control:invalid ~ .invalid-feedback,
.was-validated .form-control:invalid ~ .invalid-tooltip {
    display: block;
}
</style>

<script>
// Validation Bootstrap
(function () {
    'use strict'
    
    const forms = document.querySelectorAll('.needs-validation')
    
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            
            form.classList.add('was-validated')
        }, false)
    })
})()
</script>
@endsection