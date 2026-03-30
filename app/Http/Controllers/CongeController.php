<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use Illuminate\Http\Request;

class CongeController extends Controller
{
    public function index()
    {
        $conges     = Conge::latest()->paginate(15);
        $historique = Conge::where('statut', 'approuve')->latest()->get();

        $stats = [
            'total'      => Conge::count(),
            'en_attente' => Conge::where('statut', 'en_attente')->count(),
            'approuve'   => Conge::where('statut', 'approuve')->count(),
            'en_cours'   => Conge::where('statut', 'en_cours')->count(),
            'refuse'     => Conge::where('statut', 'refuse')->count(),
        ];

        return view('conges.index', compact('conges', 'stats', 'historique'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_agent'  => 'required|string|max:255',
            'type'       => 'required|string',
            'date_debut' => 'required|date',
            'date_fin'   => 'required|date|after_or_equal:date_debut',
        ]);

        Conge::create([
            'nom_agent'    => $request->nom_agent,
            'matricule'    => $request->matricule,
            'grade'        => $request->grade,
            'service'      => $request->service,
            'type'         => $request->type,
            'date_debut'   => $request->date_debut,
            'date_fin'     => $request->date_fin,
            'nb_jours'     => $request->nb_jours,
            'remplacant'   => $request->remplacant,
            'observations' => $request->observations,
            'statut'       => $request->statut ?? 'en_attente',
            'valide_par'   => $request->valide_par,
        ]);

        return back()->with('success', 'Demande enregistrée avec succès.');
    }

    public function approuver($id)
    {
        Conge::findOrFail($id)->update(['statut' => 'approuve']);
        return back()->with('success', 'Congé approuvé.');
    }

    public function refuser($id)
    {
        Conge::findOrFail($id)->update(['statut' => 'refuse']);
        return back()->with('success', 'Congé refusé.');
    }

    public function destroy($id)
    {
        Conge::findOrFail($id)->delete();
        return back()->with('success', 'Demande supprimée.');
    }
}