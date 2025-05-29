<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RendezVousDoc')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
            <a class="navbar-brand fw-bold" href="{{ route('accueil') }}">MEDICAR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('show.medeciens') }}" class="nav-link">Les Profils</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ajouter') }}" class="nav-link">Inscription</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        &copy; {{ date('Y') }} RendezVousDoc. Tous droits réservés.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
