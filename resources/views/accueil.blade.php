@extends('layouts.app')

@push('styles')
<style>
    /* Overall body background for cohesion */
    body {
        background-color: #f2f4f8; /* Soft Grey - Overall page background */
    }

    /* Hero Section Styling (from your previous image's style) */
    .hero-main-style {
        background-color: #34658c; /* Primary Blue - Hero background color */
        height: 60vh;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        margin-top: 30px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .hero-main-style h1 {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .hero-main-style p.lead {
        font-size: 1.5rem;
        margin-bottom: 40px;
        opacity: 0.95;
    }

    .btn-hero-action {
        background-color: #2ecc71; /* Accent Green - Button color */
        border: none;
        padding: 18px 45px;
        font-size: 1.3rem;
        border-radius: 50px;
        transition: background-color 0.3s ease, transform 0.2s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        font-weight: 600;
        color: white;
    }

    .btn-hero-action:hover {
        background-color: #27ae60;
        transform: translateY(-3px);
    }

    /* Responsive adjustments for Hero */
    @media (max-width: 768px) {
        .hero-main-style {
            height: 50vh;
            margin-top: 20px;
            border-radius: 8px;
        }
        .hero-main-style h1 {
            font-size: 2.5rem;
        }
        .hero-main-style p.lead {
            font-size: 1.2rem;
        }
        .btn-hero-action {
            padding: 15px 35px;
            font-size: 1.1rem;
        }
    }

    /* General Section Styling */
    .section-spacing {
        padding: 70px 0;
    }

    .section-title {
        font-size: 2.8rem;
        font-weight: 700;
        color: #34658c; /* Primary Blue for titles */
        margin-bottom: 50px;
        text-align: center;
    }

    .section-subtitle {
        font-size: 1.3rem;
        color: #555;
        text-align: center;
        margin-bottom: 60px;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Feature Card Styling for 'Why Choose Us' - Enhanced */
    .benefit-card {
        background-color: white;
        border-radius: 12px;
        padding: 35px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        border: 1px solid rgba(0,0,0,0.05);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .benefit-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
    }

    .benefit-card .icon {
        font-size: 3.8rem;
        color: #2ecc71; /* Accent Green for benefit icons to highlight them */
        margin-bottom: 25px;
    }

    .benefit-card h3 {
        font-size: 1.8rem;
        color: #34658c; /* Primary Blue for benefit headings */
        margin-bottom: 15px;
        font-weight: 600;
    }

    .benefit-card p {
        color: #7f8c8d;
        line-height: 1.7;
    }

    /* Background for How It Works section */
    .bg-how-it-works {
        background-color: #e9f0f5; /* A slightly lighter blue-grey for this section */
        border-radius: 12px;
        margin: 60px 0;
    }

    /* Call to Action at the bottom */
    .cta-bottom-section {
        background-color: #34658c; /* Primary Blue background */
        color: white;
        text-align: center;
        padding: 80px 0;
        margin-top: 60px;
        border-radius: 10px;
    }

    .cta-bottom-section h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 25px;
    }

    .btn-cta-bottom {
        background-color: #2ecc71; /* Accent Green for CTA button */
        border: none;
        padding: 16px 40px;
        font-size: 1.2rem;
        font-weight: 600;
        border-radius: 50px;
        color: white;
        transition: background-color 0.3s ease, transform 0.2s ease;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .btn-cta-bottom:hover {
        background-color: #27ae60;
        transform: translateY(-3px);
    }

</style>
@endpush

@section('title', 'Accueil - MEDICAR')

@section('content')
    <section class="hero-main-style text-center container">
        <div>
            <h1 class="display-4 fw-bold">Votre santé, à portée de clic.</h1>
            <p class="lead mb-4">Trouvez et réservez votre rendez-vous médical en toute simplicité.</p>
            <a href="{{ route('show.medeciens') }}" class="btn btn-hero-action">
                <i class="fas fa-calendar-check me-2"></i>Prendre un rendez-vous
            </a>
        </div>
    </section>

    <section class="section-spacing">
        <div class="container">
            <h2 class="section-title">Pourquoi choisir MEDICAR ?</h2>
            <p class="section-subtitle">
                MEDICAR est votre allié pour une gestion de santé simplifiée. Découvrez les avantages qui font de nous le choix idéal pour vos rendez-vous médicaux.
            </p>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card">
                        <div class="icon">
                            <i class="fas fa-user-md"></i> {{-- New icon for healthcare professionals --}}
                        </div>
                        <h3>Réseau de Spécialistes</h3>
                        <p>Accédez à un vaste annuaire de médecins qualifiés et vérifiés pour tous vos besoins.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card">
                        <div class="icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3>Gain de Temps</h3>
                        <p>Fini les attentes téléphoniques interminables. Réservez votre consultation en quelques clics.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card">
                        <div class="icon">
                            <i class="fas fa-lock"></i> {{-- Changed to a lock icon for security --}}
                        </div>
                        <h3>Sécurité et Confidentialité</h3>
                        <p>Vos données personnelles et médicales sont protégées par les normes les plus strictes.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card">
                        <div class="icon">
                            <i class="fas fa-laptop-medical"></i> {{-- New icon for accessibility --}}
                        </div>
                        <h3>Accès 24/7</h3>
                        <p>Planifiez vos rendez-vous à tout moment, depuis n'importe quel appareil connecté.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-spacing bg-how-it-works">
        <div class="container">
            <h2 class="section-title">Comment fonctionne MEDICAR ?</h2>
            <p class="section-subtitle">
                Notre plateforme est conçue pour être simple et intuitive, vous guidant à chaque étape de la prise de rendez-vous.
            </p>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="benefit-card"> {{-- Re-using benefit-card for consistent styling --}}
                        <div class="icon">
                            <i class="fas fa-search-dollar"></i> {{-- Updated icon --}}
                        </div>
                        <h3>1. Recherchez</h3>
                        <p>Parcourez les profils de nos professionnels de santé qualifiés.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="benefit-card">
                        <div class="icon">
                            <i class="fas fa-calendar-check"></i> {{-- Updated icon --}}
                        </div>
                        <h3>2. Réservez</h3>
                        <p>Choisissez parmi les disponibilités en temps réel et confirmez votre créneau.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="benefit-card">
                        <div class="icon">
                            <i class="fas fa-hand-holding-medical"></i> {{-- Updated icon --}}
                        </div>
                        <h3>3. Soyez Suivi</h3>
                        <p>Recevez des rappels et gérez vos rendez-vous facilement.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-bottom-section">
        <div class="container">
            <h2>Prêt à simplifier votre santé ?</h2>
            <p class="lead mb-4">Rejoignez des milliers d'utilisateurs satisfaits qui font confiance à MEDICAR.</p>
            <a href="{{ route('ajouter') }}" class="btn btn-cta-bottom">
                Je m'inscris maintenant <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </section>
@endsection