@extends('layouts.app')

@push('styles')
<style>
    body {
        background-color: #f8f9fa; /* Très léger gris pour le fond */
    }

    /* Animations simples pour un effet d'apparition */
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }
    .fade-in.appear {
        opacity: 1;
        transform: translateY(0);
    }
    .delay-1 { transition-delay: 0.2s; }
    .delay-2 { transition-delay: 0.4s; }
    .delay-3 { transition-delay: 0.6s; }
    .delay-4 { transition-delay: 0.8s; }

    /* Page-specific Hero for About Us */
    .about-hero {
        background: linear-gradient(135deg, #34658c 0%, #2a5275 100%); /* Dégradé de bleu */
        color: white;
        padding: 100px 0; /* Plus de padding */
        text-align: center;
        margin-bottom: 60px;
        position: relative;
        overflow: hidden; /* Cache les débordements des formes */
    }

    .about-hero::before { /* Forme de fond décorative */
        content: '';
        position: absolute;
        top: -50px;
        left: -50px;
        width: 200px;
        height: 200px;
        background-color: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        transform: rotate(45deg);
    }
    .about-hero::after { /* Autre forme décorative */
        content: '';
        position: absolute;
        bottom: -70px;
        right: -70px;
        width: 250px;
        height: 250px;
        background-color: rgba(255, 255, 255, 0.03);
        border-radius: 50%;
        transform: rotate(-30deg);
    }

    .about-hero h1 {
        font-size: 4rem; /* Plus grand titre */
        font-weight: 700;
        margin-bottom: 15px;
        text-shadow: 2px 2px 5px rgba(0,0,0,0.2);
    }

    .about-hero p {
        font-size: 1.4rem; /* Plus grand paragraphe */
        opacity: 0.95;
        max-width: 800px;
        margin: 0 auto;
    }

    .about-hero img {
        border-radius: 15px; /* Coins arrondis pour l'image du hero */
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    /* General Section Styling */
    .section-spacing {
        padding: 80px 0; /* Plus de padding pour les sections */
    }

    .section-spacing.bg-alt {
        background-color: #eaf1f8; /* Arrière-plan alternatif clair */
    }

    .section-title {
        font-size: 3rem; /* Titre plus grand */
        font-weight: 700;
        color: #2a5275; /* Bleu plus foncé */
        margin-bottom: 50px;
        text-align: center;
        position: relative;
    }
    .section-title::after { /* Ligne décorative sous le titre */
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 5px;
        background-color: #2ecc71; /* Vert accent */
        border-radius: 5px;
    }

    .section-paragraph {
        font-size: 1.15rem; /* Légèrement plus grand */
        line-height: 1.9;
        color: #495057; /* Gris foncé pour le texte */
        max-width: 900px;
        margin: 0 auto 50px auto;
        text-align: justify;
    }

    /* Values Card Styling */
    .value-card {
        background-color: white;
        border-radius: 15px; /* Plus arrondis */
        padding: 35px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08); /* Ombre plus douce */
        text-align: center;
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 1px solid rgba(0,0,0,0.05); /* Petite bordure subtile */
    }

    .value-card:hover {
        transform: translateY(-8px); /* Plus grand effet de survol */
        box-shadow: 0 15px 40px rgba(0,0,0,0.15); /* Ombre plus prononcée */
    }

    .value-card .icon {
        font-size: 4rem; /* Icônes plus grandes */
        color: #2ecc71; /* Accent Green for value icons */
        margin-bottom: 25px; /* Plus d'espace sous l'icône */
        display: block; /* S'assure que l'icône est un bloc pour le centrage */
    }

    .value-card .icon img {
        max-width: 100px; /* Plus grande taille pour les images d'icônes */
        height: auto;
        display: block;
        margin: 0 auto;
        animation: pulse 1.5s infinite ease-in-out; /* Petite animation */
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    .value-card h3 {
        font-size: 1.8rem; /* Titres de cartes plus grands */
        font-weight: 600;
        color: #34658c;
        margin-bottom: 20px;
    }

    .value-card p {
        color: #6c757d; /* Gris légèrement plus clair */
        line-height: 1.8;
        flex-grow: 1;
    }

    /* Call to Action at the bottom */
    .cta-about {
        background: linear-gradient(90deg, #2ecc71 0%, #27ae60 100%); /* Dégradé vert pour le CTA */
        color: white;
        text-align: center;
        padding: 80px 0; /* Plus de padding */
        margin-top: 60px;
        border-radius: 15px; /* Coins arrondis */
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .cta-about h2 {
        font-size: 2.8rem; /* Titre CTA plus grand */
        font-weight: 700;
        margin-bottom: 30px;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
    }

    .cta-about p {
        font-size: 1.2rem;
        max-width: 700px;
        margin: 0 auto 40px auto;
        opacity: 0.9;
    }

    .btn-cta-about {
        background-color: white; /* Bouton blanc sur fond vert */
        border: none;
        padding: 16px 40px; /* Plus grand bouton */
        font-size: 1.2rem;
        font-weight: 700;
        border-radius: 50px;
        color: #2ecc71; /* Texte vert pour le bouton */
        transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    }

    .btn-cta-about:hover {
        background-color: #f0f0f0; /* Très léger gris au survol */
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }

    /* Media queries pour la réactivité */
    @media (max-width: 768px) {
        .about-hero h1 {
            font-size: 3rem;
        }
        .about-hero p {
            font-size: 1.1rem;
        }
        .section-title {
            font-size: 2.2rem;
        }
        .section-paragraph {
            font-size: 1rem;
        }
        .value-card .icon {
            font-size: 3rem;
        }
        .value-card .icon img {
            max-width: 80px;
        }
        .value-card h3 {
            font-size: 1.4rem;
        }
        .cta-about h2 {
            font-size: 2rem;
        }
        .cta-about p {
            font-size: 1rem;
        }
        .btn-cta-about {
            padding: 12px 30px;
            font-size: 1rem;
        }
    }
</style>
@endpush

@section('title', 'À Propos - MEDICAR')

@section('content')
    <section class="about-hero">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7 text-center text-lg-start mb-4 mb-lg-0 fade-in appear">
                    <h1>À Propos de MEDICAR</h1>
                    <p class="lead mt-3">Votre partenaire de confiance pour une santé simplifiée et accessible à tous.</p>
                </div>
                <div class="col-lg-5 text-center fade-in appear delay-1">
                    <img src="{{ asset('ff.jpg') }}" alt="Illustration MEDICAR" class="img-fluid" style="max-height: 350px;">
                </div>
            </div>
        </div>
    </section>

    <section class="section-spacing pt-0">
        <div class="container">
            <h2 class="section-title fade-in appear">Notre Mission et Vision</h2>
            <p class="section-paragraph fade-in appear delay-1">
                Chez MEDICAR, nous croyons qu'accéder aux soins de santé devrait être simple, rapide et sans stress. Notre mission est de révolutionner la prise de rendez-vous médicaux en connectant patients et professionnels de santé à travers une plateforme intuitive et sécurisée. Nous visons à créer un écosystème de santé où chacun peut gérer son bien-être efficacement, en toute confiance.
            </p>
            <p class="section-paragraph fade-in appear delay-2">
                Nous nous engageons à offrir une expérience utilisateur exceptionnelle, en mettant l'accent sur la facilité d'utilisation, la fiabilité des informations et la protection de la vie privée. MEDICAR est plus qu'une simple plateforme de rendez-vous; c'est un engagement envers une meilleure santé pour tous.
            </p>
        </div>
    </section>

    <section class="section-spacing bg-alt rounded shadow-sm my-5"> {{-- Nouvelle classe bg-alt --}}
        <div class="container">
            <h2 class="section-title fade-in appear">Nos Valeurs Fondamentales</h2>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 fade-in appear delay-1">
                    <div class="value-card">
                        <div class="icon">
                            <i class="fas fa-hand-holding-heart"></i>
                            {{-- Ou <img src="{{ asset('images/icon_confiance_new.png') }}" alt="Icône Confiance"> --}}
                        </div>
                        <h3>Confiance</h3>
                        <p>Bâtir des relations solides basées sur la transparence et l'intégrité avec nos utilisateurs.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 fade-in appear delay-2">
                    <div class="value-card">
                        <div class="icon">
                            <i class="fas fa-leaf"></i> {{-- Nouvelle icône pour la simplicité, plus organique --}}
                            {{-- Ou <img src="{{ asset('images/icon_simplicite_new.png') }}" alt="Icône Simplicité"> --}}
                        </div>
                        <h3>Simplicité</h3>
                        <p>Concevoir une plateforme facile à utiliser pour tous, du patient au praticien.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 fade-in appear delay-3">
                    <div class="value-card">
                        <div class="icon">
                            <i class="fas fa-users-medical"></i> {{-- Nouvelle icône pour l'accessibilité ou user groups --}}
                            {{-- Ou <img src="{{ asset('images/icon_accessibilite_new.png') }}" alt="Icône Accessibilité"> --}}
                        </div>
                        <h3>Accessibilité</h3>
                        <p>Rendre les soins de santé plus accessibles et efficaces pour la communauté.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 fade-in appear delay-4">
                    <div class="value-card">
                        <div class="icon">
                            <i class="fas fa-flask"></i> {{-- Nouvelle icône pour l'innovation, plus "recherche" --}}
                            {{-- Ou <img src="{{ asset('images/icon_innovation_new.png') }}" alt="Icône Innovation"> --}}
                        </div>
                        <h3>Innovation</h3>
                        <p>Innover constamment pour améliorer l'expérience et les services offerts.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-about">
        <div class="container">
            <h2 class="fade-in appear">Prêt à prendre le contrôle de votre santé ?</h2>
            <p class="lead mb-4 fade-in appear delay-1">Rejoignez la communauté MEDICAR dès aujourd'hui et simplifiez vos rendez-vous.</p>
            <a href="{{ route('ajouter') }}" class="btn btn-cta-about fade-in appear delay-2">
                Commencer maintenant <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </section>

    {{-- Script pour déclencher l'animation fade-in --}}
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faders = document.querySelectorAll('.fade-in');

            const appearOptions = {
                threshold: 0.1, /* Apparaît quand 10% de l'élément est visible */
                rootMargin: "0px 0px -50px 0px" /* Pour charger un peu plus tôt */
            };

            const appearOnScroll = new IntersectionObserver(function(entries, appearOnScroll) {
                entries.forEach(entry => {
                    if (!entry.isIntersecting) {
                        return;
                    } else {
                        entry.target.classList.add('appear');
                        appearOnScroll.unobserve(entry.target);
                    }
                });
            }, appearOptions);

            faders.forEach(fader => {
                appearOnScroll.observe(fader);
            });
        });
    </script>
    @endpush
@endsection