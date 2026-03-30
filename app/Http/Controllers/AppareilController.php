<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appareil;
use App\Models\RapportPf;
use App\Models\RapportCpn;
use App\Models\RapportAccouchement;
use App\Models\RapportVaccination;
use App\Models\RapportEnfant;
use App\Models\RapportChronique;

class AppareilController extends Controller
{
    public function index()
    {
        $appareils = Appareil::orderBy('created_at', 'desc')->get();

        $transferts = Appareil::whereNotNull('service_transfere')
                              ->orderBy('date_transfert', 'desc')
                              ->get();

        // ✅ Corrigé : combinaison de tous les modèles rapports existants
        $rapports = collect()
            ->merge(RapportPf::orderBy('created_at', 'desc')->get())
            ->merge(RapportCpn::orderBy('created_at', 'desc')->get())
            ->merge(RapportAccouchement::orderBy('created_at', 'desc')->get())
            ->merge(RapportVaccination::orderBy('created_at', 'desc')->get())
            ->merge(RapportEnfant::orderBy('created_at', 'desc')->get())
            ->merge(RapportChronique::orderBy('created_at', 'desc')->get())
            ->sortByDesc('created_at');

        // ✅ Services nécessaires pour le formulaire
        $services = collect([
            (object)['nom' => 'Consultation',  'ico' => '⊕', 'resp' => 'Dr. Alami'],
            (object)['nom' => 'SMI',           'ico' => '◈', 'resp' => 'Dr. Benali'],
            (object)['nom' => 'Chroniques',    'ico' => '♡', 'resp' => 'Dr. Chakir'],
            (object)['nom' => 'Laboratoire',   'ico' => '⬡', 'resp' => 'Dr. Drissi'],
            (object)['nom' => 'Urgences',      'ico' => '⚡', 'resp' => 'Dr. El Fassi'],
            (object)['nom' => 'Administration','ico' => '▦', 'resp' => 'M. Tahir'],
        ]);

        return view('dashboard.appareils', compact(
            'appareils', 'transferts', 'rapports', 'services'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom'                  => 'required|string|max:150',
            'type'                 => 'required|string',
            'marque'               => 'required|string|max:100',
            'numero_serie'         => 'required|string|max:100|unique:appareils,numero_serie',
            'salle'                => 'required|string|max:100',
            'statut'               => 'required|in:operationnel,maintenance,hors_service',
            'quantite'             => 'nullable|integer|min:1',
            'derniere_maintenance' => 'nullable|date',
        ], [
            'nom.required'          => 'Le nom est obligatoire.',
            'type.required'         => 'Le type est obligatoire.',
            'marque.required'       => 'Le fabricant est obligatoire.',
            'numero_serie.required' => 'Le numéro de série est obligatoire.',
            'numero_serie.unique'   => 'Ce numéro de série existe déjà.',
            'salle.required'        => 'Le service est obligatoire.',
        ]);

        Appareil::create([
            'nom'                  => $request->nom,
            'type'                 => $request->type,
            'marque'               => $request->marque,
            'numero_serie'         => $request->numero_serie,
            'salle'                => $request->salle,
            'statut'               => $request->statut,
            'quantite'             => $request->quantite ?? 1,
            'derniere_maintenance' => $request->derniere_maintenance,
        ]);

        return redirect('/appareils')->with('success', 'Appareil ajouté avec succès !');
    }

    public function transferer(Request $request, Appareil $appareil)
    {
        $request->validate([
            'service_transfere' => 'required|string',
            'date_transfert'    => 'required|date',
        ]);

        $appareil->update([
            'service_transfere' => $request->service_transfere,
            'date_transfert'    => $request->date_transfert,
            'motif_transfert'   => $request->motif_transfert,
            'salle'             => $request->service_transfere,
        ]);

        return redirect('/appareils')
               ->with('success', 'Appareil transféré vers ' . $request->service_transfere . ' !');
    }

    public function destroy(Appareil $appareil)
    {
        $appareil->delete();
        return redirect('/appareils')->with('success', 'Appareil supprimé.');
    }
}