<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MedecinChefController extends Controller
{
    private function safeCount(string $table, array $where = []): int
    {
        try {
            $q = DB::table($table);
            foreach ($where as $col => $val) {
                $q->where($col, $val);
            }
            return $q->count();
        } catch (\Exception $e) {
            return 0;
        }
    }

    private function safeGet(string $table, callable $callback = null)
    {
        try {
            $q = DB::table($table);
            if ($callback) $q = $callback($q);
            return $q->get();
        } catch (\Exception $e) {
            return collect();
        }
    }

    public function index()
    {
        // ── Statistiques ──
        $totalPatients    = $this->safeCount('patients');
        $totalPersonnels  = $this->safeCount('users');
        $totalMedicaments = $this->safeCount('medicaments');
        $totalAppareils   = $this->safeCount('appareils');
        $totalAnalyses    = $this->safeCount('analyses');
        $totalRapports    = $this->safeCount('rapports');

        // ── Patients ce mois ──
        $patientsCeMois = 0;
        try {
            $patientsCeMois = DB::table('patients')
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at',  Carbon::now()->year)
                ->count();
        } catch (\Exception $e) {}

        // ── Appareils par statut ──
        $appareilsOp    = $this->safeCount('appareils', ['statut' => 'operationnel']);
        $appareilsMaint = $this->safeCount('appareils', ['statut' => 'maintenance']);
        $appareilsHS    = $this->safeCount('appareils', ['statut' => 'hors_service']);

        // ── Équipe médicale ──
        $equipe = $this->safeGet('users', fn($q) =>
            $q->whereNotIn('role', ['admin', 'chef_service'])->orderBy('role')
        );

        // ── Derniers patients ──
        $derniersPatients = $this->safeGet('patients', fn($q) =>
            $q->orderByDesc('created_at')->limit(6)
        );

        // ── Analyses récentes ──
        $dernieresAnalyses = $this->safeGet('analyses', fn($q) =>
            $q->orderByDesc('created_at')->limit(5)
        );

        // ── Rapports récents ──
        $derniersRapports = $this->safeGet('rapports', fn($q) =>
            $q->orderByDesc('created_at')->limit(5)
        );

        // ── Services ──
        $services = $this->safeGet('services');

        // ── Médicaments stock faible ──
        $medicamentsFaibles = $this->safeGet('medicaments', fn($q) =>
            $q->where('quantite', '<=', 10)->orderBy('quantite')->limit(5)
        );

        return view('dashboard.medecin-chef', compact(
            'totalPatients', 'totalPersonnels', 'totalMedicaments',
            'totalAppareils', 'totalAnalyses', 'totalRapports',
            'patientsCeMois',
            'appareilsOp', 'appareilsMaint', 'appareilsHS',
            'equipe', 'derniersPatients',
            'dernieresAnalyses', 'derniersRapports',
            'services', 'medicamentsFaibles'
        ));
    }
}