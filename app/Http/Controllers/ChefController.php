<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Patient;
use App\Models\Appareil;

use App\Models\RapportPf;
use App\Models\RapportCpn;
use App\Models\RapportAccouchement;
use App\Models\RapportVaccination;
use App\Models\RapportEnfant;
use App\Models\RapportChronique;

class ChefController extends Controller
{
    public function index()
    {
        $now = now();
        $m = $now->month;
        $y = $now->year;

        // 🔢 total rapports (من جميع الجداول)
        $totalRapports = collect([
            RapportPf::class,
            RapportCpn::class,
            RapportAccouchement::class,
            RapportVaccination::class,
            RapportEnfant::class,
            RapportChronique::class,
        ])->sum(fn($model) =>
            $model::whereMonth('created_at', $m)
                  ->whereYear('created_at', $y)
                  ->count()
        );

        // 📋 جمع جميع rapports
        $rapports = collect()
            ->merge(RapportPf::latest()->get())
            ->merge(RapportCpn::latest()->get())
            ->merge(RapportAccouchement::latest()->get())
            ->merge(RapportVaccination::latest()->get())
            ->merge(RapportEnfant::latest()->get())
            ->merge(RapportChronique::latest()->get())
            ->sortByDesc('created_at');

        return view('dashboard.chef', [
            'totalPatients'      => Patient::count(),
            'totalConsultations' => 0,
            'totalAppareils'     => Appareil::where('statut', 'operationnel')->count(),

            'totalRapports'      => $totalRapports,
            'rapports'           => $rapports,

            'appareils'          => Appareil::latest()->get(),
        ]);
    }

    // ❌ حذفنا storeRapport حيث ما كاينش Rapport model
    // ✔️ خاصك تستعمل RapportController بدل هاد الفونكسيون

    // ─────────────────────────────────────────
    // ✅ Appareils
    // ─────────────────────────────────────────

    public function storeAppareil(Request $request)
    {
        $request->validate([
            'nom'                  => 'required|string|max:100',
            'type'                 => 'required|string|max:50',
            'marque'               => 'required|string|max:100',
            'numero_serie'         => 'required|string|max:100|unique:appareils,numero_serie',
            'salle'                => 'required|string|max:100',
            'statut'               => 'required|in:operationnel,maintenance,hors_service',
            'derniere_maintenance' => 'nullable|date',
        ]);

        Appareil::create(
            $request->only([
                'nom','type','marque','numero_serie',
                'salle','statut','derniere_maintenance'
            ]) + ['created_by' => auth()->id()]
        );

        return redirect('/dashboard/chef#appareils')
            ->with('success', 'Appareil ajouté !');
    }

    public function destroyAppareil(Appareil $appareil)
    {
        $appareil->delete();

        return redirect('/dashboard/chef#appareils')
            ->with('success', 'Appareil supprimé.');
    }
}