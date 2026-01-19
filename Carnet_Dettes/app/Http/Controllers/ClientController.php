<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Http\Requests\SaveClientRequest ;

class ClientController extends Controller
{
    public function client()
    {
        $TotalClients = Client::count();
        $totalClients = Client::paginate(10);
        return view('Clients.client', compact('totalClients', 'TotalClients'));
    }


    public function create()
    {
        return view('Clients.create');
    }

    public function store(Client $client, SaveClientRequest $request)
    {

        try{
            $client->nom = $request->nom;
            $client->telephone = $request->telephone;
            $client->adresse = $request->adresse;
            $client->save();

            return redirect()->route('Clients.client')->with('success', 'Client ajouté avec succès.');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'ajout du client. Veuillez réessayer.')->withInput();
         //   return response()->json(['error' => 'Une erreur est survenue lors de l\'ajout du client. Veuillez réessayer.'], 500);
        }
    }

    public function edit(Client $client)
    {
        return view('Clients.edit', compact('client'));
    }


 public function update(Client $client, SaveClientRequest $request)
    {

        try{
            $client->nom = $request->nom;
            $client->telephone = $request->telephone;
            $client->adresse = $request->adresse;
            $client->update();

            return redirect()->route('Clients.client')->with('success', 'Client modifié avec succès.');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la modification du client. Veuillez réessayer.')->withInput();
         //   return response()->json(['error' => 'Une erreur est survenue lors de l\'ajout du client. Veuillez réessayer.'], 500);
        }
    }

 

    public function delete(Client $client)
    {
        try {
            $client->delete();
            return redirect()->route('Clients.client')->with('success', 'Client supprimé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression du client. Veuillez réessayer.');
        }
    }

    public function voir($id)
    {
         $client = Client::findOrFail($id);

    // On envoie le client à la vue
    return view('Clients.voir', compact('client'));
    }
}





