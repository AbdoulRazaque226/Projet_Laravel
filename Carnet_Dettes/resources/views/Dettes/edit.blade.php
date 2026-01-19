
@extends('layouts.base')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/Dettecreate.css') }}">
    <div class="container">
        <h1>Modifier une dette</h1>
        <p class="description">Remplissez les informations du dette</p>

        <form id="clientForm" class="client-form" method="POST" action="{{ route('Dettes.update', $dette->id) }}"> 
            @csrf
            @method('PUT')

           <input type="hidden" name="client_id" id="client_id" value="{{ $dette->client_id ?? old('client_id') }}">

                        <div class="form-group">
                <label for="produit">Produits <span class="required">*</span></label>
                <div class="input-container">
                    <input type="text" id="phone" name="produit" required placeholder="Ex: Riz, huile, sucre..." value="{{ old('produit', $dette->produit) }}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="address">Montant <span class="required"></span>*</label>
                <div class="input-container">
                    <input type="number" id="montant" name="montant" required placeholder="Ex: 150000" value="{{ old('montant', $dette->montant) }}" >
                </div>
            </div>

             
            <div class="form-group">
                <label for="address">Montant Restant <span class="required"></span>*</label>
                <div class="input-container">
                    <input type="number" id="montant_restant" name="montant_restant" required placeholder="Ex: 150000" value="{{ old('montant_restant', $dette->montant_restant) }}">
                </div>
            </div>

            <div class="form-group">
                <label for="address">Date <span class="required"></span>*</label>
                <div class="input-container">
                    <input type="date" id="address" name="date" required placeholder="Ex: 2023-09-11" value="{{ old('date', $dette->date) }}">
                </div>
            </div>
            
            <div class="buttons">
                <a href="{{ route('Dettes.dette') }}" class="btn btn-outline-warning">Retour à la liste</a>
                <button type="reset" class="btn btn-secondary cancel">Annuler</button>
                <button type="submit" class="btn btn-primary submit">Modifier </button>
            </div>
        </form>
    </div>

    
@endsection