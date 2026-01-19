@extends('layouts.base')

@section('content')
<link rel="stylesheet" href="{{ asset('css/client.css') }}">

<div class="container" style="width: 100%;">
    <header>
        <h1>Gestion des paiements</h1>
        <p class="subtitle">Gérez vos paiements et suivez leurs informations</p>
    </header>
    
    <div class="search-container">
        <input type="text" class="search-input" placeholder="Rechercher un paiement...">
        <a class="nouveau-client-button" href="{{ route('Paiements.create') }}">+ Nouveau Paiement</a>
    </div>
    
    <h2>
        Paiements effectués
        
    </h2>

    <p class="description">Liste de tous vos paiements avec leurs informations</p>

    <hr>
    
    <div class="client-list">
    

        @foreach ($paiements as $paiement)

            <div class="client-card">
                <div class="client-info">
                    <div class="client-name"> {{ $paiement->dette->client->nom }}</div>
                    <div class="client-details fa fa-calendar"> {{ $paiement->date_paiement }} </div>
                </div>

                <div class="client-actions">
                    <div class="client-name"> {{ $paiement->montant_paiement }} F CFA
                        <div class="client-email"><small class="{{ strtolower($paiement->status)==='payé' ?'status-payé' :'status-partiellement-payé' }}  ">{{ $paiement->status }}</small></div>
                    </div>
                  </div><br>
                    <div class="actions">  

                    <a href="{{ route('Paiements.voir', $paiement->id) }}" class="action-icon text-info"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('Paiements.edit', $paiement->id) }}" class="action-icon text-warning"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('Paiements.delete', $paiement->id) }}" class="action-icon text-danger"><i class="fa fa-trash"></i></a>
                    <a href="{{ route('pdf.paiement', $paiement->id) }}" class="btn btn-success">
    <i class="fa fa-file-pdf"></i> Télécharger PDF
</a>

                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
