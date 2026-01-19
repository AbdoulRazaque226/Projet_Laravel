@extends('layouts.base')

@section('content')
  <link rel="stylesheet" href="{{ asset('css/dette.css') }}">

    <div class="container" style=width: 100%; >
        <header>
            <h1>Gestion des dettes</h1>
            <p class="subtitle">Gérez vos dettes et suivez les transactions</p>
        </header>
        
        <div class="search-container">
            <input type="text" class="search-input" placeholder="Rechercher une dette...">
            <a class="nouveau-client-button" href="{{ route('Dettes.create') }}">+ Nouveau dette</a>
        </div>
        
        <h2>
            Dettes
            <span class="client-count">{{ $dettes->count() }}</span>
        </h2>

        <p class="description">Liste de toutes vos dettes avec leurs informations</p>

        <hr>
        
   <div class="client-list">
    @foreach ($dettes as $dette)
        <div class="client-card">
            <!-- Infos client -->
            <div class="client-info">
                <div class="client-name">{{ $dette->client->nom }}</div>
                <div class="client-details">Produit: {{ $dette->produit }}</div>
                <div class="client-details">Date: {{ $dette->date }}</div>
            </div>

            <!-- Statut paiement -->
            @if($dette->montant_restant == $dette->montant)
                <span class="badge non-paye" style="background-color: #e74c3c; color: white; border-radius: 20px; font-size: 15px; padding: 5px 15px; display: inline-block;">Non payée</span>
            @elseif($dette->montant_restant > 0)
                <span class="badge partiellement-paye" style="background-color: #f39c12; color: white;border-radius: 20px; font-size: 15px; padding: 5px 15px; display: inline-block;">Partiellement payée</span>
            @else
                <span class="badge paye" style="background-color: #2ecc71; color: white; border-radius: 20px; font-size: 15px; padding: 5px 15px; display: inline-block;">Payée</span>
            @endif

            <!-- Montant -->
            <div class="client-balance">
                <div class="montant-restant">{{ $dette->montant_restant }} F CFA</div>
                <small class="montant-total">sur {{ $dette->montant }} F CFA</small>
            </div>

            <!-- Actions -->
            <div class="actions">
                <a href="{{ route('Paiements.create') }}" class="btn btn-primary">
                    <i class="fas fa-money-bill-wave"></i> Payer
                </a>
                <a href="{{ route('Dettes.voir', $dette->id) }}" class="action-icon info"><i class="fa fa-eye"></i></a>
                <a href="{{ route('Dettes.edit', $dette->id) }}" class="action-icon edit"><i class="fa fa-edit"></i></a>
                <a href="{{ route('Dettes.delete', $dette->id) }}" class="action-icon delete"><i class="fa fa-trash"></i></a>
                <a class="notis" href="https://wa.me/{{ $dette->client->telephone }}?text={{ urlencode('Bonjour '.$dette->client->nom.', vous avez une dette de '.$dette->montant_restant.' FCFA. Merci de penser à régler votre dette.') }}" 
                       target="_blank" 
                   style="background-color:#007bff; color:white; padding:5px 10px; border-radius:5px; text-decoration:none;">
                         📩 Notifier
               </a>
            </div>
        </div>
    @endforeach
</div>


</div>
@endsection