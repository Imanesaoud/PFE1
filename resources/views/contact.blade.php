@extends('layouts.app')

@push('styles')
<style>
    body {
        background-color: #f2f4f8; /* Consistent Soft Grey background */
    }

    /* Page-specific Hero for Contact Us */
    .contact-hero {
        background-color: #34658c; /* Primary Blue background */
        color: white;
        padding: 80px 0;
        text-align: center;
        margin-bottom: 50px;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .contact-hero h1 {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .contact-hero p {
        font-size: 1.25rem;
        opacity: 0.9;
    }

   
    .section-spacing {
        padding: 60px 0;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #34658c; /* Primary Blue for titles */
        margin-bottom: 40px;
        text-align: center;
    }

    .section-paragraph {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #555;
        max-width: 900px;
        margin: 0 auto 40px auto;
        text-align: center; /* Centered for contact page intro */
    }

    /* Contact Form Specific Styling */
    .contact-form-container {
        background-color: white;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        max-width: 700px; /* Max width for the form */
        margin: 0 auto; /* Center the form */
    }

    .form-control {
        border-radius: 8px; /* Rounded corners for inputs */
        padding: 12px 15px;
        border: 1px solid #ced4da; /* Default Bootstrap border */
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .form-control:focus {
        border-color: #34658c; /* Primary Blue focus glow */
        box-shadow: 0 0 0 0.25rem rgba(52, 101, 140, 0.25); /* Subtle blue glow */
    }

    .btn-submit-contact {
        background-color: #2ecc71; /* Accent Green for submit button */
        border: none;
        padding: 14px 40px;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 50px;
        color: white;
        transition: background-color 0.3s ease, transform 0.2s ease;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }

    .btn-submit-contact:hover {
        background-color: #27ae60;
        transform: translateY(-3px);
    }

    /* Contact Info Styling */
    .contact-info-card {
        background-color: #f2f4f8; /* Soft Grey background */
        padding: 30px;
        border-radius: 12px;
        text-align: center;
        height: 100%;
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    }

    .contact-info-card .icon {
        font-size: 2.5rem;
        color: #34658c; /* Primary Blue for info icons */
        margin-bottom: 15px;
    }

    .contact-info-card h4 {
        font-size: 1.4rem;
        font-weight: 600;
        color: #34658c;
        margin-bottom: 10px;
    }

    .contact-info-card p {
        font-size: 1rem;
        color: #6c757d;
        margin-bottom: 0;
    }

    /* Alert messages for success/error */
    .alert-custom {
        border-radius: 8px;
        font-size: 1.1rem;
        padding: 15px;
        margin-bottom: 20px;
    }
    .alert-success-custom {
        background-color: rgba(46, 204, 113, 0.1); /* Light green tint */
        color: #2ecc71;
        border-color: #2ecc71;
    }
    .alert-danger-custom {
        background-color: rgba(231, 76, 60, 0.1); /* Light red tint */
        color: #e74c3c;
        border-color: #e74c3c;
    }

</style>
@endpush

@section('title', 'Contacter Nous - MEDICAR')

@section('content')
    <section class="contact-hero">
        <div class="container">
            <h1>Contacter Nous</h1>
            <p>Nous sommes là pour vous aider !</p>
        </div>
    </section>

    <section class="section-spacing pt-0">
        <div class="container">
            <h2 class="section-title">Comment pouvons-nous vous aider ?</h2>
            <p class="section-paragraph">
                Que vous ayez des questions, des commentaires ou que vous ayez besoin d'assistance, n'hésitez pas à nous contacter. Remplissez le formulaire ci-dessous ou utilisez nos coordonnées directes.
            </p>

            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="contact-info-card">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h4>Adresse</h4>
                        <p>123 Rue de la Santé,</p>
                        <p>75000 Casablanca, Maroc</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info-card">
                        <div class="icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h4>Téléphone</h4>
                        <p>+212 5XX XXX XXX</p>
                        <p>Lun - Ven, 9h - 18h</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info-card">
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h4>Email</h4>
                        <p>contact@medicar.ma</p>
                        <p>Support rapide et efficace</p>
                    </div>
                </div>
            </div>

            <div class="contact-form-container">
                <h3 class="section-title mb-4">Envoyez-nous un message</h3>

                {{-- Success/Error messages (e.g., from Controller after form submission) --}}
                @if(session('success'))
                    <div class="alert alert-success alert-custom alert-success-custom">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-custom alert-danger-custom">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{-- {{ route('contact.submit') }} --}}" method="POST">
                    @csrf {{-- Laravel CSRF protection --}}

                    <div class="mb-3">
                        <label for="name" class="form-label">Votre Nom Complet</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Votre Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Sujet</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="form-label">Votre Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-submit-contact">
                            Envoyer le Message <i class="fas fa-paper-plane ms-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="cta-about mt-5">
        <div class="container">
            <h2>Vous êtes professionnel de santé ?</h2>
            <p class="lead mb-4">Rejoignez notre réseau et développez votre patientèle.</p>
            <a href="{{ route('ajouter') }}" class="btn btn-cta-about">
                Inscrivez-vous ici <i class="fas fa-user-md ms-2"></i>
            </a>
        </div>
    </section>
@endsection