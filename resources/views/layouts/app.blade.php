<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'Centre de Santé Jemaat Shaim')</title>
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
            --fw:    'DM Sans', sans-serif;
            --fd:    'DM Serif Display', serif;
            --fm:    'DM Mono', monospace;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body { font-family: var(--fw); background: var(--paper); color: var(--ink); display: flex; min-height: 100vh; -webkit-font-smoothing: antialiased; }
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-thumb { background: var(--ink-4); border-radius: 2px; }

        /* ══ SIDEBAR ══ */
        .sidebar { width: 252px; background: var(--ink); display: flex; flex-direction: column; position: fixed; top: 0; left: 0; bottom: 0; z-index: 300; }
        .sb-head { padding: 1.6rem 1.5rem 1.2rem; border-bottom: 1px solid rgba(255,255,255,.08); }
        .sb-logo { display: flex; align-items: center; gap: .8rem; margin-bottom: 1rem; }
        .sb-logo-mark { width: 38px; height: 38px; background: linear-gradient(135deg, var(--teal), #004d55); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; box-shadow: 0 4px 14px var(--teal-glow); flex-shrink: 0; }
        .sb-logo-name { font-family: var(--fd); font-size: 1rem; color: #fff; line-height: 1.15; }
        .sb-logo-sub  { font-size: .58rem; color: rgba(255,255,255,.35); letter-spacing: .14em; text-transform: uppercase; margin-top: .12rem; }
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
        .sb-badge { margin-left: auto; font-size: .55rem; font-weight: 700; background: var(--teal); color: #fff; padding: .12rem .45rem; border-radius: 4px; }
        .sb-badge.warn { background: var(--coral); }
        .sb-foot { padding: 1rem 1.5rem; border-top: 1px solid rgba(255,255,255,.08); }
        .sb-logout { width: 100%; display: flex; align-items: center; justify-content: center; gap: .5rem; padding: .5rem; background: transparent; border: 1px solid rgba(255,255,255,.12); border-radius: var(--r); color: rgba(255,255,255,.4); font-size: .73rem; font-weight: 600; font-family: var(--fw); cursor: pointer; transition: var(--tr); }
        .sb-logout:hover { border-color: #f87171; color: #f87171; background: rgba(248,113,113,.08); }

        /* ══ MAIN ══ */
        .main { margin-left: 252px; flex: 1; display: flex; flex-direction: column; min-height: 100vh; }
        .topbar { background: var(--surface); border-bottom: 1px solid var(--rule); padding: .85rem 2rem; display: flex; align-items: center; justify-content: space-between; position: sticky; top: 0; z-index: 100; box-shadow: 0 1px 6px rgba(0,0,0,.06); }
        .topbar-crumb { font-size: .62rem; color: var(--ink-3); font-family: var(--fm); margin-bottom: .2rem; display: flex; align-items: center; gap: .3rem; }
        .topbar-title { font-family: var(--fd); font-size: 1.1rem; color: var(--ink); display: flex; align-items: center; gap: .55rem; }
        .topbar-title .pulse { width: 7px; height: 7px; background: var(--teal); border-radius: 50%; box-shadow: 0 0 0 3px var(--teal-lt); animation: pulse 2s ease-in-out infinite; }
        @keyframes pulse { 0%,100%{box-shadow:0 0 0 3px var(--teal-lt)} 50%{box-shadow:0 0 0 6px transparent} }
        .topbar-right { display: flex; align-items: center; gap: .6rem; }
        .content { padding: 1.8rem 2rem; flex: 1; }

        /* ══ BUTTONS ══ */
        .btn { display: inline-flex; align-items: center; gap: .38rem; font-family: var(--fw); font-size: .76rem; font-weight: 600; cursor: pointer; border: none; border-radius: var(--r); padding: .5rem 1rem; transition: var(--tr); white-space: nowrap; text-decoration: none; }
        .btn-teal    { background: var(--teal); color: #fff; box-shadow: 0 2px 10px var(--teal-glow); }
        .btn-teal:hover { background: #005560; transform: translateY(-1px); }
        .btn-ghost   { background: transparent; color: var(--ink-2); border: 1px solid var(--rule-2); }
        .btn-ghost:hover { background: var(--surface-2); }
        .btn-danger  { background: var(--coral-lt); color: var(--coral); border: 1px solid rgba(192,57,43,.2); }
        .btn-danger:hover { background: var(--coral); color: #fff; }
        .btn-sm { padding: .38rem .85rem; font-size: .72rem; }
        .btn-xs { padding: .22rem .55rem; font-size: .65rem; border-radius: 6px; }

        /* ══ CHIPS ══ */
        .chip { display: inline-flex; align-items: center; gap: .25rem; font-size: .6rem; font-weight: 700; padding: .2rem .55rem; border-radius: 6px; font-family: var(--fm); border: 1px solid; white-space: nowrap; }
        .chip::before { content: ''; width: 4px; height: 4px; border-radius: 50%; flex-shrink: 0; }
        .chip-ok     { background: var(--emerald-lt); color: var(--emerald); border-color: rgba(22,101,52,.2);  } .chip-ok::before     { background: var(--emerald); }
        .chip-warn   { background: var(--amber-lt);   color: var(--amber);   border-color: rgba(180,83,9,.2);   } .chip-warn::before   { background: var(--amber); }
        .chip-crit   { background: var(--coral-lt);   color: var(--coral);   border-color: rgba(192,57,43,.2);  } .chip-crit::before   { background: var(--coral); }
        .chip-info   { background: var(--teal-lt);    color: var(--teal);    border-color: rgba(0,109,119,.2);   } .chip-info::before   { background: var(--teal); }
        .chip-indigo { background: var(--indigo-lt);  color: var(--indigo);  border-color: rgba(55,48,163,.2);   } .chip-indigo::before { background: var(--indigo); }

        /* ══ CARD ══ */
        .card { background: var(--surface); border: 1px solid var(--rule); border-radius: var(--r-lg); overflow: hidden; box-shadow: 0 1px 6px rgba(0,0,0,.06); }
        .card-head { padding: .9rem 1.3rem; border-bottom: 1px solid var(--rule); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: .5rem; background: var(--surface-2); }
        .card-title { font-family: var(--fd); font-size: .95rem; color: var(--ink); display: flex; align-items: center; gap: .5rem; }
        .card-body { padding: 1.2rem; }

        /* ══ TABLE ══ */
        .tbl { width: 100%; border-collapse: collapse; font-size: .78rem; }
        .tbl thead { background: var(--surface-2); }
        .tbl th { padding: .55rem .9rem; text-align: left; font-size: .58rem; font-weight: 700; text-transform: uppercase; letter-spacing: .1em; color: var(--ink-3); border-bottom: 1px solid var(--rule); white-space: nowrap; }
        .tbl td { padding: .65rem .9rem; border-bottom: 1px solid var(--rule); color: var(--ink-2); vertical-align: middle; }
        .tbl tbody tr:last-child td { border-bottom: none; }
        .tbl tbody tr:hover td { background: var(--surface-2); }

        /* ══ RESPONSIVE ══ */
        @media (max-width: 800px) { .sidebar { display: none; } .main { margin-left: 0; } }
        @media print { .sidebar, .topbar, .no-print { display: none !important; } .main { margin-left: 0 !important; } body { background: #fff !important; } }

        /* ══ PAGE STYLES ══ */
        @yield('styles')
    </style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sb-head">
        <div class="sb-logo">
            <div class="sb-logo-mark">🏥</div>
            <div>
                <div class="sb-logo-name">Centre de Santé</div>
                <div class="sb-logo-sub">Jemaat Shaim · Safi</div>
            </div>
        </div>
        <div class="sb-user">
            <div class="sb-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'CS', 0, 2)) }}</div>
            <div>
                <div class="sb-user-name">{{ auth()->user()->name ?? 'Chef de Service' }}</div>
                <div class="sb-user-role">{{ auth()->user()->role ?? 'Administrateur' }}</div>
            </div>
        </div>
    </div>

    <nav class="sb-nav">
        <div class="sb-section">Principal</div>
        <a href="/dashboard/chef" class="sb-link {{ request()->is('dashboard/chef') ? 'active' : '' }}">
            <span class="sb-link-ico">⊞</span> Tableau de bord
        </a>

        <div class="sb-section">Gestion médicale</div>
        <a href="/patients"      class="sb-link {{ request()->is('patients*')      ? 'active' : '' }}">
            <span class="sb-link-ico">◯</span> Patients
        </a>
        <a href="/consultations" class="sb-link {{ request()->is('consultations*') ? 'active' : '' }}">
            <span class="sb-link-ico">✦</span> Consultations
        </a>
        <a href="/medicaments"   class="sb-link {{ request()->is('medicaments*')   ? 'active' : '' }}">
            <span class="sb-link-ico">⬡</span> Médicaments
        </a>

        <div class="sb-section">Services</div>
        <a href="/chroniques" class="sb-link {{ request()->is('chroniques*') ? 'active' : '' }}">
            <span class="sb-link-ico">♡</span> Maladies Chroniques
        </a>

        <div class="sb-section">Administration</div>
        <a href="/rapports"     class="sb-link {{ request()->is('rapports*')     ? 'active' : '' }}">
            <span class="sb-link-ico">▦</span> Rapports SREC
        </a>
        <a href="/appareils"    class="sb-link {{ request()->is('appareils*')    ? 'active' : '' }}">
            <span class="sb-link-ico">⊕</span> Appareils
        </a>
        <a href="/declarations" class="sb-link {{ request()->is('declarations*') ? 'active' : '' }}">
            <span class="sb-link-ico">📋</span> Déclarations
        </a>
        <a href="/conges"       class="sb-link {{ request()->is('conges*')       ? 'active' : '' }}">
            <span class="sb-link-ico">🏖</span> Congés
        </a>
        <a href="/users"        class="sb-link {{ request()->is('users*')        ? 'active' : '' }}">
            <span class="sb-link-ico">⚙</span> Utilisateurs
        </a>
    </nav>

    <div class="sb-foot">
        <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="sb-logout">⏻ &nbsp;Déconnexion</button>
        </form>
    </div>
</aside>

<!-- MAIN -->
<main class="main">
    <header class="topbar">
        <div>
            <div class="topbar-crumb">
                🏥 Centre de Santé Jemaat Shaim
                <span style="opacity:.4">›</span>
                @yield('breadcrumb', 'Dashboard')
            </div>
            <div class="topbar-title">
                <span class="pulse"></span>
                @yield('page-title', 'Tableau de bord')
            </div>
        </div>
        <div class="topbar-right no-print">
            @yield('topbar-actions')
        </div>
    </header>

    <div class="content">
        @yield('content')
    </div>
</main>

</body>
</html>