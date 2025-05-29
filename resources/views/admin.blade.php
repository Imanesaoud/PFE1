@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Liste des médecins inscrits</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
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
                    <td>{{ $medecin->horaires ?? 'Non fourni' }}</td>
                    <td>{{ $medecin->experience ?? 'Non fournie' }}</td>
                    <td>
                        @if ($medecin->diplome)
                            <a href="{{ asset('storage/' . $medecin->diplome) }}" target="_blank">Voir le PDF</a>
                        @else
                            Aucun
                        @endif
                    </td>
                    <td>
                        @if ($medecin->photo)
                            <img src="{{$medecin->photo}}" alt="Photo" width="50">
                        @else
                            Aucune
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.edit', $medecin->id) }}" class="btn btn-sm btn-warning">Modifier</a>

                        <form action="{{ route('admin.destroy', $medecin->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
