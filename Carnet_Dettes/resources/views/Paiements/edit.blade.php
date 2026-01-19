@extends('layouts.base')

@section('content')
<link rel="stylesheet" href="{{ asset('css/Dettecreate.css') }}">

<div class="container">
    <h1>Modifier un paiement</h1>
    <p class="description">Sélectionnez une dette et remplissez les informations du paiement</p>

    <form id="paiementForm" class="client-form" method="POST" action="{{ route('Paiements.update', $paiement->id) }}"> 
        @csrf
        @method('PUT')

        <!-- dette_id -->
        <div class="form-group">
            <label for="dette_id">Choisir une dette <span class="required">*</span></label>
            <div class="input-container">
                <select id="dette_id" name="dette_id" required>
                    <option value="">-- Sélectionner une dette --</option>
                    @foreach($dettes as $dette)
                        <option value="{{ $dette->id }}" {{ old('dette_id', $paiement->dette_id) == $dette->id ? 'selected' : '' }}>
                            Client: {{ $dette->client->nom }} - Restant: {{ $dette->montant_restant }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Montant du paiement -->
        <div class="form-group">
            <label for="montant_paiement">Montant du paiement <span class="required">*</span></label>
            <div class="input-container">
                <input type="number" id="montant_paiement" name="montant_paiement" required placeholder="5000..." 
                       value="{{ old('montant_paiement', $paiement->montant_paiement) }}">
            </div>
        </div>

        <!-- Date -->
        <div class="form-group">
            <label for="date_paiement">Date <span class="required">*</span></label>
            <div class="input-container">
                <input type="date" id="date_paiement" name="date_paiement" required 
                       value="{{ old('date_paiement', $paiement->date_paiement) }}">
            </div>
        </div>
        
        <!-- Boutons -->
        <div class="buttons">
            <a href="{{ route('Paiements.paiement') }}" class="btn-ajouter">Retour à la liste</a>
            <button type="reset" class="btn btn-secondary cancel">Annuler</button>
            <button type="submit" class="btn btn-primary submit">Enregistrer le paiement</button>
        </div>
    </form>
</div>

<!-- Validation JS -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('paiementForm');

    form.addEventListener('submit', function(e) {
        let errors = [];

        const dette = document.getElementById('dette_id').value;
        const montant = document.getElementById('montant_paiement').value;
        const date = document.getElementById('date_paiement').value;

        if (!dette) errors.push("Veuillez sélectionner une dette.");
        if (!montant || montant <= 0) errors.push("Veuillez entrer un montant valide.");
        if (!date) errors.push("Veuillez entrer une date.");

        if (errors.length > 0) {
            e.preventDefault();
            alert(errors.join("\n"));
        }
    });
});
</script>

@endsection
