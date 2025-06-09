@extends('layouts.app')

@section('content')
@php
    $medecin = auth()->guard('medecin')->user();
@endphp

<div class="container-fluid py-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            
            <h2 class="h4 text-muted">Mon Profil Médical</h2>
        </div>
        <div class="d-flex gap-3">
            <a href="{{route('medecin.index')}}" class="btn btn-outline-primary rounded-pill px-3">
                <i class="fas fa-calendar-alt me-2"></i>Mes RDV
            </a>
            <a href="#" class="btn btn-outline-secondary rounded-pill px-3">
                <i class="fas fa-cog me-2"></i>Paramètres
            </a>
        </div>
    </div>

    <div class="row g-4">
        <!-- Profil du médecin -->
        <div class="col-md-5">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white border-0 py-3">
                    <h3 class="fw-bold mb-0 " >
                        <i class="fas fa-user-md me-2"></i>Informations Personnelles
                    </h3>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        @if($medecin->photo)
                            <img src="{{ asset('storage/' . $medecin->photo) }}" class="img-fluid rounded" style="max-width: 200px;" alt="Photo de profil">
                        @else
                            <div class="rounded-circle shadow border border-3 border-primary d-inline-flex align-items-center justify-content-center bg-light-primary" 
                                 style="width: 120px; height: 120px;">
                                <span class="text-primary fs-1 fw-bold">
                                    {{ strtoupper(substr($medecin->prenom, 0, 1)) }}{{ strtoupper(substr($medecin->nom, 0, 1)) }}
                                </span>
                            </div>
                        @endif
                        <h4 class="mt-3 mb-1 fw-bold">Dr. {{ $medecin->prenom }} {{ $medecin->nom }}</h4>
                        <span class="badge bg-primary bg-opacity-10 text-primary fs-6 py-2 px-3">
                            {{ $medecin->specialite ?? 'Médecin généraliste' }}
                        </span>
                    </div>

                    <div class="border-top pt-3">
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label text-muted">Nom</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext fw-bold" value="{{ $medecin->nom }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label text-muted">Prénom</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext fw-bold" value="{{ $medecin->prenom }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label text-muted">Email</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" value="{{ $medecin->email }}">
                            </div>
                        </div>

                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label text-muted">Expérience</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="experience" value="{{ $medecin->experience ?? '' }}">
                                        <span class="input-group-text">années</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label class="col-sm-4 col-form-label text-muted">Photo</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="photo">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-4 rounded-pill">
                                    <i class="fas fa-save me-2"></i>Mettre à jour
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Horaires de travail -->
        <div class="col-md-7">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-header bg-white border-0 py-3">
                    <h3 class="fw-bold mb-0 text-primary">
                        <i class="fas fa-clock me-2"></i>Mes Horaires
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" action=""
                        @csrf
                        
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Horaires de travail</label>
                            <textarea class="form-control" name="horaires" rows="3" placeholder="Ex: Lundi-Vendredi: 8h-12h et 14h-18h">{{ $medecin->horaires ?? '' }}</textarea>
                        </div>

                        <h5 class="fw-semibold mb-3">Jours de consultation</h5>
                        <div class="row g-2 mb-4">
                            @foreach(['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'] as $jour)
                                <div class="col-6 col-md-4">
                                    <div class="form-check card p-3 border-0 rounded-3 hover-shadow">
                                        <input class="form-check-input" type="checkbox" name="jours[]" value="{{ $jour }}" 
                                               id="jour{{ $loop->index }}" {{ str_contains($medecin->horaires ?? '', $jour) ? 'checked' : '' }}>
                                        <label class="form-check-label ms-2" for="jour{{ $loop->index }}">{{ $jour }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-4 rounded-pill">
                                <i class="fas fa-calendar-check me-2"></i>Enregistrer les horaires
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-light-primary {
        background-color: #e0f2fe;
    }
    .hover-shadow {
        transition: all 0.3s ease;
    }
    .hover-shadow:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.1) !important;
    }
</style>
@endsection