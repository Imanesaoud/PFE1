<!-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Tableau de bord')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #f8f9fa;
            padding: 20px;
            border-right: 1px solid #dee2e6;
        }
        .content {
            flex-grow: 1;
            padding: 30px;
        }
        .sidebar a {
            display: block;
            margin-bottom: 15px;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h5>Menu</h5>
        <a href="{{route('medecin.index')}}" class="btn btn-outline-primary w-100">Tableau des patients</a>
        <a href="{{route('medecin.profil')}}" class="btn btn-outline-secondary w-100">Modifier mon profil</a>

    </div>
    <div class="content">
        @yield('content')
    </div>
</body>
</html> -->
