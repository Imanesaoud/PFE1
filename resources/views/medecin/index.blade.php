@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>bienvenue a votre Profil</h2>
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