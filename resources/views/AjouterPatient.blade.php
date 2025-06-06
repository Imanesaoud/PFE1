@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card p-4 shadow-sm">
        <h4 class="mb-4">Formulaire de réservation</h4>
        <form action="{{ route('store.patient') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Nom:</label>
                    <input type="text" name="nom" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Prénom:</label>
                    <input type="text" name="prenom" class="form-control" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Date de naissance:</label>
                    <input type="date" name="date_de_naissance" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Ville:</label>
                    <input type="text" name="ville" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">CIN:</label>
                    <input type="text" name="cin" class="form-control" required pattern="[A-Za-z]{1,2}[0-9]{4,6}" title="Exemple: AB123456">
                </div>
            </div>

            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Photo(facultatif):</label>
                    <input type="file" name="photo" class="form-control" accept="image/*">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Mot de passe:</label>
                    <input type="password" name="mote_de_passe" class="form-control" required>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label class="form-label d-block">Genre:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genre" id="genreM" value="M" required>
                        <label class="form-check-label" for="genreM">Masculin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genre" id="genreF" value="F">
                        <label class="form-check-label" for="genreF">Féminin</label>
                    </div>
                </div>
            </div>

            <input type="hidden" name="medecin_id" value="{{ $medecin->id }}">


            <button type="submit" class="btn btn-primary w-100" style="background-color: #2ecc71;">Réserver le rendez-vous</button>
            <span>
                <p style="text-align: center; padding-top: 10px">Si vous-avez un compte, vous pouvez vous connecter <a href="#">Connectrez-vous</a>.</p>
            </span>
        </form>
    </div>
</div>
@endsection