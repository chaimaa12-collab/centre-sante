<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use App\Models\MouvementMedicament;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{
    public function index()
    {
        $medicaments = Medicament::all();
        $mouvements  = MouvementMedicament::with('medicament')
                        ->latest()->take(50)->get();

        $stats = [
            'total'    => $medicaments->count(),
            'en_stock' => $medicaments->where('quantite', '>', 0)->count(),
            'faible'   => $medicaments->filter(fn($m) => $m->quantite > 0 && $m->quantite <= $m->seuil_alerte)->count(),
            'rupture'  => $medicaments->where('quantite', 0)->count(),
            'valeur'   => $medicaments->sum(fn($m) => $m->prix * $m->quantite),
        ];

        return view('medicaments.index', compact('medicaments', 'mouvements', 'stats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom'       => 'required|string|max:255',
            'categorie' => 'required|string',
            'prix'      => 'required|numeric|min:0',
        ]);

        Medicament::create([
            'nom'             => $request->nom,
            'dci'             => $request->dci,
            'categorie'       => $request->categorie,
            'forme'           => $request->forme,
            'prix'            => $request->prix,
            'unites_boite'    => $request->unites_boite ?? 1,
            'quantite'        => $request->quantite ?? 0,
            'seuil_alerte'    => $request->seuil_alerte ?? 5,
            'fournisseur'     => $request->fournisseur,
            'code'            => $request->code,
            'date_peremption' => $request->date_peremption,
        ]);

        return back()->with('success', 'Médicament ajouté avec succès.');
    }

    public function entree(Request $request)
    {
        $request->validate([
            'medicament_id'  => 'required|exists:medicaments,id',
            'quantite'       => 'required|integer|min:1',
            'date_mouvement' => 'required|date',
        ]);

        $med = Medicament::findOrFail($request->medicament_id);

        // Enregistrer le mouvement
        MouvementMedicament::create([
            'medicament_id'  => $request->medicament_id,
            'type'           => 'entree',
            'quantite'       => $request->quantite,
            'prix_unitaire'  => $request->prix_unitaire ?? $med->prix,
            'fournisseur'    => $request->fournisseur,
            'num_bon'        => $request->num_bon,
            'responsable'    => $request->responsable,
            'date_peremption'=> $request->date_peremption,
            'motif'          => $request->motif,
            'date_mouvement' => $request->date_mouvement,
        ]);

        // Mettre à jour le stock
        $med->increment('quantite', $request->quantite);

        // Mettre à jour le prix si fourni
        if ($request->prix_unitaire) {
            $med->update(['prix' => $request->prix_unitaire]);
        }

        return back()->with('success', "Entrée de {$request->quantite} boîtes enregistrée pour {$med->nom}.");
    }

    public function destroy($id)
    {
        Medicament::findOrFail($id)->delete();
        return back()->with('success', 'Médicament supprimé.');
    }
}