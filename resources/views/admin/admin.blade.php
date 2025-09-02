@extends('layouts.app')

@section('content')
    <div class="container mt-5">
  <div class="d-flex justify-content-end">
    <form action="{{route('admin.deconnexion')}}" method="post">
        @csrf 
        <button type="submit" class="btn rounded-pill px-3 shadow-sm btn-danger">
            <i class="fas fa-sign-out-alt me-1"></i>Déconnexion
        </button>
    </form>
</div>
        <h2 class="mb-4">Liste des médecins inscrits</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('danger'))
            <div class="alert alert-danger">{{ session('danger') }}</div>
        @endif

        <table class="table-bordered table-striped table">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Horaires</th>
                    <th>Expérience</th>
                    <th>Diplôme</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medecins as $medecin)
                    <tr>
                        <td>{{ $medecin->nom }}</td>
                        <td>{{ $medecin->prenom }}</td>
                        <td>{{ $medecin->email }}</td>
                        <td
                            style="color: {{ $medecin->status == 'valider' ? 'green' : ($medecin->status == 'refuser' ? 'red' : 'orange') }}">
                            {{ $medecin->status }}
                        </td>
                        <td>{{ $medecin->horaires ?? 'Non fourni' }}</td>
                        <td>{{ $medecin->experience ?? 'Non fournie' }}</td>
                        <td>
                            @if ($medecin->diplome)
                                <a href="{{ asset($medecin->diplome) }}" target="_blank">Voir le PDF</a>
                            @else
                                Aucun
                            @endif
                        </td>
                        <td>
                            @if ($medecin->photo)
                                <img src="{{ asset($medecin->photo) }}" alt="Photo" width="50">
                            @else
                                Aucune
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.edit', $medecin->id) }}" class="btn btn-sm btn-success">Valider</a>
                            <a href="{{ route('admin.refuse', $medecin->id) }}" class="btn btn-sm btn-warning">Refuse</a>
                            <form action="{{ route('admin.destroy', $medecin->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
