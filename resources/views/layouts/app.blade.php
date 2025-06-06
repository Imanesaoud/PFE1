<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MEDICAR')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f2f4f8; /* Soft Grey - Now truly consistent with homepage background */
            /* Add padding to the body to prevent content from being hidden behind the fixed navbar */
            padding-top: 70px; /* Adjust this value based on your navbar's height */
        }
        .content-wrapper {
            flex: 1; /* This pushes the footer to the bottom */
        }
        footer {
            margin-top: auto; /* Ensures footer is always at the bottom */
            padding: 25px 0;
            background-color: #34658c; /* Primary Blue - Cohesive with hero section */
            color: white;
            text-align: center;
            font-size: 0.9rem;
        }
        /* Navbar specific styling to match the new color palette */
        .navbar-custom {
            background-color: #34658c !important; /* Primary Blue for navbar */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Slightly stronger shadow for definition */
        }
        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: white !important; /* Ensure brand name is white */
        }
        .nav-link {
            font-size: 1.1rem;
            margin-right: 15px;
            color: rgba(255, 255, 255, 0.9) !important; /* Slightly transparent white for links */
            transition: color 0.3s ease;
        }
        .nav-link:hover, .nav-link.active {
            color: #2ecc71 !important; /* Accent Green on hover for links */
        }
        .dropdown-menu {
            border-radius: 0.5rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            background-color: white; /* Dropdown background */
        }
        .dropdown-item {
            color: #34658c !important; /* Primary Blue for dropdown items */
        }
        .dropdown-item:hover {
            background-color: #e9ecef; /* Light grey on hover for dropdown items */
            color: #34658c !important; /* Keep text color consistent on hover */
        }
        /* General icons in nav links */
        .nav-link .fas {
            margin-right: 5px;
        }
    </style>
    @stack('styles') {{-- Allows child pages to push custom styles --}}
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top"> {{-- Added fixed-top here --}}
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('accueil') }}">MEDICAR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('about.us') }}"class="nav-link"><i class="fas fa-info-circle me-1"></i>À Propos</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('show.medeciens') }}" class="nav-link"><i class="fas fa-user-md me-1"></i>Les Profils</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link"><i class="fas fa-envelope me-1"></i>Contacter nous</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-sign-in-alt me-1"></i>Connexion
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('login.med') }}">Médecin</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('login.patient') }}">Patient</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ajouter') }}" class="nav-link"><i class="fas fa-user-plus me-1"></i>Inscription</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container content-wrapper">
        @yield('content')
    </div>

    <footer>
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} MEDICAR. Tous droits réservés.</p>
            <p class="mb-0">Designed with <i class="fas fa-heart text-danger"></i> by YourTeam</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>