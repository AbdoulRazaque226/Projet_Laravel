<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DetteController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Models\Dette;
use App\Models\Paiement;

Route::get('/inscription', [AuthController::class, 'inscription'])->name('inscription');
Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::get('/'  , [ConnexionController::class, 'connexion'])->name('connexion');
Route::post('/'  , [ConnexionController::class, 'connecter'])->name('connecter');

Route::middleware('auth')->group(function () {
       // Route::get('/deconnexion', [ConnexionController::class, 'deconnexion'])->name('deconnexion');
          // Déconnexion
Route::get('/logout', function () {
    Auth::logout();  // Déconnecte l'utilisateur
    return redirect()->route('connexion'); // Redirige vers la page de connexion
})->name('logout');
  
        Route::get('/home', [HomeController::class, 'home'])->name('home');
        
       //route clients
        Route::get('/Clients/client', [ClientController::class, 'client'])->name('Clients.client');
        Route::get('/Clients/create', [ClientController::class, 'create'])->name('Clients.create');
        Route::post('/Clients/create', [ClientController::class, 'store'])->name('Clients.store');
        Route::get('/Clients/edit/{client}', [ClientController::class, 'edit'])->name('Clients.edit');
        Route::put('/Clients/update/{client}', [ClientController::class, 'update'])->name('Clients.update');
        Route::get('/Clients/{client}', [ClientController::class, 'delete'])->name('Clients.delete');
        Route::get('/Clients/voir/{client}', [ClientController::class, 'voir'])->name('Clients.voir');

        //route dettes

        Route::get('/Dettes/dette', [DetteController::class, 'dette'])->name('Dettes.dette');
        Route::get('/Dettes/create', [DetteController::class, 'create'])->name('Dettes.create');
        Route::post('/Dettes/create', [DetteController::class, 'store'])->name('Dettes.store');
        Route::get('/Dettes/edit/{dette}', [DetteController::class, 'edit'])->name('Dettes.edit');
        Route::put('/Dettes/update/{dette}', [DetteController::class, 'update'])->name('Dettes.update');
        Route::get('/Dettes/{dette}', [DetteController::class, 'delete'])->name('Dettes.delete');
        Route::get('/Dettes/voir/{dette}', [DetteController::class, 'voir'])->name('Dettes.voir');

        //route de paiement
        Route::get('/Paiements/paiement/', [PaiementController::class, 'paiement'])->name('Paiements.paiement');
        Route::get('/Paiements/create/', [PaiementController::class, 'create'])->name('Paiements.create');
        Route::post('/Paiements/create', [PaiementController::class, 'store'])->name('Paiements.store');
        Route::get('/Paiements/edit/{paiement}', [PaiementController::class, 'edit'])->name('Paiements.edit');
        Route::put('/Paiements/update/{paiement}', [PaiementController::class, 'update'])->name('Paiements.update');
        Route::get('/Paiements/{paiement}', [PaiementController::class, 'delete'])->name('Paiements.delete');
        Route::get('/Paiements/voir/{paiement}', [PaiementController::class, 'voir'])->name('Paiements.voir');


        //route pdf
        Route::get('/pdf/{id}/paiement', [PaiementController::class, 'exportPdf'])->name('pdf.paiement');

    });   
