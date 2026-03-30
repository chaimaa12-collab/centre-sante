@extends('layouts.app')

@section('title', 'Congés du Personnel')
@section('breadcrumb', 'Congés')
@section('page-title', 'Gestion des Congés')

@section('styles')
.kpi-strip { display: grid; grid-template-columns: repeat(5, 1fr); gap: .85rem; margin-bottom: 1.8rem; }
.kpi { background: var(--surface); border: 1px solid var(--rule); border-radius: var(--r-lg); padding: 1rem 1.1rem; position: relative; overflow: hidden; box-shadow: 0 1px 6px rgba(0,0,0,.06); transition: var(--tr); }
.kpi:hover { transform: translateY(-2px); box-shadow: 0 4px 20px rgba(0,0,0,.08); }
.kpi-top { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: .5rem; }
.kpi-label { font-size: .58rem; font-weight: 700; text-transform: uppercase; letter-spacing: .1em; color: var(--ink-3); }
.kpi-ico { font-size: 1.1rem; opacity: .4; }
.kpi-val { font-family: var(--fd); font-size: 1.8rem; line-height: 1; letter-spacing: -.03em; }
.kpi-foot { font-size: .62rem; color: var(--ink-3); margin-top: .3rem; font-family: var(--fm); }
.kpi-bar { position: absolute; bottom: 0; left: 0; right: 0; height: 2.5px; }
.c-teal{color:var(--teal)} .b-teal{background:var(--teal)}
.c-amber{color:var(--amber)} .b-amber{background:var(--amber)}
.c-emerald{color:var(--emerald)} .b-emerald{background:var(--emerald)}
.c-coral{color:var(--coral)} .b-coral{background:var(--coral)}
.c-indigo{color:var(--indigo)} .b-indigo{background:var(--indigo)}

.flash { padding: .8rem 1.1rem; border-radius: var(--r); font-size: .82rem; margin-bottom: 1.2rem; display: flex; align-items: center; gap: .6rem; }
.flash-ok  { background: var(--emerald-lt); border: 1px solid rgba(22,101,52,.2); color: var(--emerald); }
.flash-err { background: var(--coral-lt);   border: 1px solid rgba(192,57,43,.2); color: var(--coral); }

.toolbar { display: flex; align-items: center; justify-content: space-between; gap: 1rem; margin-bottom: 1.2rem; flex-wrap: wrap; }
.toolbar-left { display: flex; align-items: center; gap: .6rem; flex-wrap: wrap; }
.filter-select { background: var(--surface); border: 1px solid var(--rule-2); border-radius: var(--r); padding: .5rem .85rem; font-size: .75rem; font-family: var(--fw); color: var(--ink-2); cursor: pointer; outline: none; transition: var(--tr); }
.filter-select:focus { border-color: var(--teal); box-shadow: 0 0 0 3px var(--teal-lt); }

.tab-nav { display: flex; align-items: center; border-bottom: 2px solid var(--rule); margin-bottom: 1.5rem; }
.tab-item { font-size: .78rem; font-weight: 600; color: var(--ink-3); padding: .75rem 1.3rem; cursor: pointer; border-bottom: 2px solid transparent; transition: var(--tr); display: flex; align-items: center; gap: .45rem; position: relative; bottom: -2px; background: none; border-top: none; border-left: none; border-right: none; font-family: var(--fw); }
.tab-item:hover { color: var(--ink-2); }
.tab-item.active { color: var(--teal); border-bottom-color: var(--teal); }
.tab-count { background: var(--surface-2); color: var(--ink-3); font-size: .58rem; font-weight: 700; padding: .1rem .4rem; border-radius: 4px; font-family: var(--fm); }
.tab-item.active .tab-count { background: var(--teal-lt); color: var(--teal); }
.tab-section { display: none; }
.tab-section.active { display: block; }

.tbl-wrap { overflow-x: auto; border-radius: var(--r-lg); border: 1px solid var(--rule); }

