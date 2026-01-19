@extends('layouts.base')

@section('content')
<link rel="stylesheet" href="{{ asset('css/client.css') }}">

<div class="container" style="width:100%;">
    <header class="mb-4">
        <h1>Gestion des clients</h1>
        <p class="subtitle">Voir les informations du client</p>
    </header>

    <div class="client-list">
            <div class="client-card">
                <div class="client-name">
                    <i class="fa-solid fa-user icon"></i> {{ $client->nom }}
                </div>
                <div class="client-details">
                    <i class="fa-solid fa-phone icon"></i> {{ $client->telephone }}
                </div>
                <div class="client-balance">
                    <i class="fa-solid fa-home icon"></i> {{ $client->adresse }}
                </div>

                
                <div class="client-actions text-end mt-2">
                    
                    <a class="btn btn-sm text-info" data-bs-toggle="modal" data-bs-target="#clientModal{{ $client->id }}">
                        <i class="fa fa-eye"></i>
                    </a>

                    
                    <a href="{{ route('Clients.edit', $client->id) }}" class="btn btn-sm text-warning">
                        <i class="fa fa-edit"></i>
                    </a>

                    <!-- Supprimer -->

                        <a href="{{ route('Clients.delete', $client->id) }}" class="btn btn-sm text-danger" onclick="return confirm('Supprimer ce client ?')">
                            <i class="fa fa-trash"></i>
                        </a>
                    
                </div>
            </div>

            <!-- Modal pour Voir Client -->
            <div class="modal fade" id="clientModal{{ $client->id }}" tabindex="-1" aria-labelledby="clientModalLabel{{ $client->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <h5 class="modal-title" id="clientModalLabel{{ $client->id }}">Détails du client</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Retour"></button>
                        </div>

                        <div class="modal-body">
                            <p><i class="fa fa-user "></i> <strong>Nom :</strong> {{ $client->nom }}</p>
                            <p><i class="fa fa-phone"></i> <strong>Téléphone :</strong> {{ $client->telephone }}</p>
                            <p><i class="fa fa-home"></i> <strong>Adresse :</strong> {{ $client->adresse }}</p>
                        </div><br>

                        <div class="modal-footer">
                           <a href="{{ route('Clients.edit', $client->id) }}" class="btn btn-modifier">Modifier</a>
                            <a href="{{ route('Clients.client', $client->id) }}" class="btn btn-retour">Retour</a>
                        </div>

                    </div>
                </div>
            </div>
    </div>

    
</div>
@endsection
