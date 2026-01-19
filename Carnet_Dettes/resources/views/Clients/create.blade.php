@extends('layouts.base')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/Clientcreate.css') }}">
    <div class="container">
        <h1>Ajouter un nouveau client</h1>
        <p class="description">Remplissez les informations du client pour l'ajouter à votre carnet.</p>

        <form id="clientForm" class="client-form" method="POST" action="{{ route('Clients.store') }}">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="fullname">Nom complet <span class="required">*</span></label>
                <div class="input-container">
                    <input type="text" id="fullname" name="nom" required placeholder="Ex: Amadou Traoré">
                </div>
            </div>
            
            <div class="form-group">
                <label for="phone">Numéro de téléphone <span class="required">*</span></label>
                <div class="input-container">
                    <input type="tel" id="phone" name="telephone" required placeholder="Ex: 70123456">
                </div>
            </div>
            
            <div class="form-group">
                <label for="address">Adresse <span class="required"></span>*</label>
                <div class="input-container">
                    <input type="text" id="address" name="adresse" required placeholder="Ex: Secteur 15, Ouagadougou">
                </div>
            </div>
            
            <div class="buttons">
                <a href="{{ route('Clients.client') }}" class="btn btn-outline-warning">Retour à la liste</a>
                <button type="reset" class="btn btn-secondary cancel">Annuler</button>
                <button type="submit" class="btn btn-primary submit">Ajouter le client</button>
            </div>
        </form>
    </div>

    
@endsection