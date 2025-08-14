<?php

namespace App\Http\Controllers;

use App\Models\Femelle;
use Illuminate\Http\Request;

class FemelleController extends Controller
{
    /**
     * Affiche la liste des femelles.
     */
    public function index()
    {
        $femelles = Femelle::paginate(10);
        return view('femelles.index', compact('femelles'));
    }

    /**
     * Affiche le formulaire pour créer une nouvelle femelle.
     */
    public function create()
    {
        return view('femelles.create');
    }

    /**
     * Enregistre une nouvelle femelle dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:femelles,code',
            'nom' => 'required|string',
            'race' => 'nullable|string',
            'origine' => 'required|in:Interne,Achat',
            'date_naissance' => 'nullable|date',
            'etat' => 'required|in:Active,Gestante,Allaitante,Vide',
        ]);

        Femelle::create($request->all());

        return redirect()->route('femelles.index')
                         ->with('success', 'Lapin femelle ajouté avec succès !');
    }

    /**
     * Affiche le formulaire pour éditer une femelle existante.
     */
    public function edit(Femelle $femelle)
    {
        return view('femelles.edit', compact('femelle'));
    }

    /**
     * Met à jour une femelle existante.
     */
    public function update(Request $request, Femelle $femelle)
    {
        $request->validate([
            'code' => 'required|unique:femelles,code,' . $femelle->id,
            'nom' => 'required|string',
            'race' => 'nullable|string',
            'origine' => 'required|in:Interne,Achat',
            'date_naissance' => 'nullable|date',
            'etat' => 'required|in:Active,Gestante,Allaitante,Vide',
        ]);

        $femelle->update($request->all());

        return redirect()->route('femelles.index')
                         ->with('success', 'Lapin femelle modifié avec succès !');
    }

    /**
     * Supprime une femelle.
     */
    public function destroy(Femelle $femelle)
    {
        $femelle->delete();

        return redirect()->route('femelles.index')
                         ->with('success', 'Lapin femelle supprimé avec succès !');
    }

    /**
     * Bascule l'état d'une femelle.
     */
    public function toggleEtat(Femelle $femelle)
    {
        $etats = ['Active', 'Gestante', 'Allaitante', 'Vide'];

        $currentIndex = array_search($femelle->etat, $etats);
        $nextIndex = ($currentIndex + 1) % count($etats);

        $femelle->etat = $etats[$nextIndex];
        $femelle->save();

        return redirect()->back()->with('success', 'État mis à jour avec succès !');
    }
}
