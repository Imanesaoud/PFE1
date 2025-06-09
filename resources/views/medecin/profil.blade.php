@extends('layouts.app')

@section('content')
    @php
        $medecin = auth()->guard('medecin')->user();
    @endphp

   @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('danger'))
            <div class="alert alert-danger">{{ session('danger') }}</div>
        @endif
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="container py-4"> {{-- Changed from container-fluid to container for better content width control --}}
            <div class="d-flex justify-content-between align-items-center mb-5 border-bottom pb-3"> {{-- Added border-bottom for subtle separation --}}
                <div>
                    <h2 class="h4 text-muted mb-0">Mon Profil Médical</h2> {{-- Removed margin-bottom from h2 --}}
                </div>
                <div class="d-flex gap-3">
                    <a href="{{ route('medecin.index') }}" class="btn btn-outline-primary rounded-pill px-3 shadow-sm"> {{-- Added shadow-sm --}}
                        <i class="fas fa-calendar-alt me-2"></i>Mes RDV
                    </a>
                    <a href="#" class="btn btn-outline-secondary rounded-pill px-3 shadow-sm"> {{-- Added shadow-sm --}}
                        <i class="fas fa-cog me-2"></i>Paramètres
                    </a>
                </div>
            </div>

            <div class="row g-4 justify-content-center"> {{-- Increased gutter and centered columns --}}
                <div class="col-lg-7 col-md-8"> {{-- Adjusted column sizing for better responsiveness --}}
                    <div class="card rounded-4 border-0 shadow-lg p-3"> {{-- More rounded corners, stronger shadow, added padding --}}
                        <div class="card-header border-0 bg-white pt-4 pb-3"> {{-- Adjusted padding --}}
                            <h3 class="fw-bold text-primary mb-0 fs-5"> {{-- Adjusted font size --}}
                                <i class="fas fa-user-md me-2"></i>Informations Personnelles
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-4 text-center">
                                @if ($medecin->photo)
                                    <img src="{{ asset($medecin->photo) }}"
                                        class="img-fluid rounded-circle object-fit-cover border border-primary border-3"
                                        style="width: 140px; height: 140px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);" alt="Photo de profil"> {{-- Larger size, distinct border, subtle shadow --}}
                                @else
                                    <div class="rounded-circle border-3 border-primary d-inline-flex align-items-center justify-content-center bg-light-primary border shadow"
                                        style="width: 140px; height: 140px; font-size: 3.5rem;"> {{-- Larger size, larger font for initials --}}
                                        <span class="text-primary fw-bold">
                                            {{ strtoupper(substr($medecin->prenom, 0, 1)) }}{{ strtoupper(substr($medecin->nom, 0, 1)) }}
                                        </span>
                                    </div>
                                @endif
                                <h4 class="fw-bold mb-1 mt-3 text-dark">Dr. {{ $medecin->prenom }} {{ $medecin->nom }}</h4>
                                <span class="badge bg-primary text-white fs-6 px-3 py-2 rounded-pill opacity-75"> {{-- Solid primary background, rounded-pill --}}
                                    {{ $medecin->specialite ?? 'Médecin généraliste' }}
                                </span>
                            </div>

                            <div class="border-top pt-4 mt-4"> {{-- Increased top padding and margin --}}
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label text-muted fw-semibold">Nom</label> {{-- Bold label --}}
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext fw-bold text-dark"
                                            value="{{ $medecin->nom }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label text-muted fw-semibold">Prénom</label> {{-- Bold label --}}
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext fw-bold text-dark"
                                            value="{{ $medecin->prenom }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label text-muted fw-semibold">Email</label> {{-- Bold label --}}
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext text-dark"
                                            value="{{ $medecin->email }}">
                                    </div>
                                </div>

                                <form method="POST" action="{{route('medecin.update')}}" enctype="multipart/form-data" class="mt-4"> {{-- Added top margin to form --}}
                                    @csrf
                                    @method('PUT')

                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label text-muted fw-semibold">Expérience</label> {{-- Bold label --}}
                                        <div class="col-sm-8">
                                            <div class="input-group shadow-sm-sm">
                                                <input type="text" class="form-control rounded-start" name="experience"
                                                    value="{{ $medecin->experience ?? '' }}" placeholder="Années d'expérience">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label class="col-sm-4 col-form-label text-muted fw-semibold">Photo</label> {{-- Bold label --}}
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control shadow-sm-sm" name="photo"> {{-- Added subtle shadow --}}
                                        </div>
                                    </div>

                                    <div class="card-header border-0 bg-white py-3 mt-4"> {{-- Added top margin --}}
                                        <h3 class="fw-bold text-primary mb-0 fs-5">
                                            <i class="fas fa-clock me-2"></i>Mes Horaires
                                        </h3>
                                    </div>
                                    <div class="card-body px-0 pt-3 pb-0"> {{-- Adjusted padding for card body --}}
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold text-muted">Horaires de travail</label>
                                            <textarea class="form-control shadow-sm-sm" name="horaires" rows="3" placeholder="Ex: Lundi-Vendredi: 8h-12h et 14h-18h">{{ $medecin->horaires ?? '' }}</textarea>
                                        </div>

                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 shadow hover-lift"> {{-- Larger button, more prominent shadow and hover effect --}}
                                                <i class="fas fa-save me-2"></i>Mettre à jour
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Custom Styles for this page --}}
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background for the entire page */
        }

        .container {
            max-width: 960px; /* Max width for the main container */
        }

        .bg-light-primary {
            background-color: #e0f2fe; /* Light blue, unchanged */
        }

        /* Card and Button Hover Effects */
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            /* Default shadow */
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.08) !important;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15) !important; /* Stronger shadow on hover */
        }

        .hover-lift {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .hover-lift:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.2) !important;
        }

        /* Form Control Shadows */
        .shadow-sm-sm {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important; /* Lighter shadow for inputs */
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25) !important; /* Primary color focus ring */
            border-color: #86b7fe !important; /* Slightly darker primary border on focus */
        }

        .form-control-plaintext {
            color: #343a40 !important; /* Ensure plaintext is dark */
        }

        .text-primary {
            color: #0d6efd !important; /* Bootstrap primary blue */
        }

        .btn-outline-primary {
            border-color: #0d6efd;
            color: #0d6efd;
        }
        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: #fff;
        }
        .btn-outline-secondary {
            border-color: #6c757d;
            color: #6c757d;
        }
        .btn-outline-secondary:hover {
            background-color: #6c757d;
            color: #fff;
        }
    </style>
@endsection