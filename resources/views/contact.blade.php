@extends('layouts.app')
@section('content')
    <style>
        body {
            background-color: #f8f9fa; /* Light grey background, if not already set by your app's main CSS */
        }
        .contact-form-card {
            margin-top: 50px;
            margin-bottom: 50px;
            box-shadow: 0 4px 8px rgba(0,0,0,.05);
            border-radius: .5rem;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card contact-form-card">
                    <div class="card-body p-4">
                        <h2 class="card-title text-center mb-4">Contactez-nous</h2>
                        <p class="text-center text-muted mb-4">Nous serions ravis de vous entendre ! Remplissez le formulaire ci-dessous ou contactez-nous via les coordonnées.</p>

                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom complet</label>
                                <input type="text" class="form-control" id="name" placeholder="Votre nom" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Adresse e-mail</label>
                                <input type="email" class="form-control" id="email" placeholder="nom@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Sujet</label>
                                <input type="text" class="form-control" id="subject" placeholder="Sujet de votre message" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Votre message</label>
                                <textarea class="form-control" id="message" rows="5" placeholder="Écrivez votre message ici..." required></textarea>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">Envoyer le message</button>
                            </div>
                        </form>

                        <hr class="my-4">

                        <div class="text-center">
                            <h5>Ou contactez-nous directement :</h5>
                            <ul class="list-unstyled mb-0 mt-3">
                                <li><i class="bi bi-geo-alt-fill me-2"></i> 123 Rue de l'Exemple, Fès, Maroc</li>
                                <li><i class="bi bi-phone-fill me-2"></i> +212 6 XX XX XX XX</li>
                                <li><i class="bi bi-envelope-fill me-2"></i> contact@medicar.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection