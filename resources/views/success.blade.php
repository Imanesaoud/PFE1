@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Inscription réussie</h2>

    <div class="card p-4">
        <h4>{{ $user->nom }} {{ $user->prenom }}</h4>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Rôle:</strong> {{ ucfirst($user->role) }}</p>

        @if ($user->photo)
            <p><strong>Photo:</strong><br><img src="{{ asset('storage/' . $user->photo) }}" width="150"></p>
        @endif

        @if ($user->role === 'medecin')
            @if ($user->diplome)
                <p><strong>Diplôme:</strong> <a href="{{ asset('storage/' . $user->diplome) }}" target="_blank">Voir le PDF</a></p>
            @endif
            <p><strong>Horaires:</strong> {{ $user->horaires }}</p>
            <p><strong>Expérience:</strong> {{ $user->experience }}</p>
        @endif
    </div>
</div>
@endsection
