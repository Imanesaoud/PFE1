@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Profil du Médecin</h2>

    <div class="card">
        <div class="card-body">
            <h4>{{ $user->prenom }} {{ $user->nom }}</h4>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Horaires:</strong> {{ $user->horaires ?? 'Non spécifié' }}</p>
            <p><strong>Expérience:</strong> {{ $user->experience ?? 'Non spécifiée' }}</p>
            <p><strong>Diplôme:</strong> 
                @if($user->diplome)
                    <a href="{{ asset('storage/' . $user->diplome) }}" target="_blank">Voir le diplôme</a>
                @else
                    Non fourni
                @endif
            </p>
            @if($user->photo)
                <img src="{{ asset('storage/' . $user->photo) }}" class="img-fluid rounded" style="max-width: 200px;" alt="Photo">
            @endif
        </div>
    </div>
</div>
@endsection
