@extends('layouts.base')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dette.css') }}">
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
<div class="container" style="width:100%;">
    <header class="mb-4">
        <h1>Gestion des clients</h1>
        <p class="subtitle">Voir les informations du dettes</p>
    </header>

    <div class="client-list">
            <div class="client-card">
                <div class="client-name">
                    <i class="fa-solid fa-user icon"></i> {{ $dette->client->nom }}
                </div>
                 <div class="client-name">
                    <i class="fa-solid fa-shopping-basket input-icon icon"></i> {{ $dette->produit }}
                </div>
                <div class="client-details">
                    <i class="fa-solid fa-money-bill icon"></i> {{ $dette->montant }}F cfa
                </div>
                <div class="client-balance">
                    <i class="fa-solid fa-calendar-alt icon"></i> {{ $dette->date }}
                </div>

                <!-- Actions -->
                <div class="client-actions text-end mt-2">
                    <!-- Bouton Voir -->
                    <button class="btn btn-sm text-info" data-bs-toggle="modal" data-bs-target="#clientModal{{ $dette->id }}">
                        <i class="fa fa-eye"></i>
                    </button>

                    <!-- Modifier -->
                    <a href="{{ route('Dettes.edit', $dette->id) }}" class="btn btn-sm text-warning">
                        <i class="fa fa-edit"></i>
                    </a>

                    <!-- Supprimer -->
                    <form action="{{ route('Dettes.delete', $dette->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm text-danger" onclick="return confirm('Supprimer ce client ?')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Modal pour Voir Client -->
            <div class="modal fade" id="clientModal{{ $dette->id }}" tabindex="-1" aria-labelledby="clientModalLabel{{ $dette->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <h5 class="modal-title" id="clientModalLabel{{ $dette->id }}">Détails du dette</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Retour"></button>
                        </div>

                        <div class="modal-body">
                            <p><i class="fas fa-shopping-basket input-icon"></i> <strong>Produits :</strong> {{ $dette->produit }}</p>
                            <p><i class="fas fa-money-bill"></i> <strong>Montant :</strong> {{ $dette->montant }}</p>
                            <p><i class="fas fa-calendar-alt"></i> <strong>Date :</strong> {{ $dette->date }}</p>
                        </div><br>

                        <div class="modal-footer">
                           <a href="{{ route('Dettes.edit', $dette->id) }}" class="btn btn-modifier">Modifier</a>
                            <a href="{{ route('Dettes.dette', $dette->id) }}" class="btn btn-retour">Retour</a>
                        </div>

                    </div>
                </div>
            </div>
    </div>

    
</div>
@endsection
