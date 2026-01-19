<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture Paiement #{{ $paiement->id }}</title>
    <style>
        /* Styles inspirés de VoirPaiement.css mais adaptés pour PDF */
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 20px;
            font-size: 14px;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
        }

        .description {
            text-align: center;
            margin-bottom: 20px;
            font-size: 13px;
            color: #666;
        }

        .card {
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            padding: 20px;
            width: 100%;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        .detail-row {
            margin-bottom: 10px;
        }

        .detail-row strong {
            display: inline-block;
            width: 150px;
        }

        hr {
            margin: 20px 0;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>

    <h1>Détails du paiement</h1>
    <p class="description">Informations concernant ce paiement</p>

    <div class="card">
        <div class="detail-row">
            <strong>ID :</strong> {{ $paiement->id }}
        </div>

        <div class="detail-row">
            <strong>Client :</strong> {{ $paiement->dette->client->nom }}
        </div>

        <div class="detail-row">
            <strong>Dette associée :</strong>
            Produit : {{ $paiement->dette->produit }}<br>
            Montant restant : {{ number_format($paiement->dette->montant_restant, 0, ',', ' ') }} F CFA
        </div>

        <div class="detail-row">
            <strong>Montant payé :</strong> {{ number_format($paiement->montant_paiement, 0, ',', ' ') }} F CFA
        </div>

        <div class="detail-row">
            <strong>Date :</strong> {{ \Carbon\Carbon::parse($paiement->date_paiement)->format('d/m/Y') }}
        </div>
    </div>

    <div class="footer">
        Merci de votre paiement !
    </div>

</body>
</html>
