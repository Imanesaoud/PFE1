@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container mt-5">
        <h2 class="text-center mb-4 text-primary"><i class="bi bi-heart-pulse"></i> Liste des Médecins</h2>

        <!-- Barre de recherche -->
        <form method="GET" action="" class="mb-4">
          <div class="d-flex gap-2" style="margin-inline:auto">
  <select class="form-select form-select-md rounded-2" style="max-width: 200px;">
    <option selected>Spécialité</option>
    <option value="1">Cardiologue</option>
    <option value="2">Dermatologue</option>
  </select>

  <select class="form-select form-select-md rounded-2" style="max-width: 200px;">
    <option selected>Ville</option>
    <option value="1">Lyon</option>
    <option value="2">Paris</option>
  </select>

  <button class="btn btn-primary">Rechercher</button>
</div>

        </form>

       
    </div>

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
                                <a href="#" target="_blank"
                                    class="btn btn-sm btn-outline-primary mt-2">Reserver rendez-vous</a>
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
