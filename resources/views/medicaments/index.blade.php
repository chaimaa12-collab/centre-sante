@extends('layouts.app')

@section('title', 'Médicaments')
@section('breadcrumb', 'Médicaments')
@section('page-title', 'Médicaments & Stock')

@section('styles')
.kpis { display: grid; grid-template-columns: repeat(5, 1fr); gap: .85rem; margin-bottom: 1.8rem; }
.kpi { background: var(--surface); border: 1px solid var(--rule); border-radius: var(--r-lg); padding: 1.1rem 1.3rem; position: relative; overflow: hidden; box-shadow: 0 1px 6px rgba(0,0,0,.06); transition: var(--tr); }
.kpi:hover { transform: translateY(-2px); box-shadow: 0 4px 20px rgba(0,0,0,.08); }
.kpi::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px; }
.kpi.k-teal::before   { background: var(--teal); }
.kpi.k-green::before  { background: var(--emerald); }
.kpi.k-amber::before  { background: var(--amber); }
.kpi.k-red::before    { background: var(--coral); }
.kpi.k-indigo::before { background: var(--indigo); }
.kpi-label { font-size: .62rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: var(--ink-3); margin-bottom: .6rem; }
.kpi-value { font-family: var(--fd); font-size: 2rem; font-weight: 800; line-height: 1; letter-spacing: -.04em; }
.kpi.k-teal   .kpi-value { color: var(--teal); }
.kpi.k-green  .kpi-value { color: var(--emerald); }
.kpi.k-amber  .kpi-value { color: var(--amber); }
.kpi.k-red    .kpi-value { color: var(--coral); }
.kpi.k-indigo .kpi-value { color: var(--indigo); }
.kpi-sub { font-size: .65rem; color: var(--ink-3); margin-top: .4rem; font-family: var(--fm); }

.flash { padding: .8rem 1.1rem; border-radius: var(--r); font-size: .82rem; margin-bottom: 1.2rem; display: flex; align-items: center; gap: .6rem; }
.flash-ok  { background: var(--emerald-lt); border: 1px solid rgba(22,101,52,.2);  color: var(--emerald); }
.flash-err { background: var(--coral-lt);   border: 1px solid rgba(192,57,43,.2);  color: var(--coral); }

/* TABS */
.tab-nav { display: flex; align-items: center; border-bottom: 2px solid var(--rule); margin-bottom: 1.5rem; }
.tab-item { font-size: .78rem; font-weight: 600; color: var(--ink-3); padding: .75rem 1.3rem; cursor: pointer; border-bottom: 2px solid transparent; transition: var(--tr); display: flex; align-items: center; gap: .45rem; position: relative; bottom: -2px; background: none; border-top: none; border-left: none; border-right: none; font-family: var(--fw); }
.tab-item:hover { color: var(--ink-2); }
.tab-item.active { color: var(--teal); border-bottom-color: var(--teal); }
.tab-count { background: var(--surface-2); color: var(--ink-3); font-size: .58rem; font-weight: 700; padding: .1rem .4rem; border-radius: 4px; font-family: var(--fm); }
.tab-item.active .tab-count { background: var(--teal-lt); color: var(--teal); }
.tab-section { display: none; }
.tab-section.active { display: block; }

/* TOOLBAR */
.toolbar { display: flex; align-items: center; justify-content: space-between; gap: 1rem; margin-bottom: 1.2rem; flex-wrap: wrap; }
.toolbar-left { display: flex; align-items: center; gap: .6rem; }
.filter-select { background: var(--surface); border: 1px solid var(--rule-2); border-radius: var(--r); padding: .5rem .85rem; font-size: .75rem; font-family: var(--fw); color: var(--ink-2); cursor: pointer; outline: none; }

