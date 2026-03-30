<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\SmiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\MedecinChefController;
use App\Http\Controllers\DeclarationController;
use App\Http\Controllers\AppareilController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\MedicamentController;

// ══════════════════════════════════
//  PUBLIQUES
// ══════════════════════════════════
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/organisation', [OrganisationController::class, 'index'])->name('organisation');
Route::get('/smi', [SmiController::class, 'index'])->name('smi.index');

// ══════════════════════════════════
//  AUTH (guest seulement)
// ══════════════════════════════════
Route::middleware('guest')->group(function () {
    Route::get('/login',     [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',    [AuthController::class, 'login'])->name('login.post');
    Route::get('/register',  [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])
     ->name('logout')
     ->middleware('auth');

// ══════════════════════════════════
//  PROTÉGÉES (auth requis)
// ══════════════════════════════════
Route::middleware(['auth'])->group(function () {

    // ── Redirection selon le rôle ──────────────────
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;

        // ✅ match(true) pour supporter plusieurs valeurs par rôle
        return match (true) {
            in_array($role, ['chef_service', 'admin', 'chef'])
                => redirect()->route('dashboard.chef'),

            in_array($role, ['medecin_chef'])
                => redirect()->route('dashboard.medecin-chef'),

            in_array($role, ['medecin', 'medecin_generaliste'])
                => redirect()->route('dashboard.medecin'),

            in_array($role, ['infirmiere_smi', 'smi'])
                => redirect()->route('dashboard.smi'),

            in_array($role, ['infirmiere'])
                => redirect()->route('dashboard.infirmiere'),

            in_array($role, ['service_chroniques', 'chroniques'])
                => redirect()->route('dashboard.chroniques'),

            in_array($role, ['laboratoire'])
                => redirect()->route('dashboard.laboratoire'),

            // ✅ Par défaut → chef
            default => redirect()->route('dashboard.chef'),
        };
    })->name('dashboard');

    // ── Dashboards ─────────────────────────────────

    Route::get('/dashboard/chef',
        [ChefController::class, 'index']
    )->name('dashboard.chef');

    Route::get('/dashboard/medecin-chef',
        [MedecinChefController::class, 'index']
    )->name('dashboard.medecin-chef');

    Route::get('/dashboard/medecin',
        fn() => view('dashboard.medecin')
    )->name('dashboard.medecin');

    // ✅ SMI → sa propre vue (pas appareils)
    Route::get('/dashboard/smi',
        fn() => view('dashboard.chef')
    )->name('dashboard.smi');

    // ✅ Infirmière → sa propre vue
    Route::get('/dashboard/infirmiere',
        fn() => view('dashboard.chef')
    )->name('dashboard.infirmiere');

    Route::get('/dashboard/chroniques',
        fn() => view('dashboard.chroniques')
    )->name('dashboard.chroniques');

    Route::get('/dashboard/laboratoire',
        fn() => view('dashboard.chef')
    )->name('dashboard.laboratoire');

    // ── Patients ───────────────────────────────────
    Route::get('/patients',
        [PatientController::class, 'index'])->name('patients.index');
    Route::post('/patients',
        [PatientController::class, 'store'])->name('patients.store');
    Route::delete('/patients/{patient}',
        [PatientController::class, 'destroy'])->name('patients.destroy');

    // ── Consultations ──────────────────────────────
    Route::resource('consultations', ConsultationController::class);

    // ── Déclarations ───────────────────────────────
    Route::get('/declarations',
        [DeclarationController::class, 'index'])->name('declarations.index');
    Route::post('/declarations',
        [DeclarationController::class, 'store'])->name('declarations.store');
    Route::delete('/declarations/{id}',
        [DeclarationController::class, 'destroy'])->name('declarations.destroy');
    Route::get('/declarations/{id}/telecharger',
        [DeclarationController::class, 'telecharger'])->name('declarations.telecharger');
    Route::post('/declarations/telecharger-tout',
        [DeclarationController::class, 'telechargerTout'])->name('declarations.telecharger_tout');

    // ── Appareils ──────────────────────────────────
    Route::get('/appareils',
        [AppareilController::class, 'index'])->name('appareils');
    Route::post('/appareils',
        [AppareilController::class, 'store'])->name('appareils.store');
    Route::patch('/appareils/{appareil}/transferer',
        [AppareilController::class, 'transferer'])->name('appareils.transferer');
    Route::delete('/appareils/{appareil}',
        [AppareilController::class, 'destroy'])->name('appareils.destroy');

    // ── Médicaments ────────────────────────────────
    Route::get('/medicaments',
        [MedicamentController::class, 'index'])->name('medicaments.index');
    Route::post('/medicaments',
        [MedicamentController::class, 'store'])->name('medicaments.store');
    Route::post('/medicaments/entree',
        [MedicamentController::class, 'entree'])->name('medicaments.entree');
    Route::delete('/medicaments/{id}',
        [MedicamentController::class, 'destroy'])->name('medicaments.destroy');

    // ── Congés ─────────────────────────────────────
    Route::get('/conges',
        [CongeController::class, 'index'])->name('conges.index');
    Route::post('/conges',
        [CongeController::class, 'store'])->name('conges.store');
    Route::patch('/conges/{id}/approuver',
        [CongeController::class, 'approuver'])->name('conges.approuver');
    Route::patch('/conges/{id}/refuser',
        [CongeController::class, 'refuser'])->name('conges.refuser');
    Route::delete('/conges/{id}',
        [CongeController::class, 'destroy'])->name('conges.destroy');

    // ── Rapports ───────────────────────────────────
  Route::get('/rapports',  [RapportController::class, 'index'])->name('rapports.index');
Route::post('/rapports', [RapportController::class, 'store'])->name('rapports.store');

});



