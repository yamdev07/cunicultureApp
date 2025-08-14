<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Male;

class MaleController extends Controller
{
    public function index()
    {
        $males = Male::orderBy('created_at', 'desc')->paginate(10);
        return view('males.index', compact('males'));
    }

    public function create()
    {
        return view('males.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:males,code',
            'nom' => 'required|string|max:255',
            'race' => 'required|string|max:255',
            'origine' => 'nullable|string|max:255',
            'date_naissance' => 'required|date',
            'etat' => 'required|in:Active,Inactive',
        ]);

        Male::create($request->all());

        return redirect()->route('males.index')->with('success', 'Mâle ajouté avec succès.');
    }

    public function edit(string $id)
    {
        $male = Male::findOrFail($id);
        return view('males.edit', compact('male'));
    }

    public function update(Request $request, string $id)
    {
        $male = Male::findOrFail($id);

        $request->validate([
            'code' => 'required|unique:males,code,' . $male->id,
            'nom' => 'required|string|max:255',
            'race' => 'required|string|max:255',
            'origine' => 'nullable|string|max:255',
            'date_naissance' => 'required|date',
            'etat' => 'required|in:Active,Inactive',
        ]);

        $male->update($request->all());

        return redirect()->route('males.index')->with('success', 'Mâle modifié avec succès.');
    }

    public function destroy(string $id)
    {
        $male = Male::findOrFail($id);
        $male->delete();

        return redirect()->route('males.index')->with('success', 'Mâle supprimé avec succès.');
    }
}
