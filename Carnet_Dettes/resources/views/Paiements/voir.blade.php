@extends('layouts.base')

@section('content')
<link rel="stylesheet" href="{{ asset('css/VoirPaiement.css') }}">

<div class="container">
    <h1>Détails du paiement</h1>
    <p class="description">Informations concernant ce paiement</p>

    <div class="card">
        <!-- Identifiant du paiement -->
       

        <!-- Client -->
        <div class="detail-row">
            <strong class="client">Client :</strong> {{ $paiement->dette->client->nom }}
        </div>

        <!-- Dette associée -->
        <div class="detail-row">
            <strong>Dette associée :</strong> 
            Produit : {{ $paiement->dette->produit }} <br>
            Montant restant : {{ number_format($paiement->dette->montant_restant, 0, ',', ' ') }} F CFA
        </div>

        <!-- Montant payé -->
        <div class="detail-row">
            <strong>Montant payé :</strong> {{ number_format($paiement->montant_paiement, 0, ',', ' ') }} F CFA
        </div>

        <!-- Date du paiement -->
        <div class="detail-row">
            <strong>Date du paiement :</strong> {{ \Carbon\Carbon::parse($paiement->date_paiement)->format('d/m/Y') }}
        </div>

        <!-- Boutons -->
        <div class="buttons">
            <a href="{{ route('Paiements.paiement') }}" class="btn-ajouter">← Retour à la liste</a>
            <a href="{{ route('Paiements.edit', $paiement->id) }}" class="btn btn-primary">Modifier</a>

            
        </div>
    </div>
</div>
@endsection
