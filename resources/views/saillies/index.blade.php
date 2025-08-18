@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">
    <!-- Header avec breadcrumb et bouton Ajouter -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>
            <h2 class="fw-bold text-dark mb-2">Gestion des Saillies</h2>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}" class="text-decoration-none text-primary">Tableau de bord</a>
                    </li>
                    <li class="breadcrumb-item active text-muted" aria-current="page">Saillies</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('saillies.create') }}" class="btn btn-primary d-inline-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i> Ajouter une saillie
        </a>
    </div>

    <!-- Alert succès -->
    @if(session('success'))
    <div class="alert alert-success border-0 bg-success-soft fade show mb-4" role="alert">
        <div class="d-flex align-items-center gap-3">
            <i class="bi bi-check-circle-fill fs-5"></i>
            <div>{{ session('success') }}</div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <!-- Tableau des saillies -->
    <div class="card border-0 shadow-none bg-white rounded-xxl overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 text-uppercase text-muted fw-semibold small">Femelle</th>
                            <th class="text-uppercase text-muted fw-semibold small">Mâle</th>
                            <th class="text-uppercase text-muted fw-semibold small">Date Saillie</th>
                            <th class="text-uppercase text-muted fw-semibold small">Date Palpation</th>
                            <th class="pe-4 text-end text-uppercase text-muted fw-semibold small">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($saillies as $s)
                        <tr class="border-bottom border-light">
                            <td class="ps-4 fw-semibold text-dark">{{ $s->femelle->nom ?? '-' }}</td>
                            <td>{{ $s->male->nom ?? '-' }}</td>
                            <td class="text-muted">{{ date('d/m/Y', strtotime($s->date_saillie)) }}</td>
                            <td class="text-muted">{{ $s->date_palpage ? date('d/m/Y', strtotime($s->date_palpage)) : '-' }}</td>
                            <td class="pe-4">
                                <div class="d-flex justify-content-end gap-2">
                                    <!-- Bouton Modifier -->
                                    <a href="{{ route('saillies.edit', $s) }}" class="btn btn-sm btn-icon btn-light rounded-circle" title="Modifier">
                                        <i class="bi bi-pencil text-primary"></i>
                                    </a>
                                    <!-- Bouton Supprimer -->
                                    <form action="{{ route('saillies.destroy', $s) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-icon btn-light rounded-circle" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette saillie ?')">
                                            <i class="bi bi-trash text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">Aucune saillie enregistrée.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($saillies->hasPages())
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center border-top px-4 py-3">
                <div class="text-muted mb-2 mb-md-0">
                    Affichage de <span class="fw-semibold">{{ $saillies->firstItem() }}</span> à <span class="fw-semibold">{{ $saillies->lastItem() }}</span> sur <span class="fw-semibold">{{ $saillies->total() }}</span> saillies
                </div>
                <nav>
                    {{ $saillies->links('vendor.pagination.bootstrap-5') }}
                </nav>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
