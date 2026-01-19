@extends('layouts.base')

@section('content')
<link rel="stylesheet" href="{{ asset('css/Dettecreate.css') }}">
<div class="container">
    <h1>Ajouter un nouveau paiement</h1>
    <p class="description">Sélectionnez une dette et remplissez les informations du paiement</p>

    <form id="paiementForm" class="client-form" method="POST" action="{{ route('Paiements.store') }}"> 
        @csrf

      

        <!-- dette_id -->
        <div class="form-group">
            <label for="dette_id">Choisir une dette <span class="required"></span></label>
            <div class="input-container">
                <select id="dette_id" name="dette_id" required>
                    <option value="">-- Sélectionner une dette --</option>
                    @foreach($dettes as $dette)
                        <option value="{{ $dette->id }}">
                            Client: {{ $dette->client->nom }} - Restant: {{ $dette->montant_restant }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Montant du paiement -->
        <div class="form-group">
            <label for="montant_paiement">Montant du paiement <span class="required"></span></label>
            <div class="input-container">
                <input type="number" id="montant_paiement" name="montant_paiement" required placeholder="5000...">
            </div>
        </div>

        <!-- Date -->
        <div class="form-group">
            <label for="date_paiement">Date <span class="required"></span></label>
            <div class="input-container">
                <input type="date" id="date_paiement" name="date_paiement" required>
            </div>
        </div>
        
        <!-- Boutons -->
        <div class="buttons">
            <a href="{{ route('Paiements.paiement') }}" class="btn-ajouter">Retour à la liste</a>
            <button type="reset" class="btn btn-secondary cancel">Annuler</button>
            <button type="submit" class="btn btn-primary submit">Ajouter le paiement</button>
        </div>
    </form>
</div>
@endsection
