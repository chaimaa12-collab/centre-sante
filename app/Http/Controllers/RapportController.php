<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\RapportPf;
use App\Models\RapportCpn;
use App\Models\RapportAccouchement;
use App\Models\RapportVaccination;
use App\Models\RapportEnfant;
use App\Models\RapportChronique;

class RapportController extends Controller
{
    // ✅ Liste tous les rapports (GET /rapports)
    public function index()
    {
        $rapports = collect()
            ->merge(RapportPf::latest()->get())
            ->merge(RapportCpn::latest()->get())
            ->merge(RapportAccouchement::latest()->get())
            ->merge(RapportVaccination::latest()->get())
            ->merge(RapportEnfant::latest()->get())
            ->merge(RapportChronique::latest()->get())
            ->sortByDesc('created_at');

        return view('rapports.index', compact('rapports'));
    }

    // ✅ Dashboard chef
    public function dashboard()
    {
        $now = now();
        $m = $now->month;
        $y = $now->year;

        $totalRapports = $this->countRapportsMois($now);

        $rapports = collect()
            ->merge(RapportPf::latest()->get())
            ->merge(RapportCpn::latest()->get())
            ->merge(RapportAccouchement::latest()->get())
            ->merge(RapportVaccination::latest()->get())
            ->merge(RapportEnfant::latest()->get())
            ->merge(RapportChronique::latest()->get())
            ->sortByDesc('created_at');

        return view('dashboard.chef', [
            'totalPatients'      => 0,
            'totalConsultations' => 0,
            'totalVaccinations'  => RapportVaccination::whereMonth('created_at', $m)
                                        ->whereYear('created_at', $y)
                                        ->sum('vacc_bcg_total'),
            'totalRapports'      => $totalRapports,
            'rapports'           => $rapports,
        ]);
    }

    // ✅ Router POST
    public function store(Request $request)
    {
        return match ($request->type_rapport) {
            'pf'           => $this->storePf($request),
            'cpn'          => $this->storeCpn($request),
            'accouchement' => $this->storeAccouchement($request),
            'vaccination'  => $this->storeVaccination($request),
            'enfant'       => $this->storeEnfant($request),
            'chroniques'   => $this->storeChroniques($request),
            default        => back()->with('error', 'Type de rapport invalide'),
        };
    }

    // ✅ PF
    private function storePf(Request $request)
    {
        $data = $request->validate([
            'mois'            => 'required|string|max:20',
            'circonscription' => 'required|string|max:100',
        ] + $this->numbersPf(), $this->frMessages());

        RapportPf::updateOrCreate(
            ['mois' => $data['mois'], 'circonscription' => $data['circonscription']],
            array_merge($data, ['user_id' => Auth::id()])
        );

        return back()->with('success', 'Rapport PF enregistré avec succès');
    }

    // ✅ CPN
    private function storeCpn(Request $request)
    {
        $data = $request->validate([
            'mois' => 'required|string|max:20',
        ] + $this->numbersCpn(), $this->frMessages());

        RapportCpn::updateOrCreate(
            ['mois' => $data['mois']],
            array_merge($data, ['user_id' => Auth::id()])
        );

        return back()->with('success', 'Rapport CPN enregistré avec succès');
    }

    // ✅ Accouchement
    private function storeAccouchement(Request $request)
    {
        $data = $request->validate([
            'mois' => 'required|string|max:20',
        ] + $this->numbersAcc(), $this->frMessages());

        RapportAccouchement::updateOrCreate(
            ['mois' => $data['mois']],
            array_merge($data, ['user_id' => Auth::id()])
        );

        return back()->with('success', 'Rapport Accouchement enregistré avec succès');
    }

    // ✅ Vaccination
    private function storeVaccination(Request $request)
    {
        $data = $request->validate([
            'mois' => 'required|string|max:20',
        ] + $this->numbersVacc(), $this->frMessages());

        RapportVaccination::updateOrCreate(
            ['mois' => $data['mois']],
            array_merge($data, ['user_id' => Auth::id()])
        );

        return back()->with('success', 'Rapport Vaccination enregistré avec succès');
    }

    // ✅ Enfant
    private function storeEnfant(Request $request)
    {
        $data = $request->validate([
            'mois'                  => 'required|string|max:20',
            'enf_visites_0_2'       => 'required|integer|min:0',
            'enf_visites_2_59'      => 'required|integer|min:0',
            'enf_premiers_contacts' => 'required|integer|min:0',
        ], $this->frMessages());

        RapportEnfant::updateOrCreate(
            ['mois' => $data['mois']],
            array_merge($data, ['user_id' => Auth::id()])
        );

        return back()->with('success', 'Rapport Enfant enregistré avec succès');
    }

    // ✅ Chroniques
    private function storeChroniques(Request $request)
    {
        $data = $request->validate([
            'mois' => 'required|string|max:20',
        ] + $this->numbersChronique(), $this->frMessages());

        RapportChronique::updateOrCreate(
            ['mois' => $data['mois']],
            array_merge($data, ['user_id' => Auth::id()])
        );

        return back()->with('success', 'Rapport Chronique enregistré avec succès');
    }

    // 🔢 Helper count rapports du mois
    private function countRapportsMois($now)
    {
        return collect([
            RapportPf::class,
            RapportCpn::class,
            RapportAccouchement::class,
            RapportVaccination::class,
            RapportEnfant::class,
            RapportChronique::class,
        ])->sum(fn($model) =>
            $model::whereMonth('created_at', $now->month)
                  ->whereYear('created_at', $now->year)
                  ->count()
        );
    }

    // 🧩 Règles de validation par type
    private function numbersPf()
    {
        return ['pf_nouvelles_urb' => 'required|integer|min:0'];
    }

    private function numbersCpn()
    {
        return ['cpn_1er_trim_urb' => 'required|integer|min:0'];
    }

    private function numbersAcc()
    {
        return ['acc_vb_urb' => 'required|integer|min:0'];
    }

    private function numbersVacc()
    {
        return ['vacc_bcg_total' => 'required|integer|min:0'];
    }

    private function numbersChronique()
    {
        return ['diab_nouveaux' => 'required|integer|min:0'];
    }

    // 🌐 Messages de validation en français
    private function frMessages()
    {
        return [
            'required' => 'Ce champ est obligatoire.',
            'integer'  => 'La valeur doit être un nombre entier.',
            'min'      => 'La valeur ne peut pas être négative.',
            'string'   => 'Ce champ doit être une chaîne de caractères.',
            'max'      => 'Ce champ est trop long.',
        ];
    }
}