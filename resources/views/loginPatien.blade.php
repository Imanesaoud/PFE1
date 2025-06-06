@extends('layouts.app')

@section('content')
  <style>
    body {
      background-color: #f0f4f8;
    }
    .login-card {
      max-width: 400px;
      margin: 80px auto;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      background-color: white;
    }
  </style>

<div class="container">
  <div class="login-card">
    <h4 class="mb-4 text-center">Connexion</h4>
    @if (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
    @endif
    <form action="{{ route('patient.login') }}" method="POST">
      @csrf
      <!-- Email -->
      <div class="mb-3">
        <label for="email" class="form-label">Adresse e-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="exemple@domain.com" required>
      </div>

      <!-- Mot de passe -->
      <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="mote_de_passe" placeholder="********" required>
      </div>

      <!-- Bouton -->
      <button type="submit" class="btn btn-primary w-100">Se connecter</button>

      <div class="mt-3 text-center">
        <p class="mb-0">Vous n'avez pas de compte? <a href="{{ route('show.medeciens') }}" class="text-primary fw-bold">Reserver rendez-vous</a></p>
      </div>
    </form>
  </div>
</div>
@endsection
