@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="card shadow-sm rounded-3 border-0">
        <div class="card-header bg-white border-bottom-0 py-3 d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0 fw-semibold text-gray-800">
                <i class="bi bi-pencil-square me-2"></i>Modifier une Saillie
            </h2>
            <a href="{{ route('saillies.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Retour
            </a>
        </div>

        <div class="card-body">
            {{-- Notifications --}}
            @if ($errors->any())
            <div id="alertBox" class="alert alert-danger alert-dismissible fade show border-0 bg-danger-soft mb-4">
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

            @if(session('success'))
            <div id="alertBox" class="alert alert-success alert-dismissible fade show border-0 bg-success-soft mb-4">
                <i class="bi bi-check-circle-fill me-2 fs-4"></i> {{ session('success') }}
            </div>
            @endif


            {{-- Formulaire --}}
            <form action="{{ route('saillies.update', $saillie->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div class="row g-3 mb-4">
                    <!-- Sélection Femelle -->
                    <div class="col-md-6">
                        <label for="femelle_id" class="form-label fw-semibold">Femelle</label>
                        <select class="form-select" id="femelle_id" name="femelle_id" required>
                            @foreach($femelles as $f)
                                <option value="{{ $f->id }}" {{ $saillie->femelle_id == $f->id ? 'selected' : '' }}>
                                    {{ $f->nom }} ({{ $f->code }})
                                </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Veuillez sélectionner une femelle.</div>
                    </div>

                    <!-- Sélection Mâle -->
                    <div class="col-md-6">
                        <label for="male_id" class="form-label fw-semibold">Mâle</label>
                        <select class="form-select" id="male_id" name="male_id" required>
                            @foreach($males as $m)
                                <option value="{{ $m->id }}" {{ $saillie->male_id == $m->id ? 'selected' : '' }}>
                                    {{ $m->nom }} ({{ $m->code }})
                                </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Veuillez sélectionner un mâle.</div>
                    </div>

                    <!-- Date Saillie -->
                    <div class="col-md-6">
                        <label for="date_saillie" class="form-label fw-semibold">Date de saillie</label>
                        <input type="date" class="form-control" id="date_saillie" name="date_saillie"
                               value="{{ old('date_saillie', $saillie->date_saillie) }}" required>
                        <div class="invalid-feedback">Veuillez saisir la date de saillie.</div>
                    </div>

                    <!-- Date Palpation -->
                    <div class="col-md-6">
                        <label for="date_palpage" class="form-label fw-semibold">Date de palpation</label>
                        <input type="date" class="form-control" id="date_palpage" name="date_palpage"
                               value="{{ old('date_palpage', $saillie->date_palpage) }}">
                    </div>

                    <!-- Résultat Palpation -->
                    <div class="col-md-6">
                        <label for="palpation_resultat" class="form-label fw-semibold">Résultat de palpation</label>
                        <select class="form-select" id="palpation_resultat" name="palpation_resultat">
                            <option value="">-- Non défini --</option>
                            <option value="+" {{ $saillie->palpation_resultat == '+' ? 'selected' : '' }}>Positif (+)</option>
                            <option value="-" {{ $saillie->palpation_resultat == '-' ? 'selected' : '' }}>Négatif (-)</option>
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
})();

// Disparition auto des notifications après 5s
document.addEventListener("DOMContentLoaded", function () {
    const alertBox = document.getElementById('alertBox');
    if (alertBox) {
        setTimeout(() => {
            alertBox.classList.remove('show');
            alertBox.classList.add('fade');
            setTimeout(() => alertBox.remove(), 500);
        }, 5000);
    }
});
</script>
@endsection
