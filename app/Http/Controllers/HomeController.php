<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $totalPatients      = 0;
        $totalConsultations = 0;
        $tauxVaccination    = 0;

        try {
            // ── Patients ──────────────────────────────────────
            if (Schema::hasTable('patients')) {
                // Utilise 'actif' seulement si la colonne existe
                if (Schema::hasColumn('patients', 'actif')) {
                    $totalPatients = DB::table('patients')->where('actif', 1)->count();
                } else {
                    $totalPatients = DB::table('patients')->count();
                }
            }

            // ── Consultations ─────────────────────────────────
            if (Schema::hasTable('consultations')) {
                $q = DB::table('consultations')
                    ->whereMonth('date_consultation', now()->month)
                    ->whereYear('date_consultation',  now()->year);

                if (Schema::hasColumn('consultations', 'statut')) {
                    $q->where('statut', 'effectue');
                }

                $totalConsultations = $q->count();
            }

            // ── Taux vaccination ──────────────────────────────
            if (Schema::hasTable('vaccinations')) {
                $q = DB::table('vaccinations')
                    ->whereMonth('date_administration', now()->month)
                    ->whereYear('date_administration',  now()->year);

                if (Schema::hasColumn('vaccinations', 'cible')) {
                    $q->where('cible', 'enfant');
                }
                if (Schema::hasColumn('vaccinations', 'statut')) {
                    $q->where('statut', 'administre');
                }

                $totalVaccinations = $q->count();
                $base = max($totalPatients, 1);
                $tauxVaccination = min(round(($totalVaccinations / $base) * 100), 100);
            }

        } catch (\Exception $e) {
            // Silencieux — affiche 0 si une table/colonne manque
        }

        return view('home', compact(
            'totalPatients',
            'totalConsultations',
            'tauxVaccination'
        ));
    }
}