@extends('layouts.app')

@section('content')
<style>.custom-green-button {
    background-color: #2ecc71;
    border-color: #2ecc71;
    color: white; /* Pour le texte du bouton */
    /* Si vous utilisez Bootstrap et voulez surcharger des styles spécifiques */
    /* C'est souvent une bonne idée d'utiliser !important si les styles Bootstrap sont très spécifiques */
    /* ou si vous avez des sélecteurs plus forts */
}

.custom-green-button:hover {
    background-color: #27ae60; /* Une couleur légèrement plus foncée au survol */
    border-color: #27ae60;
    color: white;
}

.custom-green-button:active {
    background-color: #2ecc71; /* Assure la même couleur active */
    border-color: #2ecc71;
}</style>
<div class="container mt-5">
       <div class="d-flex justify-content-between gap-3 mb-4">
         <h2>bienvenue a votre Profil</h2>
<div class="d-flex gap-3">
<a href="{{ route('medecin.profil') }}" class="btn rounded-pill px-3 shadow-sm custom-green-button">
    <i class="fas fa-user-md me-1"></i>Modifier mon profil</a>
<form action="{{route('medecin.deconnexion')}}" method="post">
    @csrf 
    <button type="submit" class="btn rounded-pill px-3 shadow-sm btn-danger"><i class="fas fa-sign-out-alt me-1"></i>Déconnexion</button>
</form>
</div>
                  
</div>
   
    {{-- @dd($listR) --}}
    <div class="card">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="card-body">
            {{-- {{auth()->guard('medecin')->user() ? auth()->guard('medecin')->user()->email:'No'}} --}}
            {{-- {{auth()->guard('medecin')->user()->rendezvous->count()}} --}}
            <table class="table-bordered table-striped table">
                <thead class="table-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>CIN</th>
                        <th>Genre</th>
                        <th>Date de naissance</th>
                        <th>Ville</th>
                        <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($listR as $rendezvous)
                    <tr>
                        <td>{{ $rendezvous->patient->nom }}</td>
                        <td>{{ $rendezvous->patient->prenom }}</td>
                        <td>{{ $rendezvous->patient->email }}</td>
                        <td
                            style="color: {{ $rendezvous->statut == 'confirmer' ? 'green' : ($rendezvous->statut == 'annuler' ? 'red' : 'orange') }}">
                            {{ $rendezvous->statut }}
                        </td>
                        <td>{{ $rendezvous->patient->genre == "H" ? "Homme" : 'Famme' }}</td>
                        <td>{{ Carbon\Carbon::parse($rendezvous->patient->date_de_naissance)->format('d/m/Y') }}</td>
                        <td>{{ $rendezvous->patient->experience ?? 'Non fournie' }}</td>
                        <td>
                            {{ $rendezvous->patient->ville ?? "aucune" }}
                        </td>
                        <td>
                            @if ($rendezvous->patient->photo)
                            <img src="{{ asset($rendezvous->patient->photo) }}" alt="Photo" width="50">
                            @else
                            Aucune
                            @endif
                        </td>
                        <td>
                            <a href="{{route('medecin.valider.rendezvous', $rendezvous->patient_id)}}" class="btn btn-sm btn-success">Valider</a>
                            <a href="{{route('medecin.annuler.rendezvous', $rendezvous->patient_id)}}" class="btn btn-sm btn-warning">Refuse</a>
                            <form action="{{route('medecin.supprimer.rendezvous', $rendezvous->patient_id)}}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Confirmer la suppression de Rendez-vous ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan='10' style='text-align:center'>
                            Aucun Rendez-vous
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection