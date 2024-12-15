<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\personne;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Response;
use Illuminate\View\View;
class controlleur extends Controller
{
   
    public function index(): View
    {
        $personnes = Personne::latest('id')->paginate(5); // Trie par l'ID au lieu de created_at
          
        return view('index', compact('personnes'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('ajouter');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required', // Vérifie que 'prenom' est bien requis
            'telephone' => 'required',
        ]);
    
        // Créer un nouvel enregistrement dans la base de données
        personne::create($validatedData);
        // Redirigez vers la route index avec un message de succès
        return redirect()->route('index')
                         ->with('success', 'La personne a été ajoutée avec succès.');
    }

  
    /**
     * Display the specified resource.
     */
    public function show(personne $personne): View
    {
        return view('voir',compact('personne'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    // Récupérer la personne avec l'id correspondant
    $personne = Personne::findOrFail($id);
    
    // Afficher la vue de modification avec les données de la personne
    return view('modifier', compact('personne'));
}

  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Valider les champs du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|max:20'
        ]);
    
        // Récupérer la personne à partir de l'id
        $personne = Personne::findOrFail($id);
        
        // Mettre à jour les champs
        $personne->update([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'telephone' => $request->input('telephone')
        ]);
    
        // Rediriger avec un message de succès
        return redirect()->route('index')
                         ->with('success', 'La personne a été modifiée avec succès.');
    }
    
  
    /**
     * Remove the specified resource from storage.
     * findOrFail($id): Si la personne n'existe pas, une erreur 404 sera renvoyée.
*$personne->delete(): Cette commande supprime l'enregistrement de la base de données.*
*redirect()->route('personne'): Redirection vers la page d'affichage des personnes avec un message de succès.
     */
    public function destroy($id)
    {
        // Récupération de la personne par son id
        $personne = Personne::findOrFail($id);
        
        // Suppression de la personne
        $personne->delete();
        
        // Redirection avec un message de succès

        return redirect()->route('index')->with('success', 'La personne a été supprimée avec succès.');
    }
    
}
