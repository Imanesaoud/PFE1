@extends('layouts.app')
@section('content')
<style>
    .custom-green-button {
        background-color: #2ecc71;
        border-color: #2ecc71;
        color: white;
        /* Pour le texte du bouton */
        /* Si vous utilisez Bootstrap et voulez surcharger des styles spécifiques */
        /* C'est souvent une bonne idée d'utiliser !important si les styles Bootstrap sont très spécifiques */
        /* ou si vous avez des sélecteurs plus forts */
    }

    .custom-green-button:hover {
        background-color: #27ae60;
        /* Une couleur légèrement plus foncée au survol */
        border-color: #27ae60;
        color: white;
    }

    .custom-green-button:active {
        background-color: #2ecc71;
        /* Assure la même couleur active */
        border-color: #2ecc71;
    }
</style>
<div class="container mt-5">
    <div class="d-flex justify-content-between gap-3 mb-4">
        <h2>bienvenue a votre Profil</h2>
        <div class="d-flex gap-3">
            <form action="{{route('patient.deconnexion')}}" method="post">
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
                        <th>Ville</th>
                        <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                   @forelse ($ListR as $item)
                   
                        <tr>
                            <td>{{ $item->nom }}</td>
                            <td>{{ $item->prenom }}</td>
                            <td>{{ $item->email }}</td>
                            <td style="color: {{ $item->statut == 'confirmer' ? 'green' : ($item->statut == 'annuler' ? 'red' : 'orange') }}">
                                {{ $item->statut }}
                            </td>
                            <td>{{ $item->ville ?? "aucune" }}</td>
                            <td>
                                @if ($item->photo)
                                    <img src="{{ asset($item->photo) }}" alt="Photo" width="50">
                                @else
                                    Aucune
                                @endif
                            </td>
                            <td>
                                <a href="{{route('telechargerPDF', $item->medecin_id)}}" class="btn btn-sm" style="background-color: #27ae60;color:white">Télécharger Document</a>
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