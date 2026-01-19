@extends('layouts.base')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/Dettecreate.css') }}">
    <div class="container">
        <h1>Ajouter un nouveau dette</h1>
        <p class="description">Remplissez les informations du dette</p>

        <form id="clientForm" class="client-form" method="POST" action="{{ route('Dettes.store') }}"> 
            @csrf
            @method('POST')
            <label for="produit">Nom Complet <span class="required">*</span></label>

            <select name="client_id" id="client_id" required>
                    <option value="" disabled selected>Choisir un client</option>
                    @foreach($totalClient as $client)
                        <option value="{{ $client->id }}">{{ $client->nom }}</option>
                    @endforeach
                </select>
            
            <div class="form-group">
                <label for="produit">Produits <span class="required">*</span></label>
                <div class="input-container">
                    <input type="text" id="phone" name="produit" required placeholder="Ex: Riz, huile, sucre...">
                </div>
            </div>
            
            <div class="form-group">
                <label for="address">Montant <span class="required"></span>*</label>
                <div class="input-container">
                    <input type="number" id="address" name="montant" required placeholder="Ex: 150000">
                </div>
            </div>

            <div class="form-group">
                <label for="address">Montant restant <span class="required"></span>*</label>
                <div class="input-container">
                    <input type="number" id="address" name="montant_restant" required placeholder="Ex: 150000" default="montant">
                </div>
            </div>


            <div class="form-group">
                <label for="address">Date <span class="required"></span>*</label>
                <div class="input-container">
                    <input type="date" id="address" name="date" required placeholder="Ex: 2023-09-11">
                </div>
            </div>
            
            <div class="buttons">
                <a href="{{ route('Dettes.dette') }}" class="btn-ajouter">Retour à la liste</a>
                <button type="reset" class="btn btn-secondary cancel">Annuler</button>
                <button type="submit" class="btn btn-primary submit">Ajouter le dette</button>
            </div>
        </form>
    </div>

    
@endsection