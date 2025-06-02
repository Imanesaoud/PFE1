@extends('layouts.app')
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
</style>

@section('title', 'Accueil')
@section('content')
    <!-- Hero Section -->
    <section class="hero text-center">
        <div>
            <h1 class="display-4 fw-bold">Prenez rendez-vous avec votre médecin</h1>
            <p class="lead mb-4">Simple, rapide et sécurisé</p>
            <a href="{{ route('show.medeciens') }}" class="btn btn-primary btn-lg btn-primary-custom">Réserver un
                rendez-vous</a>
        </div>
    </section>
@endsection