/* MED GRID */
.med-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; }
.med-card { background: var(--surface); border: 1px solid var(--rule); border-radius: var(--r-lg); padding: 1.2rem; transition: var(--tr); position: relative; overflow: hidden; box-shadow: 0 1px 6px rgba(0,0,0,.06); }
.med-card:hover { border-color: rgba(0,109,119,.25); box-shadow: 0 12px 40px rgba(0,0,0,.1); transform: translateY(-2px); }
.med-card::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 2px; background: linear-gradient(90deg, var(--teal), transparent); transform: scaleX(0); transform-origin: left; transition: transform .3s ease; }
.med-card:hover::after { transform: scaleX(1); }
.mc-header { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: .8rem; gap: .5rem; }
.mc-icon { width: 40px; height: 40px; background: var(--surface-2); border-radius: 9px; border: 1px solid var(--rule); display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0; }
.mc-name { font-family: var(--fd); font-size: .9rem; font-weight: 700; color: var(--ink); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.mc-cat  { font-size: .62rem; color: var(--teal); font-weight: 700; text-transform: uppercase; letter-spacing: .08em; margin-top: .12rem; }
.mc-row  { display: flex; align-items: center; justify-content: space-between; padding: .28rem 0; border-bottom: 1px solid var(--rule); }
.mc-row:last-child { border-bottom: none; }
.mc-row-label { font-size: .65rem; color: var(--ink-3); }
.mc-row-value { font-size: .72rem; color: var(--ink-2); font-weight: 600; font-family: var(--fm); }
.mc-price { font-family: var(--fd); font-size: 1.1rem; color: var(--teal); letter-spacing: -.02em; }
.mc-bar-wrap { margin-top: .6rem; }
.mc-bar-labels { display: flex; justify-content: space-between; font-size: .6rem; color: var(--ink-3); margin-bottom: .3rem; }
.mc-bar { height: 4px; background: var(--rule); border-radius: 2px; overflow: hidden; }
.mc-bar-fill { height: 100%; border-radius: 2px; }
.mc-footer { display: flex; align-items: center; justify-content: space-between; padding-top: .7rem; border-top: 1px solid var(--rule); margin-top: .6rem; }

/* TABLE */
.tbl-wrap { overflow-x: auto; border-radius: var(--r-lg); border: 1px solid var(--rule); }

/* FORM MODAL */
.overlay { position: fixed; inset: 0; background: rgba(10,15,30,.45); backdrop-filter: blur(6px); z-index: 1000; display: none; align-items: center; justify-content: center; padding: 1rem; }
.overlay.open { display: flex; }
.modal { background: var(--surface); border: 1px solid var(--rule-2); border-radius: 20px; padding: 2rem; width: 100%; max-width: 640px; box-shadow: 0 30px 80px rgba(0,0,0,.2); position: relative; max-height: 90vh; overflow-y: auto; }
.modal-stripe { position: absolute; top: 0; left: 0; right: 0; height: 3px; border-radius: 20px 20px 0 0; }
.modal-stripe.teal  { background: linear-gradient(90deg, var(--teal), #00b4c8); }
.modal-stripe.green { background: linear-gradient(90deg, var(--emerald), #22c55e); }
.modal-close { position: absolute; top: 1.3rem; right: 1.3rem; width: 30px; height: 30px; background: var(--surface-2); border: 1px solid var(--rule); border-radius: 7px; cursor: pointer; font-size: .85rem; display: flex; align-items: center; justify-content: center; color: var(--ink-3); transition: var(--tr); }
.modal-close:hover { border-color: var(--coral); color: var(--coral); background: var(--coral-lt); }
.modal-title { font-family: var(--fd); font-size: 1.05rem; color: var(--ink); margin-bottom: 1.5rem; margin-top: .3rem; display: flex; align-items: center; gap: .6rem; }
.form-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: .9rem; margin-bottom: .9rem; }
.form-grid-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: .9rem; margin-bottom: .9rem; }
.form-field  { display: flex; flex-direction: column; gap: .3rem; margin-bottom: .9rem; }
.form-label  { font-size: .65rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: var(--ink-3); }
.form-input, .form-select { background: var(--surface-2); border: 1px solid var(--rule-2); border-radius: var(--r); padding: .6rem .9rem; font-size: .82rem; font-family: var(--fw); color: var(--ink); outline: none; transition: var(--tr); width: 100%; }
.form-input:focus, .form-select:focus { border-color: var(--teal); background: var(--surface); box-shadow: 0 0 0 3px var(--teal-lt); }
.form-actions { display: flex; align-items: center; justify-content: flex-end; gap: .6rem; padding-top: 1.2rem; border-top: 1px solid var(--rule); margin-top: .5rem; }
.form-section { font-size: .6rem; font-weight: 700; text-transform: uppercase; letter-spacing: .12em; color: var(--teal); margin-bottom: .8rem; padding-bottom: .5rem; border-bottom: 1px solid var(--rule); display: flex; align-items: center; gap: .4rem; }

/* ENTREE CARD */
.entree-highlight {
    background: linear-gradient(135deg, rgba(22,101,52,.06), rgba(22,101,52,.02));
    border: 1px solid rgba(22,101,52,.2);
    border-radius: var(--r-lg);
    padding: 1.2rem 1.5rem;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    flex-wrap: wrap;
}
.entree-highlight-text h3 { font-family: var(--fd); font-size: 1rem; color: var(--emerald); margin-bottom: .25rem; }
.entree-highlight-text p  { font-size: .75rem; color: var(--ink-3); }

.empty-state { text-align: center; padding: 4rem 2rem; color: var(--ink-3); grid-column: 1/-1; }
.empty-ico   { font-size: 3rem; opacity: .25; margin-bottom: .7rem; }
.empty-title { font-family: var(--fd); font-size: 1rem; color: var(--ink-2); margin-bottom: .3rem; }

@media (max-width: 1100px) { .kpis { grid-template-columns: repeat(3,1fr); } .med-grid { grid-template-columns: repeat(2,1fr); } }
@media (max-width: 700px)  { .kpis { grid-template-columns: 1fr 1fr; } .med-grid { grid-template-columns: 1fr; } }
@endsection

@section('topbar-actions')
    <button onclick="imprimerInventaire()" class="btn btn-ghost btn-sm no-print">📄 Imprimer</button>
    <button onclick="openModal('modalEntree')" class="btn btn-ghost btn-sm no-print"
            style="background:var(--emerald-lt);color:var(--emerald);border-color:rgba(22,101,52,.2)">
        ↓ Entrée de stock
    </button>
    <button onclick="openModal('modalMed')" class="btn btn-teal btn-sm no-print">＋ Ajouter médicament</button>
@endsection

@section('content')

@if(session('success'))
<div class="flash flash-ok">✓ &nbsp;{{ session('success') }}</div>
@endif
@if(session('error'))
<div class="flash flash-err">✕ &nbsp;{{ session('error') }}</div>
@endif
@if($errors->any())
<div class="flash flash-err">✕ &nbsp;{{ $errors->first() }}</div>
@endif

<!-- KPIs -->
<div class="kpis">
    <div class="kpi k-teal">
        <div class="kpi-label">Total médicaments</div>
        <div class="kpi-value">{{ $stats['total'] }}</div>
        <div class="kpi-sub">Références enregistrées</div>
    </div>
    <div class="kpi k-green">
        <div class="kpi-label">En stock</div>
        <div class="kpi-value">{{ $stats['en_stock'] }}</div>
        <div class="kpi-sub">Disponibles</div>
    </div>
    <div class="kpi k-amber">
        <div class="kpi-label">Stock faible</div>
        <div class="kpi-value">{{ $stats['faible'] }}</div>
        <div class="kpi-sub">Sous le seuil</div>
    </div>
    <div class="kpi k-red">
        <div class="kpi-label">Rupture</div>
        <div class="kpi-value">{{ $stats['rupture'] }}</div>
        <div class="kpi-sub">Stock épuisé</div>
    </div>
    <div class="kpi k-indigo">
        <div class="kpi-label">Valeur totale</div>
        <div class="kpi-value">{{ number_format($stats['valeur'], 0, ',', ' ') }}</div>
        <div class="kpi-sub">MAD en stock</div>
    </div>
</div>

<!-- TABS -->
<div class="tab-nav no-print">
    <button class="tab-item active" onclick="showTab('inventaire', this)">
        Inventaire <span class="tab-count">{{ $stats['total'] }}</span>
    </button>
    <button class="tab-item" onclick="showTab('mouvements', this)">
        Entrées de stock <span class="tab-count">{{ $mouvements->count() }}</span>
    </button>
    <button class="tab-item" onclick="showTab('alertes', this)">
        Alertes <span class="tab-count" style="{{ $stats['faible'] + $stats['rupture'] > 0 ? 'background:var(--coral-lt);color:var(--coral)' : '' }}">{{ $stats['faible'] + $stats['rupture'] }}</span>
    </button>
</div>

<!-- ══ TAB INVENTAIRE ══ -->
<div class="tab-section active" id="tab-inventaire">
    <div class="toolbar">
        <div class="toolbar-left">
            <select class="filter-select" id="fCat" onchange="filtrer()">
                <option value="">Toutes les catégories</option>
                <option value="antibiotique">Antibiotiques</option>
                <option value="antidiabetique">Antidiabétiques</option>
                <option value="antihypertenseur">Antihypertenseurs</option>
                <option value="analgesique">Analgésiques</option>
                <option value="vitamines">Vitamines & Sels</option>
                <option value="vaccin">Vaccins</option>
                <option value="autre">Autre</option>
            </select>
            <select class="filter-select" id="fStock" onchange="filtrer()">
                <option value="">Tous les statuts</option>
                <option value="ok">En stock</option>
                <option value="faible">Stock faible</option>
                <option value="rupture">Rupture</option>
            </select>
        </div>
        <span class="chip chip-info">{{ $stats['total'] }} médicament(s)</span>
    </div>

    <div class="med-grid" id="medGrid">
        @forelse($medicaments as $med)
        @php
            $cat_ico  = ['antibiotique'=>'⬡','antidiabetique'=>'◈','antihypertenseur'=>'♡','analgesique'=>'⊹','vitamines'=>'✦','vaccin'=>'⊕','autre'=>'◯'];
            $cat_lbl  = ['antibiotique'=>'Antibiotique','antidiabetique'=>'Antidiabétique','antihypertenseur'=>'Antihypertenseur','analgesique'=>'Analgésique','vitamines'=>'Vitamines & Sels','vaccin'=>'Vaccin','autre'=>'Autre'];
            $forme_lbl= ['comprime'=>'Comprimé','gelule'=>'Gélule','sirop'=>'Sirop','injectable'=>'Injectable','pommade'=>'Pommade','gouttes'=>'Gouttes','sachet'=>'Sachet','autre'=>'Autre'];
            $ico  = $cat_ico[$med->categorie]  ?? '⬡';
            $lbl  = $cat_lbl[$med->categorie]  ?? $med->categorie;
            $forme= $forme_lbl[$med->forme]    ?? $med->forme;

            if ($med->quantite == 0) {
                $stock_chip = '<span class="chip chip-crit">Rupture</span>';
                $bar_color  = 'var(--coral)';
                $stock_stat = 'rupture';
            } elseif ($med->quantite <= $med->seuil_alerte) {
                $stock_chip = '<span class="chip chip-warn">Faible · '.$med->quantite.' boîtes</span>';
                $bar_color  = 'var(--amber)';
                $stock_stat = 'faible';
            } else {
                $stock_chip = '<span class="chip chip-ok">En stock · '.$med->quantite.' boîtes</span>';
                $bar_color  = 'var(--emerald)';
                $stock_stat = 'ok';
            }
            $pct = $med->seuil_alerte > 0 ? min(100, round($med->quantite / ($med->seuil_alerte * 3) * 100)) : 100;
        @endphp
        <div class="med-card" data-cat="{{ $med->categorie }}" data-stock="{{ $stock_stat }}">
            <div class="mc-header">
                <div class="mc-icon">{{ $ico }}</div>
                <div style="flex:1;min-width:0">
                    <div class="mc-name" title="{{ $med->nom }}">{{ $med->nom }}</div>
                    <div class="mc-cat">{{ $lbl }}</div>
                </div>
                {!! $stock_chip !!}
            </div>
            <div>
                <div class="mc-row"><span class="mc-row-label">DCI</span><span class="mc-row-value">{{ $med->dci ?: '—' }}</span></div>
                <div class="mc-row"><span class="mc-row-label">Forme</span><span class="mc-row-value">{{ $forme }}</span></div>
                <div class="mc-row"><span class="mc-row-label">Unités / boîte</span><span class="mc-row-value">{{ $med->unites_boite }} u.</span></div>
                <div class="mc-row"><span class="mc-row-label">Fournisseur</span><span class="mc-row-value">{{ $med->fournisseur ?: '—' }}</span></div>
                @if($med->date_peremption)
                <div class="mc-row">
                    <span class="mc-row-label">Péremption</span>
                    <span class="mc-row-value">{{ \Carbon\Carbon::parse($med->date_peremption)->format('d/m/Y') }}</span>
                </div>
                @endif
                <div class="mc-row" style="border-bottom:none;padding-top:.5rem">
                    <span class="mc-row-label">Prix / boîte</span>
                    <span class="mc-price">{{ number_format($med->prix, 2, ',', ' ') }} MAD</span>
                </div>
            </div>
            <div class="mc-bar-wrap">
                <div class="mc-bar-labels">
                    <span>Stock actuel</span>
                    <span>{{ $med->quantite }} / seuil {{ $med->seuil_alerte }}</span>
                </div>
                <div class="mc-bar">
                    <div class="mc-bar-fill" style="width:{{ $pct }}%;background:{{ $bar_color }}"></div>
                </div>
            </div>
            <div class="mc-footer">
                <span style="font-size:.65rem;color:var(--ink-3);font-family:var(--fm)">
                    {{ number_format($med->prix * $med->quantite, 2, ',', ' ') }} MAD
                </span>
                <div class="no-print" style="display:flex;gap:.3rem">
                    <button
                        onclick="ouvrirEntree({{ $med->id }}, '{{ addslashes($med->nom) }}', {{ $med->prix }})"
                        class="btn btn-ghost btn-xs"
                        style="background:var(--emerald-lt);color:var(--emerald);border-color:rgba(22,101,52,.2)"
                        title="Entrée de stock">↓ Entrée</button>
                    <form method="POST" action="/medicaments/{{ $med->id }}"
                          onsubmit="return confirm('Supprimer ce médicament ?')" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-ghost btn-xs"
                                style="color:var(--coral);border-color:rgba(192,57,43,.2);background:var(--coral-lt)">✕</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="empty-state">
            <div class="empty-ico">⬡</div>
            <div class="empty-title">Aucun médicament enregistré</div>
            <div style="font-size:.75rem">Cliquez sur "+ Ajouter un médicament" pour commencer</div>
        </div>
        @endforelse
    </div>
</div>

<!-- ══ TAB MOUVEMENTS ══ -->
<div class="tab-section" id="tab-mouvements">
    <div class="entree-highlight">
        <div class="entree-highlight-text">
            <h3>↓ Enregistrer une entrée de stock</h3>
            <p>Ajoutez des boîtes reçues d'un fournisseur — le stock sera mis à jour automatiquement.</p>
        </div>
        <button onclick="openModal('modalEntree')" class="btn btn-ghost btn-sm"
                style="background:var(--emerald-lt);color:var(--emerald);border-color:rgba(22,101,52,.25)">
            ＋ Nouvelle entrée
        </button>
    </div>

    <div class="card">
        <div class="card-head">
            <div class="card-title">📦 Historique des entrées de stock</div>
            <div style="display:flex;gap:.6rem;align-items:center">
                <span class="chip chip-ok">{{ $mouvements->count() }} entrée(s)</span>
                <button onclick="imprimerMouvements()" class="btn btn-ghost btn-sm no-print">🖨️ Imprimer</button>
            </div>
        </div>

        @if($mouvements->count() > 0)
        <div class="tbl-wrap">
            <table class="tbl">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Médicament</th>
                        <th>Quantité</th>
                        <th>Prix / boîte</th>
                        <th>Total</th>
                        <th>Fournisseur</th>
                        <th>N° Bon</th>
                        <th>Péremption</th>
                        <th>Responsable</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mouvements as $mv)
                    <tr>
                        <td style="font-family:var(--fm);font-size:.72rem">
                            {{ \Carbon\Carbon::parse($mv->date_mouvement)->format('d/m/Y') }}
                        </td>
                        <td>
                            <div style="font-weight:700;color:var(--ink);font-size:.78rem">
                                {{ $mv->medicament->nom ?? '—' }}
                            </div>
                            <div style="font-size:.62rem;color:var(--ink-3)">
                                {{ $mv->medicament->categorie ?? '' }}
                            </div>
                        </td>
                        <td>
                            <span class="chip chip-ok" style="font-size:.6rem">
                                +{{ $mv->quantite }} boîtes
                            </span>
                        </td>
                        <td style="font-family:var(--fm);font-size:.75rem;color:var(--ink-2)">
                            {{ number_format($mv->prix_unitaire, 2, ',', ' ') }} MAD
                        </td>
                        <td style="font-family:var(--fm);font-size:.75rem;font-weight:700;color:var(--teal)">
                            {{ number_format($mv->quantite * $mv->prix_unitaire, 2, ',', ' ') }} MAD
                        </td>
                        <td style="font-size:.75rem;color:var(--ink-2)">
                            {{ $mv->fournisseur ?: '—' }}
                        </td>
                        <td style="font-family:var(--fm);font-size:.72rem;color:var(--ink-3)">
                            {{ $mv->num_bon ?: '—' }}
                        </td>
                        <td style="font-family:var(--fm);font-size:.72rem;color:var(--ink-3)">
                            {{ $mv->date_peremption ? \Carbon\Carbon::parse($mv->date_peremption)->format('d/m/Y') : '—' }}
                        </td>
                        <td style="font-size:.72rem;color:var(--ink-3)">
                            {{ $mv->responsable ?: '—' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="empty-state" style="grid-column:auto">
            <div class="empty-ico">📦</div>
            <div class="empty-title">Aucune entrée enregistrée</div>
            <div style="font-size:.75rem">Cliquez sur "+ Nouvelle entrée" pour enregistrer une livraison</div>
        </div>
        @endif
    </div>
</div>

<!-- ══ TAB ALERTES ══ -->
<div class="tab-section" id="tab-alertes">
    <div class="card">
        <div class="card-head">
            <div class="card-title">⚠ Médicaments nécessitant une action</div>
            <span class="chip chip-warn">{{ $stats['faible'] + $stats['rupture'] }} alerte(s)</span>
        </div>
        <div class="tbl-wrap">
            <table class="tbl">
                <thead>
                    <tr>
                        <th>Médicament</th><th>Catégorie</th><th>Stock actuel</th>
                        <th>Seuil alerte</th><th>Statut</th><th class="no-print">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medicaments->filter(fn($m) => $m->quantite <= $m->seuil_alerte) as $med)
                    <tr>
                        <td style="font-weight:700;color:var(--ink)">{{ $med->nom }}</td>
                        <td style="font-size:.75rem;color:var(--ink-2)">{{ $med->categorie }}</td>
                        <td style="font-family:var(--fm);font-weight:700;color:{{ $med->quantite==0?'var(--coral)':'var(--amber)' }}">
                            {{ $med->quantite }} boîtes
                        </td>
                        <td style="font-family:var(--fm);font-size:.72rem;color:var(--ink-3)">
                            {{ $med->seuil_alerte }} boîtes
                        </td>
                        <td>
                            @if($med->quantite == 0)
                                <span class="chip chip-crit">Rupture</span>
                            @else
                                <span class="chip chip-warn">Stock faible</span>
                            @endif
                        </td>
                        <td class="no-print">
                            <button
                                onclick="ouvrirEntree({{ $med->id }}, '{{ addslashes($med->nom) }}', {{ $med->prix }})"
                                class="btn btn-ghost btn-xs"
                                style="background:var(--emerald-lt);color:var(--emerald);border-color:rgba(22,101,52,.2)">
                                ↓ Réapprovisionner
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    @if($medicaments->filter(fn($m) => $m->quantite <= $m->seuil_alerte)->isEmpty())
                    <tr>
                        <td colspan="6" style="text-align:center;padding:2rem;color:var(--ink-3)">
                            ✓ Tous les stocks sont au-dessus du seuil d'alerte
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ══════════════════════
     MODAL : AJOUT MÉDICAMENT
══════════════════════ -->
<div class="overlay" id="modalMed">
    <div class="modal">
        <div class="modal-stripe teal"></div>
        <button class="modal-close" onclick="closeModal('modalMed')">✕</button>
        <div class="modal-title">⬡ Ajouter un médicament</div>
        <form method="POST" action="/medicaments">
            @csrf
            <div class="form-section">👊 Identification</div>
            <div class="form-grid-2">
                <div class="form-field">
                    <label class="form-label">Dénomination commerciale *</label>
                    <input type="text" name="nom" class="form-input" placeholder="Ex : Amoxicilline 500mg" required/>
                </div>
                <div class="form-field">
                    <label class="form-label">DCI (principe actif)</label>
                    <input type="text" name="dci" class="form-input" placeholder="Ex : Amoxicilline"/>
                </div>
            </div>
            <div class="form-grid-2">
                <div class="form-field">
                    <label class="form-label">Catégorie *</label>
                    <select name="categorie" class="form-select" required>
                        <option value="">— Sélectionner —</option>
                        <option value="antibiotique">Antibiotique</option>
                        <option value="antidiabetique">Antidiabétique</option>
                        <option value="antihypertenseur">Antihypertenseur</option>
                        <option value="analgesique">Analgésique</option>
                        <option value="vitamines">Vitamines & Sels</option>
                        <option value="vaccin">Vaccin</option>
                        <option value="autre">Autre</option>
                    </select>
                </div>
                <div class="form-field">
                    <label class="form-label">Forme galénique</label>
                    <select name="forme" class="form-select">
                        <option value="comprime">Comprimé</option>
                        <option value="gelule">Gélule</option>
                        <option value="sirop">Sirop</option>
                        <option value="injectable">Injectable</option>
                        <option value="pommade">Pommade / Crème</option>
                        <option value="gouttes">Gouttes</option>
                        <option value="sachet">Sachet</option>
                        <option value="autre">Autre</option>
                    </select>
                </div>
            </div>
            <div class="form-section">📦 Stock & Prix</div>
            <div class="form-grid-3">
                <div class="form-field">
                    <label class="form-label">Prix / boîte (MAD) *</label>
                    <input type="number" name="prix" class="form-input" placeholder="0.00" min="0" step="0.01" required/>
                </div>
                <div class="form-field">
                    <label class="form-label">Quantité initiale</label>
                    <input type="number" name="quantite" class="form-input" placeholder="0" min="0"/>
                </div>
                <div class="form-field">
                    <label class="form-label">Seuil d'alerte</label>
                    <input type="number" name="seuil_alerte" class="form-input" placeholder="5" min="0"/>
                </div>
            </div>
            <div class="form-grid-3">
                <div class="form-field">
                    <label class="form-label">Unités / boîte</label>
                    <input type="number" name="unites_boite" class="form-input" placeholder="20" min="1"/>
                </div>
                <div class="form-field">
                    <label class="form-label">Fournisseur</label>
                    <input type="text" name="fournisseur" class="form-input" placeholder="PROMOPHARM"/>
                </div>
                <div class="form-field">
                    <label class="form-label">Code / Référence</label>
                    <input type="text" name="code" class="form-input" placeholder="MED-001"/>
                </div>
            </div>
            <div class="form-field">
                <label class="form-label">Date de péremption</label>
                <input type="date" name="date_peremption" class="form-input"/>
            </div>
            <div class="form-actions">
                <button type="button" onclick="closeModal('modalMed')" class="btn btn-ghost">Annuler</button>
                <button type="submit" class="btn btn-teal">↓ Enregistrer</button>
            </div>
        </form>
    </div>
</div>

<!-- ══════════════════════
     MODAL : ENTRÉE DE STOCK
══════════════════════ -->
<div class="overlay" id="modalEntree">
    <div class="modal">
        <div class="modal-stripe green"></div>
        <button class="modal-close" onclick="closeModal('modalEntree')">✕</button>
        <div class="modal-title">↓ Entrée de stock — Livraison fournisseur</div>

        <form method="POST" action="/medicaments/entree">
            @csrf

            <!-- Médicament sélectionné (affichage) -->
            <div id="med-selectionne" style="display:none;background:var(--emerald-lt);border:1px solid rgba(22,101,52,.2);border-radius:var(--r);padding:.8rem 1rem;margin-bottom:1rem;display:flex;align-items:center;gap:.8rem">
                <span style="font-size:1.3rem">⬡</span>
                <div>
                    <div style="font-weight:700;color:var(--emerald);font-size:.85rem" id="med-sel-nom">—</div>
                    <div style="font-size:.65rem;color:var(--ink-3)">Médicament sélectionné</div>
                </div>
            </div>

            <input type="hidden" name="medicament_id" id="entree_med_id"/>

            <div class="form-section">💊 Médicament</div>
            <div class="form-field">
                <label class="form-label">Médicament *</label>
                <select name="medicament_id" id="entree_select" class="form-select" required
                        onchange="majPrixEntree(this)">
                    <option value="">— Sélectionner un médicament —</option>
                    @foreach($medicaments as $med)
                    <option value="{{ $med->id }}" data-prix="{{ $med->prix }}" data-nom="{{ $med->nom }}">
                        {{ $med->nom }} — Stock actuel : {{ $med->quantite }} boîtes
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-section">📦 Détails de la livraison</div>
            <div class="form-grid-2">
                <div class="form-field">
                    <label class="form-label">Quantité reçue (boîtes) *</label>
                    <input type="number" name="quantite" id="entree_qte" class="form-input"
                           placeholder="Ex : 10" min="1" required
                           oninput="calcTotal()"/>
                </div>
                <div class="form-field">
                    <label class="form-label">Prix unitaire / boîte (MAD)</label>
                    <input type="number" name="prix_unitaire" id="entree_prix" class="form-input"
                           placeholder="0.00" min="0" step="0.01"
                           oninput="calcTotal()"/>
                </div>
            </div>

            <!-- Total calculé -->
            <div id="total-entree" style="display:none;background:var(--teal-lt);border:1px solid rgba(0,109,119,.2);border-radius:var(--r);padding:.7rem 1rem;margin-bottom:.9rem;text-align:right">
                <span style="font-size:.65rem;color:var(--ink-3);text-transform:uppercase;letter-spacing:.1em">Total livraison</span>
                <div style="font-family:var(--fd);font-size:1.4rem;color:var(--teal);font-weight:800" id="total-val">0,00 MAD</div>
            </div>

            <div class="form-grid-2">
                <div class="form-field">
                    <label class="form-label">Fournisseur</label>
                    <input type="text" name="fournisseur" class="form-input" placeholder="Ex : PROMOPHARM"/>
                </div>
                <div class="form-field">
                    <label class="form-label">N° Bon de livraison</label>
                    <input type="text" name="num_bon" class="form-input" placeholder="BL-2026-001"/>
                </div>
            </div>
            <div class="form-grid-2">
                <div class="form-field">
                    <label class="form-label">Date de réception *</label>
                    <input type="date" name="date_mouvement" class="form-input"
                           value="{{ date('Y-m-d') }}" required/>
                </div>
                <div class="form-field">
                    <label class="form-label">Date de péremption</label>
                    <input type="date" name="date_peremption" class="form-input"/>
                </div>
            </div>
            <div class="form-grid-2">
                <div class="form-field">
                    <label class="form-label">Responsable réception</label>
                    <input type="text" name="responsable" class="form-input"
                           value="{{ auth()->user()->name ?? '' }}" placeholder="Nom du responsable"/>
                </div>
                <div class="form-field">
                    <label class="form-label">Observations</label>
                    <input type="text" name="motif" class="form-input" placeholder="Remarques éventuelles"/>
                </div>
            </div>

            <div class="form-actions">
                <button type="button" onclick="closeModal('modalEntree')" class="btn btn-ghost">Annuler</button>
                <button type="submit" class="btn btn-ghost btn-sm"
                        style="background:var(--emerald-lt);color:var(--emerald);border-color:rgba(22,101,52,.25)">
                    ↓ Enregistrer l'entrée
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// ── TABS ──
function showTab(name, btn) {
    document.querySelectorAll('.tab-section').forEach(s => s.classList.remove('active'));
    document.querySelectorAll('.tab-item').forEach(b => b.classList.remove('active'));
    document.getElementById('tab-' + name).classList.add('active');
    btn.classList.add('active');
}

// ── MODALS ──
function openModal(id) { document.getElementById(id).classList.add('open'); }
function closeModal(id){ document.getElementById(id).classList.remove('open'); }
['modalMed','modalEntree'].forEach(id => {
    const el = document.getElementById(id);
    if (el) el.addEventListener('click', function(e){ if(e.target===this) closeModal(id); });
});

// ── FILTRES ──
function filtrer() {
    const cat   = document.getElementById('fCat').value;
    const stock = document.getElementById('fStock').value;
    document.querySelectorAll('.med-card').forEach(card => {
        const matchCat   = !cat   || card.dataset.cat   === cat;
        const matchStock = !stock || card.dataset.stock === stock;
        card.style.display = (matchCat && matchStock) ? '' : 'none';
    });
}

// ── OUVRIR ENTRÉE DEPUIS UNE CARTE ──
function ouvrirEntree(id, nom, prix) {
    openModal('modalEntree');
    const sel = document.getElementById('entree_select');
    if (sel) {
        sel.value = id;
        document.getElementById('entree_prix').value = prix;
        document.getElementById('med-sel-nom').textContent = nom;
        document.getElementById('med-selectionne').style.display = 'flex';
    }
}

// ── MISE À JOUR PRIX DEPUIS SELECT ──
function majPrixEntree(sel) {
    const opt  = sel.options[sel.selectedIndex];
    const prix = opt.dataset.prix || 0;
    const nom  = opt.dataset.nom  || '';
    document.getElementById('entree_prix').value = prix;
    document.getElementById('med-sel-nom').textContent = nom;
    document.getElementById('med-selectionne').style.display = nom ? 'flex' : 'none';
    calcTotal();
}

// ── CALCUL TOTAL ──
function calcTotal() {
    const qte  = parseFloat(document.getElementById('entree_qte').value)  || 0;
    const prix = parseFloat(document.getElementById('entree_prix').value) || 0;
    const total = qte * prix;
    const el = document.getElementById('total-entree');
    const valEl = document.getElementById('total-val');
    if (qte > 0 && prix > 0) {
        el.style.display = 'block';
        valEl.textContent = total.toLocaleString('fr-MA', {minimumFractionDigits:2, maximumFractionDigits:2}) + ' MAD';
    } else {
        el.style.display = 'none';
    }
}

// Auto-ouvrir modal si erreur
@if($errors->any())
openModal('modalMed');
@endif

// ── IMPRIMER INVENTAIRE ──
function imprimerInventaire() {
    const today = new Date().toLocaleDateString('fr-FR', {weekday:'long', year:'numeric', month:'long', day:'numeric'});
    const cards = document.querySelectorAll('.med-card');
    let rows = '';
    cards.forEach(card => {
        const nom    = card.querySelector('.mc-name')?.textContent?.trim() || '—';
        const cat    = card.querySelector('.mc-cat')?.textContent?.trim()  || '—';
        const rows2  = card.querySelectorAll('.mc-row');
        let dci = '—', forme = '—', unite = '—', fourn = '—', qte = '—', seuil = '—', prix = '—';
        rows2.forEach(r => {
            const lbl = r.querySelector('.mc-row-label')?.textContent?.trim();
            const val = r.querySelector('.mc-row-value, .mc-price')?.textContent?.trim();
            if (!lbl || !val) return;
            if (lbl.includes('DCI'))       dci   = val;
            if (lbl.includes('Forme'))     forme = val;
            if (lbl.includes('Unités'))    unite = val;
            if (lbl.includes('Fourni'))    fourn = val;
            if (lbl.includes('Prix'))      prix  = val;
        });
        const barLabels = card.querySelector('.mc-bar-labels');
        if (barLabels) {
            const spans = barLabels.querySelectorAll('span');
            if (spans[1]) {
                const txt = spans[1].textContent;
                const parts = txt.split('/');
                qte   = parts[0]?.trim() || '—';
                seuil = parts[1]?.replace('seuil','')?.trim() || '—';
            }
        }
        const chip = card.querySelector('.chip');
        const statut = chip?.textContent?.trim() || '—';
        const chipClass = chip?.classList.contains('chip-ok') ? '#166534' : chip?.classList.contains('chip-warn') ? '#b45309' : '#c0392b';
        rows += `<tr>
            <td style="font-weight:700">${nom}</td>
            <td>${cat}</td>
            <td>${dci}</td>
            <td>${forme}</td>
            <td style="text-align:center">${unite}</td>
            <td style="text-align:center;font-weight:700;color:${chipClass}">${qte}</td>
            <td style="text-align:center">${seuil}</td>
            <td>${fourn}</td>
            <td style="font-weight:700;color:#006d77">${prix}</td>
            <td><span style="padding:.2rem .6rem;border-radius:5px;font-size:.7rem;font-weight:700;background:${chipClass}18;color:${chipClass}">${statut}</span></td>
        </tr>`;
    });

    const html = `<!DOCTYPE html>
<html lang="fr"><head><meta charset="UTF-8"/><title>Inventaire Médicaments</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=DM+Sans:wght@400;600;700&family=DM+Mono&display=swap" rel="stylesheet"/>
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:'DM Sans',sans-serif;background:#fff;color:#0a0f1e;padding:1.5cm 1.8cm;font-size:12px}
.header{display:flex;justify-content:space-between;align-items:flex-start;padding-bottom:1rem;border-bottom:3px solid #006d77;margin-bottom:1.5rem}
.hl .flag{font-size:1.5rem;margin-bottom:.3rem;display:block}
.hl .min{font-size:.7rem;color:#6b7a99;text-transform:uppercase;letter-spacing:.07em}
.hl .pay{font-weight:700;font-size:.85rem}
.hl .sub{font-size:.7rem;color:#6b7a99;margin-top:.15rem}
.hr{text-align:right}
.hr .titre{font-family:'DM Serif Display',serif;font-size:1.4rem;color:#006d77}
.hr .date{font-size:.7rem;color:#6b7a99;margin-top:.3rem}
table{width:100%;border-collapse:collapse;font-size:.75rem}
thead{background:#f0f9f9}
th{padding:.5rem .7rem;text-align:left;font-size:.6rem;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:#6b7a99;border-bottom:2px solid #006d77;white-space:nowrap}
td{padding:.5rem .7rem;border-bottom:1px solid #e2e8f0;vertical-align:middle}
tr:nth-child(even) td{background:#f9f8f5}
.footer{margin-top:1.5rem;padding-top:.8rem;border-top:1px solid #e2e8f0;display:flex;justify-content:space-between;font-size:.62rem;color:#a8b4cc}
.actions{text-align:center;margin:1rem 0;display:flex;gap:.6rem;justify-content:center}
.actions button{padding:.5rem 1.2rem;border-radius:8px;cursor:pointer;font-weight:600;font-size:.8rem}
.btn-p{background:#006d77;color:#fff;border:none}
.btn-c{background:#f5f4f0;color:#2d3650;border:1px solid #e2e8f0}
@media print{body{padding:1cm}.actions{display:none}@page{size:A4 landscape;margin:1cm}}
</style></head><body>
<div class="header">
  <div class="hl">
    <span class="flag">🇲🇦</span>
    <div class="min">Ministère de la Santé et de la Protection Sociale</div>
    <div class="pay">Royaume du Maroc — Province de Safi</div>
    <div class="sub">Centre de Santé Jemaat Shaim</div>
  </div>
  <div class="hr">
    <div class="titre">Inventaire des Médicaments</div>
    <div class="date">Édité le ${today}</div>
    <div class="date" style="margin-top:.2rem;color:#006d77;font-weight:700">${cards.length} médicament(s)</div>
  </div>
</div>
<table>
  <thead>
    <tr>
      <th>Médicament</th><th>Catégorie</th><th>DCI</th><th>Forme</th>
      <th style="text-align:center">Unités/boîte</th>
      <th style="text-align:center">Stock</th>
      <th style="text-align:center">Seuil</th>
      <th>Fournisseur</th><th>Prix/boîte</th><th>Statut</th>
    </tr>
  </thead>
  <tbody>${rows}</tbody>
</table>
<div class="footer">
  <div>Centre de Santé Jemaat Shaim · Safi · ${today}</div>
  <div style="color:#006d77;font-weight:600">Inventaire pharmaceutique © ${new Date().getFullYear()}</div>
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

// ── IMPRIMER MOUVEMENTS ──
function imprimerMouvements() {
    const today = new Date().toLocaleDateString('fr-FR', {weekday:'long', year:'numeric', month:'long', day:'numeric'});
    const rows  = document.querySelectorAll('#tab-mouvements .tbl tbody tr');
    let rowsHtml = '';
    rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        if (!cells.length) return;
        rowsHtml += '<tr>';
        cells.forEach((td, i) => {
            if (i < 9) rowsHtml += `<td>${td.innerText.trim()}</td>`;
        });
        rowsHtml += '</tr>';
    });

    const html = `<!DOCTYPE html>
<html lang="fr"><head><meta charset="UTF-8"/><title>Entrées de Stock</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=DM+Sans:wght@400;600;700&family=DM+Mono&display=swap" rel="stylesheet"/>
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:'DM Sans',sans-serif;background:#fff;color:#0a0f1e;padding:1.5cm 1.8cm;font-size:12px}
.header{display:flex;justify-content:space-between;align-items:flex-start;padding-bottom:1rem;border-bottom:3px solid #166534;margin-bottom:1.5rem}
.hl .flag{font-size:1.5rem;margin-bottom:.3rem;display:block}
.hl .min{font-size:.7rem;color:#6b7a99;text-transform:uppercase;letter-spacing:.07em}
.hl .pay{font-weight:700;font-size:.85rem}
.hl .sub{font-size:.7rem;color:#6b7a99;margin-top:.15rem}
.hr{text-align:right}
.hr .titre{font-family:'DM Serif Display',serif;font-size:1.4rem;color:#166534}
.hr .date{font-size:.7rem;color:#6b7a99;margin-top:.3rem}
table{width:100%;border-collapse:collapse;font-size:.75rem}
thead{background:#f0fdf4}
th{padding:.5rem .7rem;text-align:left;font-size:.6rem;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:#6b7a99;border-bottom:2px solid #166534;white-space:nowrap}
td{padding:.5rem .7rem;border-bottom:1px solid #e2e8f0;vertical-align:middle}
tr:nth-child(even) td{background:#f9f8f5}
.footer{margin-top:1.5rem;padding-top:.8rem;border-top:1px solid #e2e8f0;display:flex;justify-content:space-between;font-size:.62rem;color:#a8b4cc}
.actions{text-align:center;margin:1rem 0;display:flex;gap:.6rem;justify-content:center}
.actions button{padding:.5rem 1.2rem;border-radius:8px;cursor:pointer;font-weight:600;font-size:.8rem}
.btn-p{background:#166534;color:#fff;border:none}
.btn-c{background:#f5f4f0;color:#2d3650;border:1px solid #e2e8f0}
@media print{body{padding:1cm}.actions{display:none}@page{size:A4 landscape;margin:1cm}}
</style></head><body>
<div class="header">
  <div class="hl">
    <span class="flag">🇲🇦</span>
    <div class="min">Ministère de la Santé et de la Protection Sociale</div>
    <div class="pay">Royaume du Maroc — Province de Safi</div>
    <div class="sub">Centre de Santé Jemaat Shaim</div>
  </div>
  <div class="hr">
    <div class="titre">Historique des Entrées de Stock</div>
    <div class="date">Édité le ${today}</div>
  </div>
</div>
<table>
  <thead>
    <tr>
      <th>Date</th><th>Médicament</th><th>Quantité</th><th>Prix/boîte</th>
      <th>Total</th><th>Fournisseur</th><th>N° Bon</th><th>Péremption</th><th>Responsable</th>
    </tr>
  </thead>
  <tbody>${rowsHtml || '<tr><td colspan="9" style="text-align:center;padding:2rem;color:#94a3b8">Aucune entrée enregistrée</td></tr>'}</tbody>
</table>
<div class="footer">
  <div>Centre de Santé Jemaat Shaim · Safi · ${today}</div>
  <div style="color:#166534;font-weight:600">Registre des entrées © ${new Date().getFullYear()}</div>
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