<?php

namespace App\Http\Controllers;

use App\Models\Saillie;
use App\Models\Femelle;
use App\Models\Male;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SaillieController extends Controller
{
    /**
     * Affichage de toutes les saillies
     */
    public function index()
    {
        $saillies = Saillie::with(['femelle', 'male'])->paginate(10);
        return view('saillies.index', compact('saillies'));
    }

    /**
     * Formulaire de création
     */
    public function create()
    {
        $femelles = Femelle::all();
        $males = Male::all();
        return view('saillies.create', compact('femelles', 'males'));
    }

    /**
     * Enregistrement d'une nouvelle saillie
     */
    public function store(Request $request)
    {
        $request->validate([
            'femelle_id' => 'required|exists:femelles,id',
            'male_id' => 'required|exists:males,id',
            'date_saillie' => 'required|date',
            'date_palpage' => 'nullable|date',
            'palpation_resultat' => 'nullable|in:+,-',
        ]);

        $saillie = new Saillie();
        $saillie->femelle_id = $request->femelle_id;
        $saillie->male_id = $request->male_id;
        $saillie->date_saillie = $request->date_saillie;
        $saillie->date_palpage = $request->date_palpage;
        $saillie->palpation_resultat = $request->palpation_resultat;
        $saillie->date_mise_bas_theorique = Carbon::parse($request->date_saillie)->addDays(31);
        $saillie->save();

        return redirect()->route('saillies.index')
            ->with('success', 'Saillie enregistrée avec succès ✅');
    }

    /**
     * Formulaire d'édition
     */
    public function edit(Saillie $saillie)
    {
        $femelles = Femelle::all();
        $males = Male::all();
        return view('saillies.edit', compact('saillie', 'femelles', 'males'));
    }

    /**
     * Mise à jour d'une saillie existante
     */
    public function update(Request $request, Saillie $saillie)
    {
        $request->validate([
            'femelle_id' => 'required|exists:femelles,id',
            'male_id' => 'required|exists:males,id',
            'date_saillie' => 'required|date',
            'date_palpage' => 'nullable|date',
            'palpation_resultat' => 'nullable|in:+,-',
        ]);

        $saillie->update([
            'femelle_id' => $request->femelle_id,
            'male_id' => $request->male_id,
            'date_saillie' => $request->date_saillie,
            'date_palpage' => $request->date_palpage,
            'palpation_resultat' => $request->palpation_resultat,
            'date_mise_bas_theorique' => Carbon::parse($request->date_saillie)->addDays(31),
        ]);

        return redirect()->route('saillies.index')
            ->with('success', 'Saillie mise à jour avec succès ✅');
    }

    /**
     * Suppression d'une saillie
     */
    public function destroy(Saillie $saillie)
    {
        $saillie->delete();
        return redirect()->route('saillies.index')
            ->with('success', 'Saillie supprimée avec succès ✅');
    }
}
