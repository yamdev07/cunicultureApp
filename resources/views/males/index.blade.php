@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-3">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>
            <h2 class="fw-bold text-dark mb-2">Gestion des Mâles</h2>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none text-primary">Tableau de bord</a></li>
                    <li class="breadcrumb-item active text-muted" aria-current="page">Mâles</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('males.create') }}" class="btn btn-primary d-inline-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i> Ajouter un mâle
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success border-0 bg-success-soft fade show mb-4" role="alert">
        <div class="d-flex align-items-center gap-3">
            <i class="bi bi-check-circle-fill fs-5"></i>
            <div>{{ session('success') }}</div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <div class="card border-0 shadow-none bg-white rounded-xxl overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 text-uppercase text-muted fw-semibold small">Code</th>
                            <th class="text-uppercase text-muted fw-semibold small">Nom</th>
                            <th class="text-uppercase text-muted fw-semibold small">Race</th>
                            <th class="text-uppercase text-muted fw-semibold small">Origine</th>
                            <th class="text-uppercase text-muted fw-semibold small">Naissance</th>
                            <th class="text-uppercase text-muted fw-semibold small">État</th>
                            <th class="pe-4 text-end text-uppercase text-muted fw-semibold small">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($males as $m)
                        <tr class="border-bottom border-light">
                            <td class="ps-4 fw-semibold text-dark">{{ $m->code }}</td>
                            <td>{{ $m->nom }}</td>
                            <td><span class="badge bg-primary bg-opacity-10 text-primary">{{ $m->race }}</span></td>
                            <td class="text-muted">{{ $m->origine }}</td>
                            <td class="text-muted">{{ date('d/m/Y', strtotime($m->date_naissance)) }}</td>
                            <td>
                                <form action="{{ route('males.toggleEtat', $m->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="badge border-0
                                        {{ $m->etat === 'Active' ? 'bg-success bg-opacity-10 text-success' : '' }}
                                        {{ $m->etat === 'Gestante' ? 'bg-warning bg-opacity-10 text-warning' : '' }}
                                        {{ $m->etat === 'Allaitante' ? 'bg-primary bg-opacity-10 text-primary' : '' }}
                                        {{ $m->etat === 'Vide' ? 'bg-secondary bg-opacity-10 text-secondary' : '' }}">
                                        {{ $m->etat }}
                                    </button>
                                </form>
                            </td>
                            <td class="pe-4">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('males.edit', $m->id) }}" class="btn btn-sm btn-icon btn-light rounded-circle" title="Modifier">
                                        <i class="bi bi-pencil text-primary"></i>
                                    </a>
                                    <form action="{{ route('males.destroy', $m->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-icon btn-light rounded-circle" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce mâle ?')">
                                            <i class="bi bi-trash text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($males->hasPages())
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center border-top px-4 py-3">
                <div class="text-muted mb-2 mb-md-0">
                    Affichage de <span class="fw-semibold">{{ $males->firstItem() }}</span> à <span class="fw-semibold">{{ $males->lastItem() }}</span> sur <span class="fw-semibold">{{ $males->total() }}</span> mâles
                </div>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        {{ $males->links('vendor.pagination.bootstrap-5-sm') }}
                    </ul>
                </nav>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