.agent-cell { display: flex; align-items: center; gap: .7rem; }
.agent-avatar { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: .65rem; font-weight: 800; color: #fff; flex-shrink: 0; }
.agent-name { font-weight: 700; color: var(--ink); font-size: .78rem; }
.agent-role { font-size: .62rem; color: var(--ink-3); margin-top: .05rem; font-family: var(--fm); }

.cal-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-bottom: 1.5rem; }
.cal-month { background: var(--surface); border: 1px solid var(--rule); border-radius: var(--r-lg); overflow: hidden; box-shadow: 0 1px 6px rgba(0,0,0,.06); }
.cal-month-head { background: var(--ink); color: #fff; padding: .75rem 1rem; display: flex; align-items: center; justify-content: space-between; }
.cal-month-name { font-family: var(--fd); font-size: .85rem; color: #fff; }
.cal-month-year { font-size: .62rem; color: rgba(255,255,255,.4); font-family: var(--fm); }
.cal-days-head { display: grid; grid-template-columns: repeat(7, 1fr); background: var(--surface-2); border-bottom: 1px solid var(--rule); }
.cal-day-lbl { font-size: .55rem; font-weight: 700; text-transform: uppercase; letter-spacing: .06em; color: var(--ink-3); padding: .4rem 0; text-align: center; }
.cal-days { display: grid; grid-template-columns: repeat(7, 1fr); padding: .4rem; gap: 2px; }
.cal-day { aspect-ratio: 1; display: flex; align-items: center; justify-content: center; font-size: .68rem; border-radius: 6px; cursor: default; color: var(--ink-3); transition: var(--tr); }
.cal-day.today { background: var(--teal); color: #fff; font-weight: 700; }
.cal-day.has-conge { background: rgba(180,83,9,.15); color: var(--amber); font-weight: 700; position: relative; }
.cal-day.faded { opacity: .25; }

.prog-bar { height: 4px; background: var(--rule); border-radius: 2px; overflow: hidden; margin-top: .3rem; }
.prog-fill { height: 100%; border-radius: 2px; }

.form-grid-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem; margin-bottom: 1rem; }
.form-group  { margin-bottom: .9rem; }
.form-label  { display: block; font-size: .6rem; font-weight: 700; color: var(--ink-3); text-transform: uppercase; letter-spacing: .1em; margin-bottom: .32rem; }
.form-input, .form-select, .form-textarea { width: 100%; padding: .58rem .85rem; border: 1px solid var(--rule-2); border-radius: var(--r); font-size: .82rem; font-family: var(--fw); color: var(--ink); background: var(--surface-2); outline: none; transition: var(--tr); }
.form-input:focus, .form-select:focus { border-color: var(--teal); background: var(--surface); box-shadow: 0 0 0 3px var(--teal-lt); }
.form-section-title { font-size: .6rem; font-weight: 700; text-transform: uppercase; letter-spacing: .12em; color: var(--teal); margin-bottom: .9rem; padding-bottom: .55rem; border-bottom: 1px solid var(--rule); display: flex; align-items: center; gap: .4rem; }
.field-error { font-size: .65rem; color: var(--coral); margin-top: .25rem; }

.solde-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: .85rem; margin-bottom: 1.5rem; }
.solde-card { background: var(--surface); border: 1px solid var(--rule); border-radius: var(--r-lg); padding: 1rem 1.2rem; position: relative; overflow: hidden; box-shadow: 0 1px 6px rgba(0,0,0,.06); transition: var(--tr); }
.solde-card:hover { transform: translateY(-2px); box-shadow: 0 4px 20px rgba(0,0,0,.08); }
.solde-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px; }
.solde-card.s-teal::before    { background: var(--teal); }
.solde-card.s-amber::before   { background: var(--amber); }
.solde-card.s-emerald::before { background: var(--emerald); }
.solde-card.s-coral::before   { background: var(--coral); }
.solde-header { display: flex; align-items: center; gap: .7rem; margin-bottom: .8rem; }
.solde-ico { width: 36px; height: 36px; border-radius: 9px; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0; }
.solde-name { font-size: .75rem; font-weight: 700; color: var(--ink); }
.solde-role { font-size: .62rem; color: var(--ink-3); font-family: var(--fm); margin-top: .05rem; }
.solde-nums { display: flex; gap: 1rem; }
.solde-num-val { font-family: var(--fd); font-size: 1.4rem; color: var(--ink); letter-spacing: -.03em; line-height: 1; }
.solde-num-lbl { font-size: .58rem; color: var(--ink-3); text-transform: uppercase; letter-spacing: .08em; margin-top: .15rem; }

.timeline { position: relative; padding-left: 1.6rem; }
.timeline::before { content: ''; position: absolute; left: 6px; top: 0; bottom: 0; width: 1.5px; background: var(--rule); }
.tl-item { position: relative; margin-bottom: 1.1rem; }
.tl-item:last-child { margin-bottom: 0; }
.tl-dot { position: absolute; left: -1.6rem; top: .3rem; width: 10px; height: 10px; border-radius: 50%; border: 2px solid var(--surface); }
.tl-content { background: var(--surface); border: 1px solid var(--rule); border-radius: var(--r); padding: .75rem 1rem; }
.tl-header { display: flex; align-items: flex-start; justify-content: space-between; gap: .5rem; margin-bottom: .3rem; }
.tl-name { font-size: .78rem; font-weight: 700; color: var(--ink); }
.tl-meta { font-size: .65rem; color: var(--ink-3); font-family: var(--fm); margin-top: .15rem; }

.empty-state { text-align: center; padding: 3.5rem 2rem; color: var(--ink-3); }
.empty-ico   { font-size: 2.5rem; opacity: .25; margin-bottom: .7rem; }
.empty-title { font-family: var(--fd); font-size: 1rem; color: var(--ink-2); margin-bottom: .3rem; }
.empty-sub   { font-size: .75rem; }

