<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePaiementRequest;
use App\Models\Paiement;
use App\Models\Dette;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PaiementController extends Controller
{
    public function paiement()
    {
        $paiements = Paiement::with('dette.client')->get();
        return view('Paiements.paiement', compact('paiements'));
    }

    public function create()
    {
        $dettes = Dette::all();
        return view('Paiements.create', compact('dettes'));
    }

   public function store(Request $request)
{
    $request->validate([
        'dette_id' => 'required|exists:dettes,id',
        'montant_paiement' => 'required|numeric|min:1',
        'date_paiement' => 'required|date',
    ]);

    // Récupérer la dette
    $dette = Dette::findOrFail($request->dette_id);

    // Vérifier que le montant ne dépasse pas le restant
    if ($request->montant_paiement > $dette->montant_restant) {
        return back()->withErrors(['montant_paiement' => 'Le montant dépasse le montant restant de la dette.']);
    }

        $dette->montant_restant -= $request->montant_paiement;


    // Créer le paiement
    Paiement::create([
        'dette_id' => $dette->id,
        'montant_paiement' => $request->montant_paiement,
        'date_paiement' => $request->date_paiement,
        'status' => $dette->montant_restant == 0 ? 'Payé' : 'Partiellement payé',
    ]);

    // Déduire du montant restant
    if ($dette->montant_restant < 0) {
        $dette->montant_restant = 0; // Assurer que le montant restant ne devient pas négatif
    }
    $dette->save();

    return redirect()->route('Paiements.paiement')->with('success', 'Paiement ajouté avec succès et dette mise à jour.');
}

public function edit(Paiement $paiement)
{
    $dettes = Dette::all();
    return view('Paiements.edit', compact('paiement', 'dettes'));

}

public function update(Request $request, Paiement $paiement)
{
    $request->validate([
        'dette_id' => 'required|exists:dettes,id',
        'montant_paiement' => 'required|numeric|min:1',
        'date_paiement' => 'required|date',
    ]);

    // Récupérer la dette associée au paiement
    $dette = Dette::findOrFail($request->dette_id);

    // Calculer la différence entre l'ancien et le nouveau montant du paiement
    $difference = $request->montant_paiement - $paiement->montant_paiement;

    // Vérifier que le nouveau montant ne dépasse pas le montant restant de la dette
    if ($difference > $dette->montant_restant) {
        return back()->withErrors(['montant_paiement' => 'Le montant dépasse le montant restant de la dette.']);
    }

    // Mettre à jour le paiement
    $paiement->update([
        'dette_id' => $dette->id,
        'montant_paiement' => $request->montant_paiement,
        'date_paiement' => $request->date_paiement,
    ]);

    // Mettre à jour le montant restant de la dette
    $dette->montant_restant -= $difference;
    if ($dette->montant_restant < 0) {
        $dette->montant_restant = 0; // Assurer que le montant restant ne devient pas négatif
    }
    $dette->save();

    return redirect()->route('Paiements.paiement')->with('success', 'Paiement mis à jour avec succès et dette ajustée.');
}

public function delete(Paiement $paiement)
{
    // Récupérer la dette associée au paiement
    $dette = $paiement->dette;

    // Restaurer le montant du paiement au montant restant de la dette
    $dette->montant_restant += $paiement->montant_paiement;
    $dette->save();

    // Supprimer le paiement
    $paiement->delete();

    return redirect()->route('Paiements.paiement')->with('success', 'Paiement supprimé avec succès et dette ajustée.');}




    public function voir(Paiement $paiement)
    {
        return view('Paiements.voir', compact('paiement'));
    }


      public function exportPdf($id)
    {
        $paiement = Paiement::findOrFail($id);

        $pdf = Pdf::loadView('pdf.paiement', compact('paiement'));
        return $pdf->download('paiement_'.$paiement->id.'.pdf');
    }
}