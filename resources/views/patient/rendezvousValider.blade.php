<!DOCTYPE html>
<html>

<head>
    <title>Détails du Rendez-vous</title>
    <meta charset="utf-8">
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            /* Recommended font for Dompdf to handle various characters */
            margin: 20px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #2ecc71;
            font-size: 28px;
            margin-bottom: 5px;
        }

        .header p {
            font-size: 14px;
            color: #666;
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .details-table th,
        .details-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }

        .details-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
        }

        .status-confirmer {
            color: green;
            font-weight: bold;
        }

        .status-annuler {
            color: red;
            font-weight: bold;
        }

        .status-encours {
            color: orange;
            font-weight: bold;
        }

        .photo-container {
            text-align: center;
            margin-top: 30px;
        }

        .photo-container img {
            max-width: 150px;
            height: auto;
            border: 1px solid #ddd;
            padding: 5px;
            background-color: #fff;
        }

        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Confirmation de Rendez-vous</h1>
        <p>MEDICAR - Votre Portail Santé</p>
    </div>

    <p>Cher(e) <strong>{{ auth()->guard('patient')->user()->prenom }}  {{ auth()->guard('patient')->user()->nom }}    </strong>, CIN: <strong>{{ auth()->guard('patient')->user()->cin }}   </strong></p>
    
    <p>Voici les details de votre rendez-vous :</p>

    <table class="details-table">
        <tr>
            <th>Medecin</th>
            <td>Dr. {{ $medecin->prenom }} {{ $medecin->nom }} ({{ $medecin->spacialitee ?? 'Spécialité non définie' }})</td>
        </tr>

        <tr>
            <th>Date du Rendez-vous</th>
            <td>{{ \Carbon\Carbon::parse($rendezvous->date_heure)->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
            <th>Heure du Rendez-vous</th>
            <td>{{ \Carbon\Carbon::parse($rendezvous->date_heure)->format('H:i') }}</td>
        </tr>
        <tr>
            <th>Statut</th>
            <td class="status-{{ strtolower($rendezvous->statut) }}">
                {{ ucfirst($rendezvous->statut) }}
            </td>
        </tr>
        <tr>
            <th>Ville</th>
            <td>{{ $medecin->ville ?? 'Non spécifiée' }}</td>
        </tr>
    </table>

    <p style="margin-top: 30px;">Veuillez arriver à l'heure à votre rendez-vous. En cas d'empêchement, merci de bien vouloir annuler ou reporter votre rendez-vous à l'avance.</p>

    <div class="footer">
        <p>&copy; {{ date('Y') }} MEDICAR. Tous droits réservés.</p>
    </div>
</body>

</html>