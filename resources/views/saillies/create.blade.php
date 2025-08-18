@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="card shadow-sm rounded-3 border-0">
        <div class="card-header bg-white border-bottom-0 py-3 d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0 fw-semibold text-gray-800">
                <i class="bi bi-plus-square me-2"></i>Enregistrer une nouvelle Saillie
            </h2>
            <a href="{{ route('saillies.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Retour
            </a>
        </div>

        <div class="card-body">
            <!-- Alert succès -->
            @if(session('success'))
            <div class="alert alert-success border-0 bg-success-soft fade show mb-4">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

            <!-- Erreurs de validation -->
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

            <form action="{{ route('saillies.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="row g-3 mb-4">
                    <!-- Sélection Femelle -->
                    <div class="col-md-6">
                        <label for="femelle_id" class="form-label fw-semibold">Femelle</label>
                        <select class="form-select" id="femelle_id" name="femelle_id" required>
                            <option value="">-- Sélectionner --</option>
                            @foreach($femelles as $f)
                                <option value="{{ $f->id }}">{{ $f->nom }} ({{ $f->code }})</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Veuillez sélectionner une femelle.</div>
                    </div>

                    <!-- Sélection Mâle -->
                    <div class="col-md-6">
                        <label for="male_id" class="form-label fw-semibold">Mâle</label>
                        <select class="form-select" id="male_id" name="male_id" required>
                            <option value="">-- Sélectionner --</option>
                            @foreach($males as $m)
                                <option value="{{ $m->id }}">{{ $m->nom }} ({{ $m->code }})</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Veuillez sélectionner un mâle.</div>
                    </div>

                    <!-- Date de saillie -->
                    <div class="col-md-6">
                        <label for="date_saillie" class="form-label fw-semibold">Date de saillie</label>
                        <input type="date" class="form-control" id="date_saillie" name="date_saillie" required>
                        <div class="invalid-feedback">Veuillez saisir la date de saillie.</div>
                    </div>

                    <!-- Date de palpation -->
                    <div class="col-md-6">
                        <label for="date_palpage" class="form-label fw-semibold">Date de palpation</label>
                        <input type="date" class="form-control" id="date_palpage" name="date_palpage">
                    </div>

                    <!-- Résultat palpation -->
                    <div class="col-md-6">
                        <label for="palpation_resultat" class="form-label fw-semibold">Résultat de palpation</label>
                        <select class="form-select" id="palpation_resultat" name="palpation_resultat">
                            <option value="">-- Non défini --</option>
                            <option value="+">Positif</option>
                            <option value="-">Négatif</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-check-circle me-2"></i> Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
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
})();
</script>
@endsection
