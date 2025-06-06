@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4" style="color: #34658c;">Créer un compte pour un medcin</h2>
    @if ($errors->any())

    <div class="alert alert-danger">

        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach

        </ul>

    </div>

    @endif
    <form action="{{route('rendezvous.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <label>Nom:</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Prénom:</label>
                <input type="text" name="prenom" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <label>date de naissance :</label>
            <input type="date" name="date_de_naissance" class="form-control" required>
        </div>
</div>
<div class="mt-3">
    <label>ville</label>
    <input type="text" name="ville" class="form-control" required>
</div>

<label class="mt-3">Email:</label>
<input type="email" name="email" class="form-control" required><br>
<label for="genre">Genre :</label>
<div class="form-check">

    <input class="form-check-input" type="radio" value="M" id="genre" name="genre">
    <label class="form-check-label" for="M">
        M
    </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="genre" value="F" id="genre" checked>
    <label class="form-check-label" for="F">
        F
    </label>
</div>
<label class="mt-3">Mot de passe:</label>
<input type="password" name="mote_de_passe" class="form-control" required>

<label class="mt-3">Photo:</label>
<input type="file" name="photo" class="form-control">

<label class="mt-3">Rôle:</label>
<select name="role" id="role" class="form-select">
    {{-- <option value="patient">Patient</option> --}}
    <option value="medecin">Médecin</option>

</select>

<div id="medecinFields">
    <label class="mt-3">Diplôme (PDF):</label>
    <input type="file" name="diplome" class="form-control">

    <label class="mt-3">Horaires disponibles:</label>
    <input type="text" name="horaires" class="form-control" placeholder="Ex: Lundi à Vendredi, 9h-17h">
    <select name="spacialitee" id="" class="form-select" required>
        <option value="Pédiatrie">Pédiatrie</option>
        <option value="Médecine Générale">Médecine Générale</option>
        <option value="Gynécologie">Gynécologie</option>
        <option value="Cardiologie">Cardiologie</option>
        <option value="Dermatologie">Dermatologie</option>
        <option value="Ophtalmologie">Ophtalmologie</option>
    </select>
    <label class="mt-3">Expériences:</label>
    <textarea name="experience" class="form-control" rows="4">

            </textarea>
</div>

<button type="submit" class="btn btn-primary mt-4">S'inscrire</button>
</form>
</div>
@endsection