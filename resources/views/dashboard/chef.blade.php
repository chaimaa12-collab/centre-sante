
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Chef de Service — Centre de Santé Safi</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet"/>
    <style>
        :root {
            --ink:        #0a0f1e;
            --ink-2:      #2d3650;
            --ink-3:      #6b7a99;
            --ink-4:      #a8b4cc;
            --paper:      #f5f4f0;
            --surface:    #ffffff;
            --surface-2:  #f9f8f5;
            --rule:       rgba(10,15,30,.08);
            --rule-2:     rgba(10,15,30,.14);
            --teal:       #006d77;
            --teal-lt:    rgba(0,109,119,.10);
            --teal-glow:  rgba(0,109,119,.25);
            --coral:      #c0392b;
            --coral-lt:   rgba(192,57,43,.09);
            --amber:      #b45309;
            --amber-lt:   rgba(180,83,9,.10);
            --emerald:    #166534;
            --emerald-lt: rgba(22,101,52,.10);
            --indigo:     #3730a3;
            --indigo-lt:  rgba(55,48,163,.09);
            --rose:       #9d174d;
            --rose-lt:    rgba(157,23,77,.09);
            --r:     8px;
            --r-lg:  14px;
            --r-xl:  20px;
            --tr:    .16s ease;
            --sh-sm: 0 1px 6px rgba(0,0,0,.06), 0 0 0 1px rgba(0,0,0,.04);
            --sh-md: 0 4px 20px rgba(0,0,0,.08), 0 1px 4px rgba(0,0,0,.04);
            --sh-lg: 0 16px 48px rgba(0,0,0,.11), 0 2px 8px rgba(0,0,0,.05);
            --fw: 'DM Sans', sans-serif;
            --fd: 'DM Serif Display', serif;
            --fm: 'DM Mono', monospace;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body { font-family: var(--fw); background: var(--paper); color: var(--ink); display: flex; min-height: 100vh; -webkit-font-smoothing: antialiased; }
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-thumb { background: var(--ink-4); border-radius: 2px; }

        /* SIDEBAR */
        .sidebar { width: 252px; background: var(--ink); display: flex; flex-direction: column; position: fixed; top: 0; left: 0; bottom: 0; z-index: 300; flex-shrink: 0; }
        .sb-head { padding: 1.6rem 1.5rem 1.2rem; border-bottom: 1px solid rgba(255,255,255,.08); }
        .sb-logo { display: flex; align-items: center; gap: .8rem; margin-bottom: 1rem; }
        .sb-logo-mark { width: 38px; height: 38px; background: linear-gradient(135deg, var(--teal), #004d55); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; box-shadow: 0 4px 14px var(--teal-glow); flex-shrink: 0; }
        .sb-logo-name { font-family: var(--fd); font-size: 1rem; color: #fff; line-height: 1.15; letter-spacing: -.01em; }
        .sb-logo-sub { font-size: .58rem; color: rgba(255,255,255,.35); letter-spacing: .14em; text-transform: uppercase; margin-top: .12rem; }
        .sb-user { display: flex; align-items: center; gap: .7rem; }
        .sb-avatar { width: 30px; height: 30px; background: rgba(0,109,119,.4); border: 1.5px solid var(--teal); border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: .65rem; font-weight: 700; color: #83d9df; flex-shrink: 0; }
        .sb-user-name { font-size: .78rem; font-weight: 600; color: rgba(255,255,255,.85); }
        .sb-user-role { font-size: .6rem; color: rgba(255,255,255,.35); margin-top: .08rem; display: flex; align-items: center; gap: .3rem; }
        .sb-user-role::before { content: ''; width: 5px; height: 5px; background: #4ade80; border-radius: 50%; box-shadow: 0 0 5px #4ade80; }
        .sb-nav { flex: 1; overflow-y: auto; padding: .8rem 0; }
        .sb-section { font-size: .54rem; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; color: rgba(255,255,255,.25); padding: .9rem 1.5rem .3rem; }
        .sb-link { display: flex; align-items: center; gap: .65rem; padding: .52rem 1.5rem; font-size: .77rem; font-weight: 500; color: rgba(255,255,255,.5); text-decoration: none; border-left: 2px solid transparent; transition: var(--tr); }
        .sb-link:hover { color: rgba(255,255,255,.85); background: rgba(255,255,255,.05); }
        .sb-link.active { color: #fff; background: rgba(0,109,119,.25); border-left-color: var(--teal); font-weight: 600; }
        .sb-link-ico { width: 16px; display: flex; align-items: center; justify-content: center; font-size: .85rem; flex-shrink: 0; opacity: .7; }
        .sb-link.active .sb-link-ico { opacity: 1; }
        .sb-badge { margin-left: auto; font-size: .55rem; font-weight: 700; background: var(--teal); color: #fff; padding: .12rem .45rem; border-radius: 4px; font-family: var(--fm); }
        .sb-badge.warn { background: var(--coral); }
        .sb-foot { padding: 1rem 1.5rem; border-top: 1px solid rgba(255,255,255,.08); }
        .sb-logout { width: 100%; display: flex; align-items: center; justify-content: center; gap: .5rem; padding: .5rem; background: transparent; border: 1px solid rgba(255,255,255,.12); border-radius: var(--r); color: rgba(255,255,255,.4); font-size: .73rem; font-weight: 600; font-family: var(--fw); cursor: pointer; transition: var(--tr); }
        .sb-logout:hover { border-color: #f87171; color: #f87171; background: rgba(248,113,113,.08); }

        /* MAIN */
        .main { margin-left: 252px; flex: 1; min-height: 100vh; display: flex; flex-direction: column; }
        .topbar { background: var(--surface); border-bottom: 1px solid var(--rule); padding: .85rem 2rem; display: flex; align-items: center; justify-content: space-between; position: sticky; top: 0; z-index: 100; box-shadow: var(--sh-sm); }
        .topbar-crumb { font-size: .62rem; color: var(--ink-3); font-family: var(--fm); margin-bottom: .2rem; display: flex; align-items: center; gap: .3rem; }
        .topbar-title { font-family: var(--fd); font-size: 1.1rem; color: var(--ink); display: flex; align-items: center; gap: .55rem; }
        .topbar-title .pulse { width: 7px; height: 7px; background: var(--teal); border-radius: 50%; box-shadow: 0 0 0 3px var(--teal-lt); animation: pulse 2s ease-in-out infinite; }
        @keyframes pulse { 0%,100%{box-shadow:0 0 0 3px var(--teal-lt)} 50%{box-shadow:0 0 0 6px transparent} }
        .topbar-right { display: flex; align-items: center; gap: .6rem; }
        .topbar-date { font-size: .68rem; color: var(--ink-3); font-family: var(--fm); padding: .35rem .75rem; background: var(--surface-2); border: 1px solid var(--rule-2); border-radius: var(--r); }

        /* BUTTONS */
        .btn { display: inline-flex; align-items: center; gap: .38rem; font-family: var(--fw); font-size: .76rem; font-weight: 600; cursor: pointer; border: none; border-radius: var(--r); padding: .5rem 1rem; transition: var(--tr); white-space: nowrap; text-decoration: none; }
        .btn-ghost { background: transparent; color: var(--ink-2); border: 1px solid var(--rule-2); }
        .btn-ghost:hover { background: var(--surface-2); }
        .btn-sm { padding: .38rem .85rem; font-size: .72rem; }

        /* CONTENT */
        .content { padding: 1.8rem 2rem; flex: 1; }

        /* KPI STRIP */
        .kpi-strip { display: grid; grid-template-columns: repeat(5, 1fr); gap: .75rem; margin-bottom: 1.8rem; }
        .kpi { background: var(--surface); border: 1px solid var(--rule); border-radius: var(--r-lg); padding: .95rem 1rem; position: relative; overflow: hidden; box-shadow: var(--sh-sm); transition: var(--tr); }
        .kpi:hover { box-shadow: var(--sh-md); transform: translateY(-2px); }
        .kpi-top { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: .5rem; }
        .kpi-label { font-size: .58rem; font-weight: 700; text-transform: uppercase; letter-spacing: .1em; color: var(--ink-3); }
        .kpi-ico { font-size: 1.1rem; opacity: .5; }
        .kpi-val { font-family: var(--fd); font-size: 1.75rem; line-height: 1; letter-spacing: -.03em; }
        .kpi-val.teal    { color: var(--teal); }
        .kpi-val.amber   { color: var(--amber); }
        .kpi-val.indigo  { color: var(--indigo); }
        .kpi-val.coral   { color: var(--coral); }
        .kpi-val.rose    { color: var(--rose); }
        .kpi-foot { font-size: .62rem; color: var(--ink-3); margin-top: .3rem; font-family: var(--fm); }
        .kpi-bar { position: absolute; bottom: 0; left: 0; right: 0; height: 2px; }
        .kpi-bar.teal   { background: var(--teal); }
        .kpi-bar.amber  { background: var(--amber); }
        .kpi-bar.indigo { background: var(--indigo); }
        .kpi-bar.coral  { background: var(--coral); }
        .kpi-bar.rose   { background: var(--rose); }

        /* MODULE GRID */
        .modules-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.2rem; margin-bottom: 1.8rem; }
        .module-card { background: var(--surface); border: 1px solid var(--rule); border-radius: var(--r-xl); overflow: hidden; text-decoration: none; color: var(--ink); display: flex; flex-direction: column; box-shadow: var(--sh-sm); transition: var(--tr); position: relative; }
        .module-card:hover { box-shadow: var(--sh-lg); transform: translateY(-3px); }
        .module-card-top { padding: 1.5rem 1.5rem 1.2rem; display: flex; align-items: flex-start; justify-content: space-between; }
        .module-ico { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; flex-shrink: 0; }
        .module-ico.teal   { background: var(--teal-lt); }
        .module-ico.amber  { background: var(--amber-lt); }
        .module-ico.indigo { background: var(--indigo-lt); }
        .module-ico.rose   { background: var(--rose-lt); }
        .module-ico.coral  { background: var(--coral-lt); }
        .module-badge { font-size: .58rem; font-weight: 700; padding: .2rem .6rem; border-radius: 20px; font-family: var(--fm); border: 1px solid; }
        .module-badge.green { color: var(--emerald); border-color: rgba(22,101,52,.2); background: var(--emerald-lt); }
        .module-badge.warn  { color: var(--coral);   border-color: rgba(192,57,43,.2); background: var(--coral-lt); }
        .module-badge.info  { color: var(--teal);    border-color: rgba(0,109,119,.2); background: var(--teal-lt); }
        .module-badge.amber { color: var(--amber);   border-color: rgba(180,83,9,.2);  background: var(--amber-lt); }
        .module-body { padding: 0 1.5rem 1.5rem; flex: 1; }
        .module-title { font-family: var(--fd); font-size: 1.15rem; color: var(--ink); margin-bottom: .3rem; letter-spacing: -.01em; }
        .module-desc { font-size: .75rem; color: var(--ink-3); line-height: 1.55; }
        .module-footer { padding: .85rem 1.5rem; border-top: 1px solid var(--rule); background: var(--surface-2); display: flex; align-items: center; justify-content: space-between; }
        .module-footer-stats { display: flex; gap: 1rem; }
        .module-stat-val { font-family: var(--fm); font-size: .85rem; font-weight: 500; color: var(--ink); }
        .module-stat-label { font-size: .58rem; color: var(--ink-3); margin-top: .05rem; text-transform: uppercase; letter-spacing: .06em; }
        .module-arrow { width: 28px; height: 28px; border: 1px solid var(--rule-2); border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: .85rem; color: var(--ink-3); transition: var(--tr); background: var(--surface); }
        .module-card:hover .module-arrow { background: var(--teal); border-color: var(--teal); color: #fff; transform: translateX(2px); }
        .module-stripe { height: 3px; position: absolute; top: 0; left: 0; right: 0; }
        .stripe-teal   { background: linear-gradient(90deg, var(--teal), #00b4c8); }
        .stripe-amber  { background: linear-gradient(90deg, var(--amber), #f59e0b); }
        .stripe-indigo { background: linear-gradient(90deg, var(--indigo), #6366f1); }
        .stripe-rose   { background: linear-gradient(90deg, var(--rose), #ec4899); }
        .stripe-coral  { background: linear-gradient(90deg, var(--coral), #ef4444); }

        /* GRID */
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1.2rem; margin-bottom: 1.5rem; }
        
.sb-logo svg { width: 22px; height: 22px; }
.sb-brand-name {
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-weight: 700;
  font-size: .92rem;
  color: #fff;
  line-height: 1.25;
}
        /* CARD */
        .card { background: var(--surface); border: 1px solid var(--rule); border-radius: var(--r-lg); overflow: hidden; box-shadow: var(--sh-sm); }
        .card-head { padding: .9rem 1.3rem; border-bottom: 1px solid var(--rule); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: .5rem; background: var(--surface-2); }
        .card-title { font-family: var(--fd); font-size: .95rem; color: var(--ink); display: flex; align-items: center; gap: .5rem; }

        /* SECTION LABEL */
        .section-label { font-size: .62rem; font-weight: 700; text-transform: uppercase; letter-spacing: .12em; color: var(--ink-3); margin-bottom: .8rem; display: flex; align-items: center; gap: .5rem; }
        .section-label::after { content: ''; flex: 1; height: 1px; background: var(--rule); }

        /* TABLE */
        .tbl { width: 100%; border-collapse: collapse; font-size: .78rem; }
        .tbl thead { background: var(--surface-2); }
        .tbl th { padding: .55rem .9rem; text-align: left; font-size: .58rem; font-weight: 700; text-transform: uppercase; letter-spacing: .1em; color: var(--ink-3); border-bottom: 1px solid var(--rule); }
        .tbl td { padding: .65rem .9rem; border-bottom: 1px solid var(--rule); color: var(--ink-2); vertical-align: middle; }
        .tbl tbody tr:last-child td { border-bottom: none; }
        .tbl tbody tr:hover td { background: var(--surface-2); }

        /* CHIPS */
        .chip { display: inline-flex; align-items: center; gap: .25rem; font-size: .6rem; font-weight: 700; padding: .2rem .55rem; border-radius: 6px; font-family: var(--fm); border: 1px solid; white-space: nowrap; }
        .chip::before { content: ''; width: 4px; height: 4px; border-radius: 50%; flex-shrink: 0; }
        .chip-ok   { background: var(--emerald-lt); color: var(--emerald); border-color: rgba(22,101,52,.2); } .chip-ok::before   { background: var(--emerald); }
        .chip-warn { background: var(--amber-lt);   color: var(--amber);   border-color: rgba(180,83,9,.2);  } .chip-warn::before { background: var(--amber); }
        .chip-crit { background: var(--coral-lt);   color: var(--coral);   border-color: rgba(192,57,43,.2); } .chip-crit::before { background: var(--coral); }
        .chip-info { background: var(--teal-lt);    color: var(--teal);    border-color: rgba(0,109,119,.2);  } .chip-info::before { background: var(--teal); }

        /* PRINT */
        @media print {
            .sidebar, .topbar, .no-print { display: none !important; }
            .main { margin-left: 0 !important; }
            body, .card { background: #fff !important; }
        }

        /* RESPONSIVE */
        @media (max-width: 1100px) {
            .kpi-strip    { grid-template-columns: repeat(3,1fr); }
            .modules-grid { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 800px) {
            .modules-grid, .grid-2 { grid-template-columns: 1fr; }
            .sidebar { display: none; }
            .main { margin-left: 0; }
        }

        /* ANIMATIONS */
        @keyframes fadeUp { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }
        .anim    { animation: fadeUp .4s ease both; }
        .anim-d1 { animation-delay: .05s; }
        .anim-d2 { animation-delay: .10s; }
        .anim-d3 { animation-delay: .15s; }
        .anim-d4 { animation-delay: .20s; }
        .anim-d5 { animation-delay: .25s; }
    </style>
</head>
<body>

<!-- ══ SIDEBAR ══ -->
<aside class="sidebar">
    <div class="sb-head">
        <div class="sb-logo">
            <svg viewBox="0 0 24 24" fill="none"><path d="M12 2L3 7v10l9 5 9-5V7L12 2z" stroke="rgba(46,204,113,.7)" stroke-width="1.5"/><path d="M12 8v8M8 12h8" stroke="#2ecc71" stroke-width="2"/></svg>
            <div>
                <div class="sb-logo-name">Centre de Santé</div>
                <div class="sb-logo-sub">Safi · Maroc</div>
            </div>
        </div>
        <div class="sb-user">
            <div class="sb-avatar">CS</div>
            <div>
                <div class="sb-user-name">{{ auth()->user()->name ?? 'Chef de Service' }}</div>
                <div class="sb-user-role">Administrateur · Actif</div>
            </div>
        </div>
    </div>
    <nav class="sb-nav">
        <div class="sb-section">Principal</div>
        <a href="/dashboard/chef" class="sb-link active">
            <span class="sb-link-ico">⊞</span> Tableau de bord
        </a>
        <div class="sb-section">Modules</div>
        <a href="/medicaments" class="sb-link">
            <span class="sb-link-ico">⬡</span> Médicaments
            @if(($medicamentsSousSeuilCount ?? 0) > 0)
                <span class="sb-badge warn">{{ $medicamentsSousSeuilCount }}</span>
            @endif
        </a>
        <a href="/appareils" class="sb-link">
            <span class="sb-link-ico">⊕</span> Appareils
            @if(($appareilsEnPanne ?? 0) > 0)
                <span class="sb-badge warn">{{ $appareilsEnPanne }}</span>
            @endif
        </a>
        <a href="/rapports" class="sb-link">
            <span class="sb-link-ico">▦</span> Rapports SREC
            @if(($rapportsEnAttente ?? 0) > 0)
                <span class="sb-badge">{{ $rapportsEnAttente }}</span>
            @endif
        </a>
        <a href="/conges" class="sb-link">
            <span class="sb-link-ico">🏖</span> Congés
            @if(($congesEnAttente ?? 0) > 0)
                <span class="sb-badge warn">{{ $congesEnAttente }}</span>
            @endif
        </a>
        <a href="/declarations" class="sb-link">
            <span class="sb-link-ico">📋</span> Déclarations
            @if(($declarationsEnAttente ?? 0) > 0)
                <span class="sb-badge warn">{{ $declarationsEnAttente }}</span>
            @endif
        </a>
    </nav>
    <div class="sb-foot">
        <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="sb-logout">⏻ &nbsp;Déconnexion</button>
        </form>
    </div>
</aside>

<!-- ══ MAIN ══ -->
<main class="main">

    <header class="topbar">
        <div>
            <div class="topbar-crumb">
                <span>🏥 Centre de Santé Safi</span>
                <span style="opacity:.4">›</span>
                <span>Tableau de bord</span>
            </div>
            <div class="topbar-title">
                <span class="pulse"></span>
                Chef de Service — Vue d'ensemble
            </div>
        </div>
        <div class="topbar-right no-print">
            <div class="topbar-date" id="js-date">—</div>
            <button onclick="window.print()" class="btn btn-ghost btn-sm">📄 Imprimer</button>
        </div>
    </header>

    <div class="content">

        <!-- ── KPI STRIP ── -->
        <div class="kpi-strip anim">
            <div class="kpi anim-d1">
                <div class="kpi-top"><div class="kpi-label">Médicaments</div><div class="kpi-ico">⬡</div></div>
                <div class="kpi-val amber">{{ $totalMedicaments ?? 0 }}</div>
                <div class="kpi-foot">{{ $medicamentsSousSeuilCount ?? 0 }} sous seuil</div>
                <div class="kpi-bar amber"></div>
            </div>
            <div class="kpi anim-d2">
                <div class="kpi-top"><div class="kpi-label">Appareils</div><div class="kpi-ico">⊕</div></div>
                <div class="kpi-val teal">{{ $totalAppareils ?? 0 }}</div>
                <div class="kpi-foot">{{ $appareilsEnService ?? 0 }} en service</div>
                <div class="kpi-bar teal"></div>
            </div>
            <div class="kpi anim-d3">
                <div class="kpi-top"><div class="kpi-label">Congés en cours</div><div class="kpi-ico">🏖</div></div>
                <div class="kpi-val rose">{{ $congesEnCours ?? 0 }}</div>
                <div class="kpi-foot">{{ $congesEnAttente ?? 0 }} en attente</div>
                <div class="kpi-bar rose"></div>
            </div>
            <div class="kpi anim-d4">
                <div class="kpi-top"><div class="kpi-label">Déclarations</div><div class="kpi-ico">📋</div></div>
                <div class="kpi-val coral">{{ $declarationsEnAttente ?? 0 }}</div>
                <div class="kpi-foot">En attente</div>
                <div class="kpi-bar coral"></div>
            </div>
            <div class="kpi anim-d5">
                <div class="kpi-top"><div class="kpi-label">Rapports</div><div class="kpi-ico">▦</div></div>
                <div class="kpi-val indigo">{{ $totalRapports ?? 0 }}</div>
                <div class="kpi-foot">{{ $rapportsEnAttente ?? 0 }} en attente</div>
                <div class="kpi-bar indigo"></div>
            </div>
        </div>

        <!-- ── MODULES ── -->
        <div class="section-label">Modules</div>
        <div class="modules-grid anim anim-d2">

            <!-- MÉDICAMENTS -->
            <a href="/medicaments" class="module-card">
                <div class="module-stripe stripe-amber"></div>
                <div class="module-card-top">
                    <div class="module-ico amber">⬡</div>
                    @if(($medicamentsSousSeuilCount ?? 0) > 0)
                        <span class="module-badge warn">{{ $medicamentsSousSeuilCount }} sous seuil</span>
                    @else
                        <span class="module-badge green">Stock normal</span>
                    @endif
                </div>
                <div class="module-body">
                    <div class="module-title">Médicaments &amp; Stock</div>
                    <div class="module-desc">Gestion du stock pharmaceutique. Suivi des entrées/sorties, alertes péremption et seuils de réapprovisionnement.</div>
                </div>
                <div class="module-footer">
                    <div class="module-footer-stats">
                        <div class="module-stat">
                            <div class="module-stat-val">{{ $totalMedicaments ?? 0 }}</div>
                            <div class="module-stat-label">Références</div>
                        </div>
                        <div class="module-stat">
                            <div class="module-stat-val" style="color:var(--amber)">{{ $medicamentsSousSeuilCount ?? 0 }}</div>
                            <div class="module-stat-label">Alertes</div>
                        </div>
                        <div class="module-stat">
                            <div class="module-stat-val" style="color:var(--coral)">{{ $medicamentsPerimes ?? 0 }}</div>
                            <div class="module-stat-label">Périmés</div>
                        </div>
                    </div>
                    <div class="module-arrow">→</div>
                </div>
            </a>

            <!-- APPAREILS -->
            <a href="/appareils" class="module-card">
                <div class="module-stripe stripe-teal"></div>
                <div class="module-card-top">
                    <div class="module-ico teal">⊕</div>
                    @if(($appareilsEnPanne ?? 0) > 0)
                        <span class="module-badge warn">{{ $appareilsEnPanne }} en panne</span>
                    @else
                        <span class="module-badge green">Tous opérationnels</span>
                    @endif
                </div>
                <div class="module-body">
                    <div class="module-title">Appareils Médicaux</div>
                    <div class="module-desc">Inventaire, révisions et maintenance de tous les équipements. Suivi de l'état en temps réel.</div>
                </div>
                <div class="module-footer">
                    <div class="module-footer-stats">
                        <div class="module-stat">
                            <div class="module-stat-val">{{ $totalAppareils ?? 0 }}</div>
                            <div class="module-stat-label">Total</div>
                        </div>
                        <div class="module-stat">
                            <div class="module-stat-val">{{ $appareilsEnService ?? 0 }}</div>
                            <div class="module-stat-label">Actifs</div>
                        </div>
                        <div class="module-stat">
                            <div class="module-stat-val" style="color:var(--coral)">{{ $appareilsEnPanne ?? 0 }}</div>
                            <div class="module-stat-label">En panne</div>
                        </div>
                    </div>
                    <div class="module-arrow">→</div>
                </div>
            </a>

            <!-- RAPPORTS -->
            <a href="/rapports" class="module-card">
                <div class="module-stripe stripe-indigo"></div>
                <div class="module-card-top">
                    <div class="module-ico indigo">▦</div>
                    @if(($rapportsEnAttente ?? 0) > 0)
                        <span class="module-badge warn">{{ $rapportsEnAttente }} à valider</span>
                    @else
                        <span class="module-badge info">À jour</span>
                    @endif
                </div>
                <div class="module-body">
                    <div class="module-title">Rapports Mensuels SREC</div>
                    <div class="module-desc">Saisie et suivi des rapports d'activités : PF, CPN, Vaccination, Accouchements, Enfants &lt;5 ans, Maladies chroniques.</div>
                </div>
                <div class="module-footer">
                    <div class="module-footer-stats">
                        <div class="module-stat">
                            <div class="module-stat-val">{{ $totalRapports ?? 0 }}</div>
                            <div class="module-stat-label">Ce mois</div>
                        </div>
                        <div class="module-stat">
                            <div class="module-stat-val" style="color:var(--amber)">{{ $rapportsEnAttente ?? 0 }}</div>
                            <div class="module-stat-label">En attente</div>
                        </div>
                        <div class="module-stat">
                            <div class="module-stat-val" style="color:var(--emerald)">{{ $rapportsValides ?? 0 }}</div>
                            <div class="module-stat-label">Validés</div>
                        </div>
                    </div>
                    <div class="module-arrow">→</div>
                </div>
            </a>

            <!-- CONGÉS -->
            <a href="/conges" class="module-card">
                <div class="module-stripe stripe-rose"></div>
                <div class="module-card-top">
                    <div class="module-ico rose">🏖</div>
                    @if(($congesEnAttente ?? 0) > 0)
                        <span class="module-badge warn">{{ $congesEnAttente }} en attente</span>
                    @else
                        <span class="module-badge green">Aucune demande</span>
                    @endif
                </div>
                <div class="module-body">
                    <div class="module-title">Gestion des Congés</div>
                    <div class="module-desc">Suivi des demandes de congés du personnel. Validation, planification et historique des absences.</div>
                </div>
                <div class="module-footer">
                    <div class="module-footer-stats">
                        <div class="module-stat">
                            <div class="module-stat-val">{{ $congesEnCours ?? 0 }}</div>
                            <div class="module-stat-label">En cours</div>
                        </div>
                        <div class="module-stat">
                            <div class="module-stat-val" style="color:var(--amber)">{{ $congesEnAttente ?? 0 }}</div>
                            <div class="module-stat-label">À valider</div>
                        </div>
                    </div>
                    <div class="module-arrow">→</div>
                </div>
            </a>

            <!-- DÉCLARATIONS -->
            <a href="/declarations" class="module-card">
                <div class="module-stripe stripe-coral"></div>
                <div class="module-card-top">
                    <div class="module-ico coral">📋</div>
                    @if(($declarationsEnAttente ?? 0) > 0)
                        <span class="module-badge warn">{{ $declarationsEnAttente }} en attente</span>
                    @else
                        <span class="module-badge green">Aucune en attente</span>
                    @endif
                </div>
                <div class="module-body">
                    <div class="module-title">Déclarations</div>
                    <div class="module-desc">Gestion des déclarations administratives : accidents de travail, maladies professionnelles et incidents.</div>
                </div>
                <div class="module-footer">
                    <div class="module-footer-stats">
                        <div class="module-stat">
                            <div class="module-stat-val" style="color:var(--coral)">{{ $declarationsEnAttente ?? 0 }}</div>
                            <div class="module-stat-label">En attente</div>
                        </div>
                    </div>
                    <div class="module-arrow">→</div>
                </div>
            </a>

        </div>

        <!-- ── TABLEAUX DÉTAIL ── -->

        <!-- Médicaments sous seuil + Appareils -->
        <div class="grid-2">
            <div class="card anim anim-d3">
                <div class="card-head">
                    <div class="card-title">⬡ Médicaments — Alertes Stock</div>
                    <a href="/medicaments" class="btn btn-ghost btn-sm no-print">Gérer →</a>
                </div>
                <div style="overflow-x:auto">
                    <table class="tbl">
                        <thead>
                            <tr><th>Médicament</th><th>Forme</th><th>Stock</th><th>Seuil</th><th>État</th></tr>
                        </thead>
                        <tbody>
                            @forelse($medicamentsSousSeuil ?? [] as $med)
                            <tr>
                                <td style="font-weight:600">{{ $med->nom }}</td>
                                <td style="font-size:.72rem;color:var(--ink-3)">{{ $med->forme }}</td>
                                <td style="font-family:var(--fm);font-size:.78rem;color:var(--coral);font-weight:700">{{ $med->quantite }}</td>
                                <td style="font-family:var(--fm);font-size:.72rem;color:var(--ink-3)">{{ $med->seuil_alerte }}</td>
                                <td>
                                    @if($med->quantite == 0)
                                        <span class="chip chip-crit">Rupture</span>
                                    @else
                                        <span class="chip chip-warn">Faible</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td style="font-weight:600">Pilule COC</td>
                                <td style="font-size:.72rem;color:var(--ink-3)">Comprimé</td>
                                <td style="font-family:var(--fm);color:var(--coral);font-weight:700">5</td>
                                <td style="font-family:var(--fm);font-size:.72rem;color:var(--ink-3)">20</td>
                                <td><span class="chip chip-warn">Faible</span></td>
                            </tr>
                            <tr>
                                <td style="font-weight:600">Metformine 500mg</td>
                                <td style="font-size:.72rem;color:var(--ink-3)">Comprimé</td>
                                <td style="font-family:var(--fm);color:var(--coral);font-weight:700">8</td>
                                <td style="font-family:var(--fm);font-size:.72rem;color:var(--ink-3)">30</td>
                                <td><span class="chip chip-warn">Faible</span></td>
                            </tr>
                            <tr>
                                <td style="font-weight:600">Amoxicilline 500mg</td>
                                <td style="font-size:.72rem;color:var(--ink-3)">Gélule</td>
                                <td style="font-family:var(--fm);color:var(--coral);font-weight:700">0</td>
                                <td style="font-family:var(--fm);font-size:.72rem;color:var(--ink-3)">25</td>
                                <td><span class="chip chip-crit">Rupture</span></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card anim anim-d3">
                <div class="card-head">
                    <div class="card-title">⊕ État des Appareils</div>
                    <a href="/appareils" class="btn btn-ghost btn-sm no-print">Voir tout →</a>
                </div>
                <div style="overflow-x:auto">
                    <table class="tbl">
                        <thead>
                            <tr><th>Appareil</th><th>Service</th><th>État</th><th>Révision</th></tr>
                        </thead>
                        <tbody>
                            @forelse($derniersAppareils ?? [] as $app)
                            <tr>
                                <td style="font-weight:600">{{ $app->nom }}</td>
                                <td style="font-size:.72rem;color:var(--ink-3)">{{ $app->service }}</td>
                                <td>
                                    @if(in_array($app->statut, ['operationnel','En service']))
                                        <span class="chip chip-ok">En service</span>
                                    @elseif(in_array($app->statut, ['panne','En panne']))
                                        <span class="chip chip-crit">En panne</span>
                                    @else
                                        <span class="chip chip-warn">Maintenance</span>
                                    @endif
                                </td>
                                <td style="font-size:.7rem;font-family:var(--fm)">{{ $app->prochaine_revision ? \Carbon\Carbon::parse($app->prochaine_revision)->format('d/m/Y') : '—' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td style="font-weight:600">Tensiomètre</td>
                                <td style="font-size:.72rem;color:var(--ink-3)">SMI</td>
                                <td><span class="chip chip-crit">En panne</span></td>
                                <td style="font-size:.7rem;font-family:var(--fm)">20/03/2026</td>
                            </tr>
                            <tr>
                                <td style="font-weight:600">Échographe</td>
                                <td style="font-size:.72rem;color:var(--ink-3)">SMI</td>
                                <td><span class="chip chip-ok">En service</span></td>
                                <td style="font-size:.7rem;font-family:var(--fm)">15/06/2026</td>
                            </tr>
                            <tr>
                                <td style="font-weight:600">Glucomètre</td>
                                <td style="font-size:.72rem;color:var(--ink-3)">Chroniques</td>
                                <td><span class="chip chip-ok">En service</span></td>
                                <td style="font-size:.7rem;font-family:var(--fm)">01/04/2026</td>
                            </tr>
                            <tr>
                                <td style="font-weight:600">Balance électronique</td>
                                <td style="font-size:.72rem;color:var(--ink-3)">SMI</td>
                                <td><span class="chip chip-warn">Maintenance</span></td>
                                <td style="font-size:.7rem;font-family:var(--fm)">—</td>
                            </tr>
                            <tr>
                                <td style="font-weight:600">Stérilisateur</td>
                                <td style="font-size:.72rem;color:var(--ink-3)">PF</td>
                                <td><span class="chip chip-ok">En service</span></td>
                                <td style="font-size:.7rem;font-family:var(--fm)">10/05/2026</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Rapports + Congés & Déclarations -->
        <div class="grid-2">
            <div class="card anim anim-d4">
                <div class="card-head">
                    <div class="card-title">▦ Derniers Rapports SREC</div>
                    <a href="/rapports" class="btn btn-ghost btn-sm no-print">Saisir →</a>
                </div>
                <div style="overflow-x:auto">
                    <table class="tbl">
                        <thead>
                            <tr><th>Type</th><th>Mois</th><th>Saisie</th><th>Statut</th><th class="no-print">Action</th></tr>
                        </thead>
                        <tbody>
                            @forelse($derniersRapports ?? [] as $rpt)
                            <tr>
                                <td style="font-weight:600">{{ $rpt->type_rapport }}</td>
                                <td style="font-family:var(--fm);font-size:.72rem">{{ $rpt->mois }}</td>
                                <td style="font-family:var(--fm);font-size:.72rem;color:var(--ink-3)">{{ \Carbon\Carbon::parse($rpt->created_at)->format('d/m/Y') }}</td>
                                <td>
                                    @if(in_array($rpt->statut, ['validé','valide','Validé']))
                                        <span class="chip chip-ok">Validé</span>
                                    @elseif(in_array($rpt->statut, ['en attente','en_attente','En attente']))
                                        <span class="chip chip-warn">En attente</span>
                                    @else
                                        <span class="chip chip-info">Brouillon</span>
                                    @endif
                                </td>
                                <td class="no-print"><a href="/rapports/{{ $rpt->id }}" class="btn btn-ghost btn-sm" style="padding:.2rem .6rem;font-size:.65rem">Voir</a></td>
                            </tr>
                            @empty
                            <tr>
                                <td style="font-weight:600">PF</td>
                                <td style="font-family:var(--fm);font-size:.72rem">Mars 2026</td>
                                <td style="font-family:var(--fm);font-size:.72rem;color:var(--ink-3)">18/03/2026</td>
                                <td><span class="chip chip-warn">En attente</span></td>
                                <td class="no-print"><a href="/rapports" class="btn btn-ghost btn-sm" style="padding:.2rem .6rem;font-size:.65rem">Voir</a></td>
                            </tr>
                            <tr>
                                <td style="font-weight:600">CPN</td>
                                <td style="font-family:var(--fm);font-size:.72rem">Fév. 2026</td>
                                <td style="font-family:var(--fm);font-size:.72rem;color:var(--ink-3)">17/02/2026</td>
                                <td><span class="chip chip-ok">Validé</span></td>
                                <td class="no-print"><a href="/rapports" class="btn btn-ghost btn-sm" style="padding:.2rem .6rem;font-size:.65rem">Voir</a></td>
                            </tr>
                            <tr>
                                <td style="font-weight:600">Vaccination</td>
                                <td style="font-family:var(--fm);font-size:.72rem">Fév. 2026</td>
                                <td style="font-family:var(--fm);font-size:.72rem;color:var(--ink-3)">17/02/2026</td>
                                <td><span class="chip chip-ok">Validé</span></td>
                                <td class="no-print"><a href="/rapports" class="btn btn-ghost btn-sm" style="padding:.2rem .6rem;font-size:.65rem">Voir</a></td>
                            </tr>
                            <tr>
                                <td style="font-weight:600">Chroniques</td>
                                <td style="font-family:var(--fm);font-size:.72rem">Fév. 2026</td>
                                <td style="font-family:var(--fm);font-size:.72rem;color:var(--ink-3)">16/02/2026</td>
                                <td><span class="chip chip-ok">Validé</span></td>
                                <td class="no-print"><a href="/rapports" class="btn btn-ghost btn-sm" style="padding:.2rem .6rem;font-size:.65rem">Voir</a></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card anim anim-d4">
                <div class="card-head">
                    <div class="card-title">🏖 Congés &amp; 📋 Déclarations</div>
                </div>
                <div style="overflow-x:auto">
                    <table class="tbl">
                        <thead>
                            <tr><th>Agent</th><th>Type</th><th>Date début</th><th>Statut</th><th class="no-print">Action</th></tr>
                        </thead>
                        <tbody>
                            @forelse($derniersConges ?? [] as $cg)
                            <tr>
                                <td style="font-weight:600">{{ $cg->user->name ?? '—' }}</td>
                                <td style="font-size:.72rem;color:var(--ink-3)">{{ $cg->type }}</td>
                                <td style="font-family:var(--fm);font-size:.72rem">{{ \Carbon\Carbon::parse($cg->date_debut)->format('d/m/Y') }}</td>
                                <td>
                                    @if(in_array($cg->statut, ['approuve','Approuvé']))
                                        <span class="chip chip-ok">Approuvé</span>
                                    @elseif(in_array($cg->statut, ['en_attente','En attente']))
                                        <span class="chip chip-warn">En attente</span>
                                    @else
                                        <span class="chip chip-crit">Refusé</span>
                                    @endif
                                </td>
                                <td class="no-print"><a href="/conges/{{ $cg->id }}" class="btn btn-ghost btn-sm" style="padding:.2rem .6rem;font-size:.65rem">Voir</a></td>
                            </tr>
                            @empty
                            <tr>
                                <td style="font-weight:600">Dr. Benali</td>
                                <td style="font-size:.72rem;color:var(--ink-3)">Congé annuel</td>
                                <td style="font-family:var(--fm);font-size:.72rem">25/03/2026</td>
                                <td><span class="chip chip-warn">En attente</span></td>
                                <td class="no-print"><a href="/conges" class="btn btn-ghost btn-sm" style="padding:.2rem .6rem;font-size:.65rem">Voir</a></td>
                            </tr>
                            <tr>
                                <td style="font-weight:600">Inf. Karimi</td>
                                <td style="font-size:.72rem;color:var(--ink-3)">Congé maladie</td>
                                <td style="font-family:var(--fm);font-size:.72rem">10/03/2026</td>
                                <td><span class="chip chip-ok">Approuvé</span></td>
                                <td class="no-print"><a href="/conges" class="btn btn-ghost btn-sm" style="padding:.2rem .6rem;font-size:.65rem">Voir</a></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div style="border-top:1px solid var(--rule);padding:.6rem 1rem;background:var(--surface-2);display:flex;align-items:center;justify-content:space-between">
                    <span style="font-size:.7rem;color:var(--ink-3)">Déclarations en attente</span>
                    <div style="display:flex;align-items:center;gap:.6rem">
                        <span style="font-family:var(--fm);font-size:.85rem;font-weight:700;color:var(--coral)">{{ $declarationsEnAttente ?? 0 }}</span>
                        <a href="/declarations" class="btn btn-ghost btn-sm no-print">Voir →</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<script>
document.getElementById('js-date').textContent =
    new Date().toLocaleDateString('fr-FR',{weekday:'short',day:'numeric',month:'short',year:'numeric'}).toUpperCase();
</script>

</body>
</html>