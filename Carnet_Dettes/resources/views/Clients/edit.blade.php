@extends('layouts.base')

@section('content')
<link rel="stylesheet" href="{{ asset('css/Clientcreate.css') }}">

<div class="container">
    <h1>Modifier le client</h1>
    <p class="description">Mettez à jour les informations du client.</p>

    <form id="clientForm" class="client-form" method="POST" action="{{ route('Clients.update', $client->id) }}">
        @csrf
        @method('PUT')

        {{-- Nom --}}
        <div class="form-group">
            <label for="fullname">Nom complet <span class="required">*</span></label>
            <div class="input-container">
                <input type="text" id="fullname" name="nom" required placeholder="Ex: Amadou Traoré"
                       value="{{ old('nom', $client->nom ?? '') }}">
            </div>
            @error('nom')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- Téléphone --}}
        <div class="form-group">
            <label for="phone">Numéro de téléphone <span class="required">*</span></label>
            <div class="input-container">
                <input type="tel" id="phone" name="telephone" required placeholder="Ex: 70123456"
                       value="{{ old('telephone', $client->telephone ?? '') }}">
            </div>
            @error('telephone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- Adresse --}}
        <div class="form-group">
            <label for="address">Adresse</label>
            <div class="input-container">
                <input type="text" id="address" name="adresse" placeholder="Ex: Secteur 15, Ouagadougou"
                       value="{{ old('adresse', $client->adresse ?? '') }}">
            </div>
            @error('adresse')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- Boutons --}}
        <div class="buttons mt-3">
            <a href="{{ route('Clients.client') }}" class="btn btn-outline-info">Retour</a>
            <button type="reset" class="btn btn-secondary cancel">Annuler</button>
            <button type="submit" class="btn btn-primary submit">Modifier</button>
        </div>
    </form>
</div>
@endsection
