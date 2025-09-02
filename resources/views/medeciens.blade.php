@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container mt-5">
        <h2 class="text-center mb-4 " style="color: #34658c;" ><i class="bi bi-heart-pulse"></i> Liste des Médecins</h2>

        <!-- Barre de recherche -->
        <form method="GET" action="{{route('show.medeciens')}}" class="mb-4">
          <div class="d-flex gap-2" style="margin-inline:auto">
  <select class="form-select form-select-md rounded-2" style="max-width: 200px;" name="spacialitee">
    <option selected>Spécialité</option>
    @foreach($spacialitee as $spec)
    <option value="{{$spec}}">{{$spec}}</option>
    @endforeach
    
  </select>

  <select class="form-select form-select-md rounded-2" style="max-width: 200px;" name="ville">
    <option selected>Ville</option>
  @foreach($villes as $ville)
    <option value="{{$ville}}">{{$ville}}</option>
    @endforeach

  </select><button type="submit" class="btn" style="background-color: #2ecc71; color: white; border: none;">Rechercher</button>
</div>

        </form>

       
    </div>

        <h2 class="mb-4">Liste des Médecins Disponible</h2>
        
        <div class="row">
            @forelse ($medecins as $medecin)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if ($medecin->photo)
                            <img src="{{ asset($medecin->photo) }}" class="card-img-top" alt="Photo du médecin"
                                style="height: 250px; object-fit: cover;">
                        @else
                            <img src="{{asset('default.png')}}" class="card-img-top" alt="Image par défaut"  style="height: 250px; object-fit: cover;">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">Dr. {{ $medecin->prenom }} {{ $medecin->nom }}</h5>
                            <p class="card-text"><strong>Email:</strong> {{ $medecin->email }}</p>
                            <p class="card-text"><strong>Spécialité:</strong> {{ $medecin->spacialitee }}</p>
                            <p class="card-text"><strong>Ville:</strong> {{ $medecin->ville }}</p>
                            
                            <p class="card-text"><strong>Expérience:</strong> {{ $medecin->experience }}</p>

                                <a href="{{route('ajouter.patient', $medecin->id)}}"
                                    class="btn btn-sm btn-outline-primary mt-2">Reserver rendez-vous</a>
                            
                             <a href="{{route('voir.medcin',$medecin->id)}}"
                                    class="btn btn-sm btn-outline-primary mt-2">Voir plus</a>
                        </div>
                    </div>
                </div>
            @empty
                <div>Aucun médicament disponible.</div>
            @endforelse
        </div>
    </div>
@endsection
