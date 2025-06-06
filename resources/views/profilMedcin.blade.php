@extends('layouts.app')
@section('content')
  <style>
    body {
      background-color: #e6f0fa;
      font-family: 'Segoe UI', sans-serif;
    }

    .card-custom {
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .time-slot {
      background-color: #f1f5f9;
      border-radius: 8px;
      padding: 8px 14px;
      cursor: pointer;
      transition: 0.2s;
    }

    .time-slot:hover {
      background-color: #dbeafe;
      font-weight: 500;
    }

    .btn-confirm {
      background-color: #2563eb;
      color: white;
      font-weight: 500;
    }

    .dashboard-icon {
      font-size: 1.8rem;
      color: #2563eb;
    }

    .dashboard-item {
      border-radius: 12px;
      background-color: white;
      box-shadow: 0 2px 6px rgba(0,0,0,0.08);
      padding: 20px;
      text-align: center;
    }
  </style>
</head>
<body>

<div class="container py-4">

  <!-- Carte du médecin -->
  <div class="card card-custom mb-4 p-4">
    <div class="d-flex align-items-center mb-3">
      <div class="me-3">
        <img src="{{asset($medecin->photo)}}" class="rounded-circle ratio ratio-1x1" alt="Avatar" style="width:130px; height:130px; object-fit:cover">
      </div>
      <div>
        
        <h5 class="mb-0">{{$medecin->nom}} {{$medecin->prenom}}</h5>
        <small class="text-muted">{{$medecin->spacialitee}}</small>
        
      </div>
    </div>

    <div class="d-flex flex-wrap gap-2 mb-3">
      <div class="time-slot">09:00</div>
      <div class="time-slot">10:30</div>
      <div class="time-slot">13:00</div>
      <div class="time-slot">13:30</div>
      <div class="time-slot">15:30</div>
    </div>

    <a href="{{route('ajouter.patient', $medecin->id)}}" class="btn btn-confirm">Confirmer rendez-vous</a>
  </div>

  <!-- Tableau de bord -->
  <div class="card card-custom p-4">
    <h5 class="mb-4">Tableau de bord administrateur</h5>
    <div class="row g-3">
      <div class="col-6">
        <div class="dashboard-item">
          <div class="dashboard-icon">👤</div>
          <div class="fw-bold mt-2">150 Patients</div>
        </div>
      </div>
      <div class="col-6">
        <div class="dashboard-item">
          <div class="dashboard-icon">📁</div>
          <div class="fw-bold mt-2">Gestion des comptes</div>
        </div>
      </div>
      <div class="col-6">
        <div class="dashboard-item">
          <div class="dashboard-icon">📊</div>
          <div class="fw-bold mt-2">Statistiques</div>
        </div>
      </div>
      <div class="col-6">
        <div class="dashboard-item">
          <div class="dashboard-icon">📈</div>
          <div class="fw-bold mt-2">Statistiques</div>
        </div>
      </div>
    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
