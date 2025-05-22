<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Accueil - Rendez-vous Médical</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f4f8;
        }
        .hero {
            background: url('https://source.unsplash.com/1600x600/?doctor,clinic,medical') no-repeat center center;
            background-size: cover;
            height: 60vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-shadow: 2px 2px 6px #000;
        }
        .btn-primary-custom {
            background-color: #007bff;
            border: none;
        }
        .btn-primary-custom:hover {
            background-color: #0056b3;
        }
        footer {
            margin-top: 50px;
            padding: 15px 0;
            background-color: #343a40;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">MEDICAR</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" 
            aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a href="#" class="nav-link">Connexion</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Inscription</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero text-center">
    <div>
        <h1 class="display-4 fw-bold">Prenez rendez-vous avec votre médecin</h1>
        <p class="lead mb-4">Simple, rapide et sécurisé</p>
        <a href="{{ route('rendezvous.create') }}" class="btn btn-primary btn-lg btn-primary-custom">Réserver un rendez-vous</a>
    </div>
</section>

<!-- Footer -->
<footer>
    &copy; {{ date('Y') }} RendezVousDoc. Tous droits réservés.
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
