@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Modifier les informations du médecin</h2>

    <form method="POST" action="{{ route('admin.medecins.update', $medecin->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ $medecin->nom }}" required>
        </div>
        <div class="mb-3">
            <label>Prénom</label>
            <input type="text" name="prenom" class="form-control" value="{{ $medecin->prenom }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $medecin->email }}" required>
        </div>
        <div class="mb-3">
            <label>Horaires</label>
            <input type="text" name="horaires" class="form-control" value="{{ $medecin->horaires }}">
        </div>
        <div class="mb-3">
            <label>Expérience</label>
            <textarea name="experience" class="form-control">{{ $medecin->experience }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('admin.medecins.liste') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
