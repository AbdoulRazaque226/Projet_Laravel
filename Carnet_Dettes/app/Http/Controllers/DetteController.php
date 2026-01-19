<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveDetteRequest;
use App\Models\Dette;
use App\Models\Client;
use Illuminate\Http\Request;

class DetteController extends Controller
{
    public function dette()
    {
        $dettes = Dette::all();
        return view('Dettes.dette', compact('dettes'));
    }

    public function create()
    {
        $totalClient = Client::all();
        return view('Dettes.create', compact('totalClient'));
    }
     
    public function store(SaveDetteRequest $request)
    {

        try {
              $dettes=new Dette();
                $dettes->client_id=$request->client_id;
                $dettes->montant=$request->montant;
                $dettes->date=$request->date;
                $dettes->produit=$request->produit;
                $dettes->montant_restant=$request->montant;
                $dettes->save();
                return redirect()->route('Dettes.dette')->with('success', 'Dette créée avec succès.');

        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
     

   }

    public function edit(Dette $dette)
      {
          $totalClient = Client::all();
          return view('Dettes.edit', compact('dette','totalClient'));
      }

      public function update(Dette $dette, SaveDetteRequest $request)
      {
          try { 
                $dette->client_id=$request->client_id;
                $dette->montant=$request->montant;
                $dette->montant_restant=$request->montant_restant;
                $dette->date=$request->date;
                $dette->produit=$request->produit;
                $dette->update();
                return redirect()->route('Dettes.dette')->with('success', 'Dette modifiée avec succès.');
            } catch (\Exception $e) {
                dd($e);
                return redirect()->back()->withErrors($e->getMessage())->withInput(null, 'Erreur de modification');
            }
    
     }
      

        public function delete(Dette $dette)
        {
            try {
                $dette->delete();
                return redirect()->route('Dettes.dette')->with('success', 'Dette supprimée avec succès.');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors($e->getMessage());
            }
        }

        public function voir( $id)
        {
            $dette = Dette::find($id);
            $client = Client::find($dette->client_id);
            return view('Dettes.voir', compact('dette','client'));
        }
}


