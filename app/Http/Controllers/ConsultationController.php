<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultationController extends Controller
{
    public function index()
    {
        $consultations = DB::table('consultations')
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('consultations.index', compact('consultations'));
    }

    public function create()
    {
        return view('consultations.create');
    }

    public function store(Request $request)
    {
        // test (حيدها من بعد)
        // dd($request->all());

        DB::table('consultations')->insert([

            // Patient
            'nom_patient' => $request->nom_patient,
            'prenom_patient' => $request->prenom_patient,
            'cin_patient' => $request->cin_patient,
            'telephone_patient' => $request->telephone_patient,
            'date_naissance_patient' => $request->date_naissance_patient,
            'sexe_patient' => $request->sexe_patient,

            // Consultation
            'date' => $request->date,
            'motif' => $request->motif,
            'diagnostic' => $request->diagnostic,
            'traitement' => $request->traitement,
            'observations' => $request->observations,

            // Constantes
            'tension' => $request->tension,
            'poids' => $request->poids,
            'taille' => $request->taille,
            'temperature' => $request->temperature,

            // Service
            'service' => $request->service,
            'statut' => $request->statut,

            // Médecin
            'medecin_id' => auth()->id(),
            'medecin_nom' => auth()->user()->name,

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Consultation enregistrée avec succès.');
    }
}