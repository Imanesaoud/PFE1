@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Liste des Médecins</h2>

        <div class="row">
            @forelse ($medecins as $medecin)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if ($medecin->photo)
                            <img src="{{ asset($medecin->photo) }}" class="card-img-top" alt="Photo du médecin"
                                style="height: 250px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/300x250" class="card-img-top" alt="Image par défaut">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $medecin->prenom }} {{ $medecin->nom }}</h5>
                            <p class="card-text"><strong>Email:</strong> {{ $medecin->email }}</p>
                            <p class="card-text"><strong>Spécialité:</strong> {{ $medecin->spacialitee }}</p>
                            <p class="card-text"><strong>Ville:</strong> {{ $medecin->ville }}</p>
                            <p class="card-text"><strong>Horaires:</strong> {{ $medecin->horaires }}</p>
                            <p class="card-text"><strong>Expérience:</strong> {{ $medecin->experience }}</p>

                            @if ($medecin->diplome)
                                <a href="{{ asset('storage/' . $medecin->diplome) }}" target="_blank"
                                    class="btn btn-sm btn-outline-primary mt-2">Voir le diplôme</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div>Aucun médicament disponible.</div>
            @endforelse
        </div>
    </div>
@endsection
