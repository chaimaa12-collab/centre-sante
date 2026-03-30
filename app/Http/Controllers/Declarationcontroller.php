<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class DeclarationController extends Controller
{
    public function index()
    {
        if (class_exists(\App\Models\Declaration::class)) {
            $declarations = \App\Models\Declaration::latest()->paginate(15);
            $stats = [
                'total'      => \App\Models\Declaration::count(),
                'en_attente' => \App\Models\Declaration::where('statut', 'en_attente')->count(),
                'en_cours'   => \App\Models\Declaration::where('statut', 'en_cours')->count(),
                'valide'     => \App\Models\Declaration::where('statut', 'valide')->count(),
            ];
        } else {
            $declarations = new LengthAwarePaginator([], 0, 15);
            $stats = ['total' => 0, 'en_attente' => 0, 'en_cours' => 0, 'valide' => 0];
        }

        return view('declarations.index', compact('declarations', 'stats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_agent' => 'required|string|max:255',
            'type'      => 'required|string',
        ]);

        if (class_exists(\App\Models\Declaration::class)) {
            \App\Models\Declaration::create([
                'nom_agent'    => $request->nom_agent,
                'matricule'    => $request->matricule,
                'grade'        => $request->grade,
                'service'      => $request->service,
                'cin'          => $request->cin,
                'type'         => $request->type,
                'urgence'      => $request->urgence ?? 'Normal',
                'date_faits'   => $request->date_faits ?: null,
                'date_decl'    => $request->date_decl ?: now(),
                'description'  => $request->description,
                'observations' => $request->observations,
                'declare_par'  => $request->declare_par ?? auth()->user()->name ?? 'Chef de Service',
                'statut'       => $request->statut ?? 'en_attente',
            ]);
        }

        return redirect('/declarations')->with('success', '✓ Déclaration enregistrée avec succès.');
    }

    public function destroy($id)
    {
        if (class_exists(\App\Models\Declaration::class)) {
            \App\Models\Declaration::findOrFail($id)->delete();
        }
        return redirect('/declarations')->with('success', '✓ Déclaration supprimée.');
    }
}