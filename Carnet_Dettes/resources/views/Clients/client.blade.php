@extends('layouts.base')

@section('content')
  <link rel="stylesheet" href="{{ asset('css/client.css') }}">

    <div class="container" style=width: 100%; >
        <header>
            <h1>Gestion des clients</h1>
            <p class="subtitle">Gérez vos clients et suivez leurs informations</p>
        </header>
        
        <div class="search-container">
            <input type="text" id="searchInput" class="search-input" name="nom" placeholder="Rechercher un client...">

            <a class="nouveau-client-button" href="{{ route('Clients.create') }}">+ Nouveau client</a>
        </div>
        
        <h2>
            Clients 
            <span class="client-count">{{ $TotalClients }}</span>
        </h2>
        
        <p class="description">Liste de tous vos clients avec leurs informations</p>
        
        <hr>
        
       <div class="client-list">
    @foreach ($totalClients as $client)
        <div class="client-card">
            <div class="client-info">
                <div class="client-name ">{{ $client->nom }}</div>
                <div class="client-details fas fa-phone">  {{ $client->telephone }}</div>
                <div class="client-balance">{{ $client->adresse }}</div>
            </div>

            <div class="client-actions">
                <a href="{{ route('Clients.voir', $client->id) }}" class="action-icon text-info"><i class="fa fa-eye"></i></a>
                <a href="{{ route('Clients.edit', $client->id) }}" class="action-icon text-warning"><i class="fa fa-edit"></i></a>
                <a href="{{ route('Clients.delete', $client->id) }}" class="action-icon text-danger"><i class="fa fa-trash"></i></a>
            </div>
        </div>
    @endforeach
</div>

</div>
@endsection