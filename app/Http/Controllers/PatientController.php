<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index()
    {
        return view('patients.index', [
            'patients'        => Patient::latest()->paginate(15),
            'totalPatients'   => Patient::count(),
            'nouveauxMois'    => Patient::whereMonth('created_at', now()->month)->count(),
            'avecChroniques'  => Patient::where('maladie_chronique', true)->count(),
            'femmesEnceintes' => Patient::where('est_enceinte', true)->count(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'prenom'         => 'required|string|max:100',
            'nom'            => 'required|string|max:100',
            'sexe'           => 'required|in:M,F',
            'cin'            => 'nullable|string|max:20|unique:patients,cin',
            'telephone'      => 'nullable|string|max:20',
            'date_naissance' => 'nullable|date',
            'adresse'        => 'nullable|string|max:255',
        ]);

        $dernierNumero = Patient::max('numero_dossier') ?? 0;

        Patient::create(array_merge($request->only([
            'prenom','nom','sexe','cin','telephone',
            'date_naissance','adresse','est_enceinte',
            'maladie_chronique','observations'
        ]), [
            'numero_dossier' => $dernierNumero + 1,
        ]));

        return redirect('/patients')->with('success', 'Patient ajouté avec succès !');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect('/patients')->with('success', 'Patient supprimé.');
    }
}