.toast { position: fixed; top: 1.2rem; right: 1.5rem; z-index: 2000; display: none; align-items: center; gap: .7rem; padding: .8rem 1.2rem; border-radius: var(--r-lg); font-size: .8rem; font-weight: 600; box-shadow: 0 12px 40px rgba(0,0,0,.12); max-width: 360px; }
.toast.open { display: flex; animation: slideIn .25s ease; }
.toast-ok  { background: #f0fdf4; border: 1px solid rgba(22,163,74,.3); color: var(--emerald); }
.toast-err { background: #fef2f2; border: 1px solid rgba(220,38,38,.3); color: var(--coral); }
@keyframes slideIn { from{opacity:0;transform:translateX(20px)} to{opacity:1;transform:translateX(0)} }
@keyframes fadeUp  { from{opacity:0;transform:translateY(12px)} to{opacity:1;transform:translateY(0)} }
.anim   { animation: fadeUp .4s ease both; }
.anim-1 { animation-delay: .05s; }
.anim-2 { animation-delay: .1s; }
.anim-3 { animation-delay: .15s; }

@media (max-width: 1100px) { .kpi-strip{grid-template-columns:repeat(3,1fr)} .cal-grid{grid-template-columns:1fr 1fr} .solde-grid{grid-template-columns:1fr 1fr} }
@media (max-width: 700px)  { .kpi-strip{grid-template-columns:1fr 1fr} .cal-grid{grid-template-columns:1fr} .solde-grid{grid-template-columns:1fr} }
@endsection

@section('topbar-actions')
    <button onclick="window.print()" class="btn btn-ghost btn-sm no-print">📄 Imprimer</button>
    <button onclick="document.getElementById('btn-toggle').click()" class="btn btn-teal btn-sm no-print">＋ Nouvelle demande</button>
@endsection

@section('content')

@if(session('success'))
<div class="flash flash-ok anim">✓ &nbsp;{{ session('success') }}</div>
@endif
@if(session('error'))
<div class="flash flash-err anim">✕ &nbsp;{{ session('error') }}</div>
@endif

<!-- KPI STRIP -->
<div class="kpi-strip anim">
    <div class="kpi">
        <div class="kpi-top"><div class="kpi-label">Total demandes</div><div class="kpi-ico">🏖</div></div>
        <div class="kpi-val c-teal">{{ $stats['total'] ?? 0 }}</div>
        <div class="kpi-foot">Cette année</div>
        <div class="kpi-bar b-teal"></div>
    </div>
    <div class="kpi">
        <div class="kpi-top"><div class="kpi-label">En attente</div><div class="kpi-ico">⏳</div></div>
        <div class="kpi-val c-amber">{{ $stats['en_attente'] ?? 0 }}</div>
        <div class="kpi-foot">À approuver</div>
        <div class="kpi-bar b-amber"></div>
    </div>
    <div class="kpi">
        <div class="kpi-top"><div class="kpi-label">Approuvés</div><div class="kpi-ico">✓</div></div>
        <div class="kpi-val c-emerald">{{ $stats['approuve'] ?? 0 }}</div>
        <div class="kpi-foot">Validés</div>
        <div class="kpi-bar b-emerald"></div>
    </div>
    <div class="kpi">
        <div class="kpi-top"><div class="kpi-label">En cours</div><div class="kpi-ico">📅</div></div>
        <div class="kpi-val c-indigo">{{ $stats['en_cours'] ?? 0 }}</div>
        <div class="kpi-foot">Actuellement absents</div>
        <div class="kpi-bar b-indigo"></div>
    </div>
    <div class="kpi">
        <div class="kpi-top"><div class="kpi-label">Refusés</div><div class="kpi-ico">✕</div></div>
        <div class="kpi-val c-coral">{{ $stats['refuse'] ?? 0 }}</div>
        <div class="kpi-foot">Cette année</div>
        <div class="kpi-bar b-coral"></div>
    </div>
</div>

<!-- TABS -->
<div class="tab-nav no-print anim anim-1">
    <button class="tab-item active" onclick="showTab('demandes',this)">
        Demandes <span class="tab-count">{{ $conges->total() ?? 0 }}</span>
    </button>
    <button class="tab-item" onclick="showTab('calendrier',this)">
        Calendrier <span class="tab-count">2026</span>
    </button>
    <button class="tab-item" onclick="showTab('soldes',this)">
        Soldes <span class="tab-count">{{ count($agents ?? []) }}</span>
    </button>
    <button class="tab-item" onclick="showTab('historique',this)">
        Historique <span class="tab-count">{{ $stats['total'] ?? 0 }}</span>
    </button>
</div>

<!-- ══ TAB DEMANDES ══ -->
<div class="tab-section active" id="tab-demandes">

    <div class="card anim anim-2" style="margin-bottom:1.5rem">
        <div class="card-head">
            <div class="card-title">🏖 Nouvelle Demande de Congé</div>
            <button onclick="toggleForm()" class="btn btn-ghost btn-sm no-print" id="btn-toggle">
                + Saisir une demande
            </button>
        </div>
        <div id="form-wrapper" style="display:none">
            <div class="card-body">
                <form method="POST" action="/conges">
                    @csrf
                    <div class="form-section-title">👤 Informations de l'agent</div>
                    <div class="form-grid-3">
                        <div class="form-group">
                            <label class="form-label">Nom complet *</label>
                            <input type="text" name="nom_agent" class="form-input" value="{{ old('nom_agent') }}" placeholder="Nom et prénom" required/>
                            @error('nom_agent')<div class="field-error">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Matricule</label>
                            <input type="text" name="matricule" class="form-input" value="{{ old('matricule') }}" placeholder="MAT-XXXX"/>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Grade / Fonction</label>
                            <select name="grade" class="form-select">
                                @foreach(['Médecin','Infirmier(e)','Sage-femme','Technicien de santé','Agent administratif','Autre'] as $g)
                                <option value="{{ $g }}" {{ old('grade')==$g?'selected':'' }}>{{ $g }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Service</label>
                            <select name="service" class="form-select">
                                @foreach(['SMI','Consultation générale','Planification Familiale','Maladies Chroniques','Pharmacie','Administration','Laboratoire'] as $s)
                                <option value="{{ $s }}" {{ old('service')==$s?'selected':'' }}>{{ $s }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Type de congé *</label>
                            <select name="type" class="form-select" required>
                                <option value="">— Sélectionner —</option>
                                @foreach(['Congé annuel','Congé maladie','Congé maternité','Congé paternité','Congé sans solde','Congé exceptionnel','Récupération'] as $t)
                                <option value="{{ $t }}" {{ old('type')==$t?'selected':'' }}>{{ $t }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Remplaçant(e)</label>
                            <input type="text" name="remplacant" class="form-input" value="{{ old('remplacant') }}" placeholder="Nom du remplaçant"/>
                        </div>
                    </div>

                    <div class="form-section-title">📅 Période du congé</div>
                    <div class="form-grid-3">
                        <div class="form-group">
                            <label class="form-label">Date de début *</label>
                            <input type="date" name="date_debut" class="form-input" value="{{ old('date_debut') }}" required/>
                            @error('date_debut')<div class="field-error">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Date de fin *</label>
                            <input type="date" name="date_fin" class="form-input" value="{{ old('date_fin') }}" required/>
                            @error('date_fin')<div class="field-error">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nombre de jours</label>
                            <input type="number" name="nb_jours" id="nb_jours" class="form-input"
                                   value="{{ old('nb_jours') }}" placeholder="Calculé auto" readonly
                                   style="background:var(--teal-lt);color:var(--teal);font-weight:700;font-family:var(--fm)"/>
                        </div>
                    </div>

                    <div class="form-section-title">✍️ Validation</div>
                    <div class="form-grid-3">
                        <div class="form-group">
                            <label class="form-label">Statut</label>
                            <select name="statut" class="form-select">
                                <option value="en_attente" {{ old('statut','en_attente')=='en_attente'?'selected':'' }}>En attente</option>
                                <option value="approuve"   {{ old('statut')=='approuve'?'selected':'' }}>Approuvé</option>
                                <option value="refuse"     {{ old('statut')=='refuse'?'selected':'' }}>Refusé</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Validé par</label>
                            <input type="text" name="valide_par" class="form-input"
                                   value="{{ old('valide_par', auth()->user()->name ?? 'Chef de Service') }}"/>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Observations</label>
                            <input type="text" name="observations" class="form-input" value="{{ old('observations') }}" placeholder="Remarques"/>
                        </div>
                    </div>

                    <div style="display:flex;gap:.8rem;justify-content:flex-end" class="no-print">
                        <button type="button" onclick="toggleForm()" class="btn btn-ghost">✕ Annuler</button>
                        <button type="submit" class="btn btn-teal">↓ Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Tableau -->
    <div class="card anim anim-3">
        <div class="card-head">
            <div class="card-title">📋 Liste des Demandes</div>
            <span class="chip chip-info">{{ $conges->total() ?? 0 }} demande(s)</span>
        </div>

        @if(isset($conges) && $conges->count() > 0)
        <div class="tbl-wrap">
            <table class="tbl">
                <thead>
                    <tr>
                        <th>#</th><th>Agent</th><th>Type</th><th>Début</th>
                        <th>Fin</th><th>Jours</th><th>Statut</th><th>Validé par</th>
                        <th class="no-print">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($conges as $c)
                    @php
                        $colors = ['#006d77','#b45309','#166534','#3730a3','#c0392b'];
                        $color  = $colors[$c->id % 5];
                        $initiales = strtoupper(substr($c->nom_agent, 0, 2));
                        $dateDebut = $c->date_debut ? \Carbon\Carbon::parse($c->date_debut)->format('d/m/Y') : '';
                        $dateFin   = $c->date_fin   ? \Carbon\Carbon::parse($c->date_fin)->format('d/m/Y')   : '';
                        $nomJs     = addslashes($c->nom_agent);
                        $gradeJs   = addslashes($c->grade ?? '');
                        $serviceJs = addslashes($c->service ?? '');
                        $typeJs    = addslashes($c->type ?? '');
                        $valideJs  = addslashes($c->valide_par ?? 'Chef de Service');
                        $chipClass = match($c->statut) {
                            'approuve'   => 'chip-ok',
                            'en_attente' => 'chip-warn',
                            'refuse'     => 'chip-crit',
                            'en_cours'   => 'chip-indigo',
                            default      => 'chip-info',
                        };
                        $chipLabel = match($c->statut) {
                            'approuve'   => 'Approuvé',
                            'en_attente' => 'En attente',
                            'refuse'     => 'Refusé',
                            'en_cours'   => 'En cours',
                            default      => $c->statut,
                        };
                    @endphp
                    <tr>
                        <td style="font-family:var(--fm);font-size:.7rem;color:var(--ink-3)">{{ $c->id }}</td>
                        <td>
                            <div class="agent-cell">
                                <div class="agent-avatar" style="background:{{ $color }}">{{ $initiales }}</div>
                                <div>
                                    <div class="agent-name">{{ $c->nom_agent }}</div>
                                    <div class="agent-role">{{ $c->grade }} · {{ $c->service }}</div>
                                </div>
                            </div>
                        </td>
                        <td style="font-size:.77rem;font-weight:600;color:var(--ink-2)">{{ $c->type }}</td>
                        <td style="font-family:var(--fm);font-size:.72rem">{{ $dateDebut ?: '—' }}</td>
                        <td style="font-family:var(--fm);font-size:.72rem">{{ $dateFin ?: '—' }}</td>
                        <td style="font-family:var(--fm);font-size:.78rem;font-weight:700;color:var(--teal)">
                            {{ $c->nb_jours ?? '—' }} j
                        </td>
                        <td><span class="chip {{ $chipClass }}">{{ $chipLabel }}</span></td>
                        <td style="font-size:.72rem;color:var(--ink-3)">{{ $c->valide_par ?? '—' }}</td>
                        <td class="no-print">
                            <div style="display:flex;gap:.3rem">
                                @if($c->statut === 'en_attente')
                                <form method="POST" action="/conges/{{ $c->id }}/approuver" style="display:inline">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="btn btn-ghost btn-xs"
                                            style="background:var(--emerald-lt);color:var(--emerald);border-color:rgba(22,101,52,.2)"
                                            title="Approuver">✓</button>
                                </form>
                                <form method="POST" action="/conges/{{ $c->id }}/refuser" style="display:inline">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="btn btn-ghost btn-xs"
                                            style="background:var(--coral-lt);color:var(--coral);border-color:rgba(192,57,43,.2)"
                                            title="Refuser">✕</button>
                                </form>
                                @endif
                                <button
                                    data-nom="{{ $nomJs }}"
                                    data-grade="{{ $gradeJs }}"
                                    data-service="{{ $serviceJs }}"
                                    data-mat="{{ $c->matricule }}"
                                    data-type="{{ $typeJs }}"
                                    data-debut="{{ $dateDebut }}"
                                    data-fin="{{ $dateFin }}"
                                    data-jours="{{ $c->nb_jours }}"
                                    data-valide="{{ $valideJs }}"
                                    onclick="attFromBtn(this)"
                                    class="btn btn-ghost btn-xs" title="Attestation PDF"
                                    style="color:var(--indigo)">📥</button>
                                <form method="POST" action="/conges/{{ $c->id }}" style="display:inline"
                                      onsubmit="return confirm('Supprimer cette demande ?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-xs">🗑</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="padding:.8rem 1rem;border-top:1px solid var(--rule)">
            {{ $conges->links('pagination::simple-bootstrap-4') }}
        </div>
        @else
        <div class="empty-state">
            <div class="empty-ico">🏖</div>
            <div class="empty-title">Aucune demande de congé</div>
            <div class="empty-sub">Cliquez sur "+ Saisir une demande" pour commencer</div>
        </div>
        @endif
    </div>
</div>

<!-- ══ TAB CALENDRIER ══ -->
<div class="tab-section" id="tab-calendrier">
    <div class="cal-grid" id="calGrid"></div>
    <div class="card">
        <div class="card-head">
            <div class="card-title">📅 Absences du mois en cours</div>
            <span class="chip chip-info">Mars 2026</span>
        </div>
        <div class="card-body">
            <div class="timeline" id="tlAbsences"></div>
        </div>
    </div>
</div>

<!-- ══ TAB SOLDES ══ -->
<div class="tab-section" id="tab-soldes">
    @php
    $agents_soldes = [
        ['nom'=>'Dr. Alami Hassan',  'grade'=>'Médecin',       'solde_total'=>30,'pris'=>12,'reste'=>18,'color'=>'#006d77','ico'=>'👨‍⚕️','type'=>'s-teal'],
        ['nom'=>'Inf. Benali Sara',  'grade'=>'Infirmière',    'solde_total'=>30,'pris'=>22,'reste'=>8, 'color'=>'#b45309','ico'=>'👩‍⚕️','type'=>'s-amber'],
        ['nom'=>'Sf. Chakir Fatima', 'grade'=>'Sage-femme',    'solde_total'=>30,'pris'=>5, 'reste'=>25,'color'=>'#166534','ico'=>'👶','type'=>'s-emerald'],
        ['nom'=>'M. Tahir Khalid',   'grade'=>'Administratif', 'solde_total'=>30,'pris'=>30,'reste'=>0, 'color'=>'#c0392b','ico'=>'📋','type'=>'s-coral'],
    ];
    @endphp
    <div class="solde-grid">
        @foreach($agents_soldes as $ag)
        <div class="solde-card {{ $ag['type'] }}">
            <div class="solde-header">
                <div class="solde-ico" style="background:{{ $ag['color'] }}1a">{{ $ag['ico'] }}</div>
                <div>
                    <div class="solde-name">{{ $ag['nom'] }}</div>
                    <div class="solde-role">{{ $ag['grade'] }}</div>
                </div>
            </div>
            <div class="solde-nums">
                <div>
                    <div class="solde-num-val" style="color:{{ $ag['color'] }}">{{ $ag['reste'] }}</div>
                    <div class="solde-num-lbl">Restants</div>
                </div>
                <div>
                    <div class="solde-num-val">{{ $ag['pris'] }}</div>
                    <div class="solde-num-lbl">Pris</div>
                </div>
                <div>
                    <div class="solde-num-val" style="color:var(--ink-3)">{{ $ag['solde_total'] }}</div>
                    <div class="solde-num-lbl">Total</div>
                </div>
            </div>
            <div style="margin-top:.8rem">
                <div style="display:flex;justify-content:space-between;font-size:.6rem;color:var(--ink-3);margin-bottom:.3rem">
                    <span>Consommation</span>
                    <span style="font-family:var(--fm)">{{ round($ag['pris']/$ag['solde_total']*100) }}%</span>
                </div>
                <div class="prog-bar">
                    <div class="prog-fill" style="width:{{ round($ag['pris']/$ag['solde_total']*100) }}%;background:{{ $ag['color'] }}"></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="card">
        <div class="card-head">
            <div class="card-title">📊 Récapitulatif annuel — 2026</div>
        </div>
        <div class="tbl-wrap">
            <table class="tbl">
                <thead>
                    <tr>
                        <th>Agent</th><th>Grade</th><th>Total</th>
                        <th>Pris</th><th>Restants</th><th>Taux</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agents_soldes as $ag)
                    <tr>
                        <td>
                            <div class="agent-cell">
                                <div class="agent-avatar" style="background:{{ $ag['color'] }}">{{ strtoupper(substr($ag['nom'],0,2)) }}</div>
                                <span style="font-weight:700">{{ $ag['nom'] }}</span>
                            </div>
                        </td>
                        <td style="font-size:.75rem;color:var(--ink-2)">{{ $ag['grade'] }}</td>
                        <td style="font-family:var(--fm);font-weight:700">{{ $ag['solde_total'] }} j</td>
                        <td style="font-family:var(--fm);color:var(--amber);font-weight:700">{{ $ag['pris'] }} j</td>
                        <td>
                            @if($ag['reste']==0)
                                <span class="chip chip-crit">0 jour</span>
                            @elseif($ag['reste']<=5)
                                <span class="chip chip-warn">{{ $ag['reste'] }} j</span>
                            @else
                                <span class="chip chip-ok">{{ $ag['reste'] }} j</span>
                            @endif
                        </td>
                        <td>
                            <div style="display:flex;align-items:center;gap:.6rem">
                                <div style="flex:1;height:4px;background:var(--rule);border-radius:2px;overflow:hidden">
                                    <div style="height:100%;width:{{ round($ag['pris']/$ag['solde_total']*100) }}%;background:{{ $ag['color'] }};border-radius:2px"></div>
                                </div>
                                <span style="font-family:var(--fm);font-size:.68rem;color:var(--ink-3)">{{ round($ag['pris']/$ag['solde_total']*100) }}%</span>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ══ TAB HISTORIQUE ══ -->
<div class="tab-section" id="tab-historique">
    <div class="card">
        <div class="card-head">
            <div class="card-title">📜 Historique complet</div>
            <button onclick="window.print()" class="btn btn-ghost btn-sm no-print">🖨️ Imprimer</button>
        </div>
        @if(isset($historique) && count($historique) > 0)
        <div class="tbl-wrap">
            <table class="tbl">
                <thead>
                    <tr>
                        <th>Agent</th><th>Type</th><th>Début</th><th>Fin</th>
                        <th>Durée</th><th>Statut</th><th>Date demande</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($historique as $h)
                    <tr>
                        <td style="font-weight:700">{{ $h->nom_agent }}</td>
                        <td style="font-size:.77rem">{{ $h->type }}</td>
                        <td style="font-family:var(--fm);font-size:.72rem">{{ \Carbon\Carbon::parse($h->date_debut)->format('d/m/Y') }}</td>
                        <td style="font-family:var(--fm);font-size:.72rem">{{ \Carbon\Carbon::parse($h->date_fin)->format('d/m/Y') }}</td>
                        <td style="font-family:var(--fm);color:var(--teal);font-weight:700">{{ $h->nb_jours }} j</td>
                        <td>
                            <span class="chip {{ $h->statut=='approuve'?'chip-ok':($h->statut=='refuse'?'chip-crit':'chip-warn') }}">
                                {{ $h->statut=='approuve'?'Approuvé':($h->statut=='refuse'?'Refusé':'En attente') }}
                            </span>
                        </td>
                        <td style="font-family:var(--fm);font-size:.7rem;color:var(--ink-3)">{{ \Carbon\Carbon::parse($h->created_at)->format('d/m/Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="empty-state">
            <div class="empty-ico">📜</div>
            <div class="empty-title">Aucun historique</div>
            <div class="empty-sub">Les congés apparaîtront ici</div>
        </div>
        @endif
    </div>
</div>

<div class="toast" id="toast"></div>

<script>
function showTab(name, btn) {
    document.querySelectorAll('.tab-section').forEach(s => s.classList.remove('active'));
    document.querySelectorAll('.tab-item').forEach(b => b.classList.remove('active'));
    document.getElementById('tab-' + name).classList.add('active');
    btn.classList.add('active');
    if (name === 'calendrier') renderCalendrier();
}

function toggleForm() {
    const w   = document.getElementById('form-wrapper');
    const btn = document.getElementById('btn-toggle');
    const open = w.style.display === 'block';
    w.style.display = open ? 'none' : 'block';
    btn.textContent = open ? '+ Saisir une demande' : '− Masquer';
    if (!open) w.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

document.addEventListener('DOMContentLoaded', () => {
    const deb = document.querySelector('[name="date_debut"]');
    const fin = document.querySelector('[name="date_fin"]');
    const nb  = document.getElementById('nb_jours');
    function calcJours() {
        if (deb && fin && deb.value && fin.value) {
            const d = new Date(deb.value), f = new Date(fin.value);
            if (f >= d) nb.value = Math.round((f - d) / 86400000) + 1;
        }
    }
    if (deb) deb.addEventListener('change', calcJours);
    if (fin) fin.addEventListener('change', calcJours);

    @if($errors->any())
    document.getElementById('form-wrapper').style.display = 'block';
    document.getElementById('btn-toggle').textContent = '− Masquer';
    @endif

    renderCalendrier();
});

function renderCalendrier() {
    const months = [
        { year:2026, month:2, name:'Mars'  },
        { year:2026, month:3, name:'Avril' },
        { year:2026, month:4, name:'Mai'   },
    ];
    const congesJours = [5,6,7,8,12,20,21];
    const grid = document.getElementById('calGrid');
    if (!grid) return;

    grid.innerHTML = months.map(({ year, month, name }) => {
        const firstDow    = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const offset      = (firstDow + 6) % 7;
        const today       = new Date();
        let days = '';
        for (let i = 0; i < offset; i++) days += '<div class="cal-day faded"></div>';
        for (let d = 1; d <= daysInMonth; d++) {
            const isToday  = (d === today.getDate() && month === today.getMonth() && year === today.getFullYear());
            const hasConge = congesJours.includes(d) && month === 2;
            days += `<div class="cal-day${isToday?' today':''}${hasConge?' has-conge':''}">${d}</div>`;
        }
        return `<div class="cal-month">
            <div class="cal-month-head">
                <div class="cal-month-name">${name} ${year}</div>
                <div class="cal-month-year">${daysInMonth} jours</div>
            </div>
            <div class="cal-days-head">${['L','M','M','J','V','S','D'].map(d=>`<div class="cal-day-lbl">${d}</div>`).join('')}</div>
            <div class="cal-days">${days}</div>
        </div>`;
    }).join('');

    const tl = document.getElementById('tlAbsences');
    if (!tl) return;
    const absences = [
        { nom:'Dr. Alami Hassan', type:'Congé annuel',  du:'05/03/2026', au:'12/03/2026', jours:8, color:'#006d77' },
        { nom:'Inf. Benali Sara', type:'Congé maladie', du:'20/03/2026', au:'21/03/2026', jours:2, color:'#b45309' },
    ];
    tl.innerHTML = absences.map(a => `
        <div class="tl-item">
            <div class="tl-dot" style="background:${a.color}"></div>
            <div class="tl-content">
                <div class="tl-header">
                    <div>
                        <div class="tl-name">${a.nom}</div>
                        <div class="tl-meta">${a.type} · ${a.jours} jour${a.jours>1?'s':''}</div>
                    </div>
                    <span class="chip chip-warn" style="font-size:.58rem">${a.du} → ${a.au}</span>
                </div>
            </div>
        </div>`).join('');
}

/* ── Attestation via data-attributes (évite les \\' dans onclick) ── */
function attFromBtn(btn) {
    genererAttestation(
        btn.dataset.nom,   btn.dataset.grade,  btn.dataset.service,
        btn.dataset.mat,   btn.dataset.type,   btn.dataset.debut,
        btn.dataset.fin,   btn.dataset.jours,  btn.dataset.valide
    );
}

function genererAttestation(nom, grade, service, mat, type, dateDebut, dateFin, nbJours, validePar) {
    const today = new Date().toLocaleDateString('fr-FR',{weekday:'long',year:'numeric',month:'long',day:'numeric'});
    const num   = Math.floor(Math.random()*9000)+1000;
    const html  = `<!DOCTYPE html>
<html lang="fr"><head><meta charset="UTF-8"/><title>Attestation Congé</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=DM+Sans:wght@400;600;700&family=DM+Mono&display=swap" rel="stylesheet"/>
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:'DM Sans',sans-serif;background:#fff;color:#0a0f1e;padding:2.5cm 2.2cm;font-size:13px;line-height:1.7}
.header{display:flex;justify-content:space-between;align-items:flex-start;padding-bottom:1.4rem;border-bottom:3px solid #006d77;margin-bottom:2.2rem}
.hl .flag{font-size:1.8rem;margin-bottom:.4rem;display:block}
.hl .min{font-size:.72rem;color:#6b7a99;text-transform:uppercase;letter-spacing:.07em}
.hl .pay{font-weight:700;font-size:.88rem}
.hl .sub{font-size:.72rem;color:#6b7a99;margin-top:.2rem}
.hr{text-align:right}
.hr .num{font-family:'DM Serif Display',serif;font-size:2rem;color:#006d77}
.hr .lbl{font-size:.6rem;color:#6b7a99;text-transform:uppercase;letter-spacing:.1em}
.hr .date{font-size:.7rem;color:#2d3650;margin-top:.25rem}
.main-title{text-align:center;margin-bottom:2.2rem}
.main-title h1{font-family:'DM Serif Display',serif;font-size:1.7rem;text-transform:uppercase;border-bottom:2px solid #006d77;display:inline-block;padding-bottom:.5rem}
.main-title .sub{font-size:.78rem;color:#6b7a99;margin-top:.5rem}
.body-text{font-size:.92rem;line-height:2;margin-bottom:2rem;text-align:justify}
.info-box{background:#f0f9f9;border:1px solid rgba(0,109,119,.2);border-radius:10px;padding:1.2rem 1.5rem;margin:1.5rem 0;display:grid;grid-template-columns:1fr 1fr;gap:.7rem}
.info-row{display:flex;flex-direction:column}
.info-label{font-size:.6rem;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:#6b7a99}
.info-value{font-size:.85rem;font-weight:700;color:#0a0f1e;margin-top:.1rem}
.sigs{display:flex;justify-content:space-around;margin-top:3rem;padding-top:1.5rem;border-top:1px solid #e2e8f0}
.sig{text-align:center;width:160px}
.sig-line{border-bottom:1px solid #0a0f1e;margin:0 auto .4rem;height:48px}
.sig-ttl{font-size:.68rem;font-weight:700;text-transform:uppercase;letter-spacing:.06em}
.sig-name{font-size:.68rem;color:#6b7a99;font-style:italic;margin-top:.15rem}
.footer{margin-top:2rem;padding-top:.8rem;border-top:1px solid #e2e8f0;display:flex;justify-content:space-between;font-size:.62rem;color:#a8b4cc}
.footer-r{color:#006d77;font-weight:600}
.actions{text-align:center;margin:1.5rem 0 0;display:flex;gap:.6rem;justify-content:center}
.actions button{padding:.55rem 1.3rem;border-radius:8px;cursor:pointer;font-weight:600;font-size:.8rem}
.btn-p{background:#006d77;color:#fff;border:none}
.btn-c{background:#f5f4f0;color:#2d3650;border:1px solid #e2e8f0}
@media print{body{padding:1.5cm}.actions{display:none}@page{size:A4;margin:1.5cm}}
</style></head><body>
<div class="header">
  <div class="hl">
    <span class="flag">🇲🇦</span>
    <div class="min">Ministère de la Santé et de la Protection Sociale</div>
    <div class="pay">Royaume du Maroc</div>
    <div class="sub">Région Marrakech-Safi · Province de Safi</div>
    <div class="sub">Centre de Santé Jemaat Shaim</div>
  </div>
  <div class="hr">
    <div class="lbl">Attestation N°</div>
    <div class="num">CONG-${String(num).padStart(4,'0')}</div>
    <div class="date">Délivrée le ${today}</div>
  </div>
</div>
<div class="main-title">
  <h1>Attestation de Congé</h1>
  <div class="sub">Document officiel — Centre de Santé Jemaat Shaim · Safi</div>
</div>
<div class="body-text">
  Le Chef de Service atteste que <strong>${nom}</strong>, <strong>${grade}</strong>
  au service <strong>${service}</strong> (Matricule : <strong>${mat||'N/A'}</strong>),
  bénéficie d'un <strong>${type}</strong> de <strong>${nbJours} jour(s)</strong>,
  du <strong>${dateDebut}</strong> au <strong>${dateFin}</strong> inclus.<br/><br/>
  Cette attestation est délivrée pour faire valoir ce que de droit.
</div>
<div class="info-box">
  <div class="info-row"><div class="info-label">Nom complet</div><div class="info-value">${nom}</div></div>
  <div class="info-row"><div class="info-label">Grade</div><div class="info-value">${grade}</div></div>
  <div class="info-row"><div class="info-label">Service</div><div class="info-value">${service}</div></div>
  <div class="info-row"><div class="info-label">Matricule</div><div class="info-value">${mat||'N/A'}</div></div>
  <div class="info-row"><div class="info-label">Type de congé</div><div class="info-value">${type}</div></div>
  <div class="info-row"><div class="info-label">Durée</div><div class="info-value">${nbJours} jour(s)</div></div>
  <div class="info-row"><div class="info-label">Date début</div><div class="info-value">${dateDebut}</div></div>
  <div class="info-row"><div class="info-label">Date fin</div><div class="info-value">${dateFin}</div></div>
</div>
<div class="sigs">
  <div class="sig"><div class="sig-line"></div><div class="sig-ttl">L'Agent</div><div class="sig-name">${nom}</div></div>
  <div class="sig"><div class="sig-line"></div><div class="sig-ttl">Chef de Service</div><div class="sig-name">${validePar}</div></div>
  <div class="sig"><div class="sig-line"></div><div class="sig-ttl">Cachet Officiel</div><div class="sig-name">Province de Safi</div></div>
</div>
<div class="footer">
  <div>Centre de Santé Jemaat Shaim · Safi · ${today}</div>
  <div class="footer-r">CONG-${String(num).padStart(4,'0')} · © ${new Date().getFullYear()}</div>
</div>
<div class="actions">
  <button class="btn-p" onclick="window.print()">🖨️ Imprimer / PDF</button>
  <button class="btn-c" onclick="window.close()">✕ Fermer</button>
</div>
</body></html>`;
    const blob = new Blob([html], { type: 'text/html;charset=utf-8' });
    const url  = URL.createObjectURL(blob);
    window.open(url, '_blank');
    setTimeout(() => URL.revokeObjectURL(url), 15000);
}
</script>

@endsection