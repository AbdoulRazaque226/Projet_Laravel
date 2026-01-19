<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Dette;
use App\Models\Paiement;
use PHPUnit\Framework\Constraint\Count;

class HomeController extends Controller
{
    public function home()
    {
        $totalClients = Client::all()->count();
        $totalPaiements = Paiement::sum('montant_paiement');
        $totalDettes = Dette::sum('montant_restant');


         // On prend les 10 dettes les plus élevées
    $topDettes = Dette::with('client')
        ->orderBy('montant_restant', 'desc')
        ->take(10)
        ->get();

        return view('layouts.home', compact('totalClients', 'totalPaiements', 'totalDettes', 'topDettes'));
    }
}
