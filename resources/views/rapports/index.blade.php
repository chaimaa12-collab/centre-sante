<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Chef de Service — Centre de Santé Safi</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet"/>
    <style>
        :root {
            --bg:          #f5f4f0;
            --surface:     #ffffff;
            --surface-2:   #faf9f7;
            --surface-3:   #f0ede8;
            --surface-inv: #0f1923;

            --border:      #e4e0d8;
            --border-2:    #d0cbc0;

            --text:        #0f1923;
            --text-2:      #4a5568;
            --text-3:      #8a9ab0;
            --text-inv:    #ffffff;

            --teal:        #006b63;
            --teal-mid:    #008f85;
            --teal-light:  #e0f2f1;
            --teal-glow:   rgba(0,107,99,.15);

            --green:       #2d7d46;
            --green-light: #e8f5ed;
            --red:         #c0392b;
            --red-light:   #fdecea;
            --amber:       #b45309;
            --amber-light: #fef3c7;
            --blue:        #1e4e8c;
            --blue-light:  #e8f0fb;

            --shadow-sm:   0 1px 3px rgba(15,25,35,.06), 0 1px 2px rgba(15,25,35,.04);
            --shadow:      0 4px 16px rgba(15,25,35,.08), 0 1px 4px rgba(15,25,35,.04);
            --shadow-lg:   0 12px 40px rgba(15,25,35,.12), 0 2px 8px rgba(15,25,35,.06);

            --radius:      8px;
            --radius-md:   12px;
            --radius-lg:   16px;
            --radius-xl:   20px;

            --sidebar-w:   260px;

            --font-head:   'DM Serif Display', Georgia, serif;
            --font-ui:     'DM Sans', system-ui, sans-serif;
            --font-mono:   'DM Mono', 'Fira Mono', monospace;

            --transition:  .2s cubic-bezier(.4,0,.2,1);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0 }
        html { scroll-behavior: smooth }

        body {
            font-family: var(--font-ui);
            background: var(--bg);
            color: var(--text);
            display: flex;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        ::-webkit-scrollbar { width: 4px }
        ::-webkit-scrollbar-track { background: transparent }
        ::-webkit-scrollbar-thumb { background: var(--border-2); border-radius: 4px }

        /* ── SIDEBAR ─────────────────────────────────────── */
        .sidebar {
            width: var(--sidebar-w);
            background: var(--surface-inv);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0; bottom: 0;
            z-index: 300;
            overflow: hidden;
        }

        .sb-brand {
            padding: 1.6rem 1.5rem 1.3rem;
            border-bottom: 1px solid rgba(255,255,255,.07);
        }
        .sb-brand-top {
            display: flex;
            align-items: center;
            gap: .85rem;
            margin-bottom: .5rem;
        }
        .sb-mark {
            width: 40px; height: 40px;
            background: var(--teal);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .sb-mark svg { width: 20px; height: 20px; stroke: #fff; fill: none; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round }
        .sb-brand-name {
            font-family: var(--font-head);
            font-size: 1rem;
            color: #fff;
            line-height: 1.2;
        }
        .sb-brand-sub {
            font-size: .62rem;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: rgba(255,255,255,.35);
            margin-top: .15rem;
        }
        .sb-tagline {
            font-size: .68rem;
            color: rgba(255,255,255,.3);
            font-style: italic;
            font-family: var(--font-head);
            padding-top: .3rem;
        }

        .sb-user {
            margin: 1rem 1rem;
            background: rgba(255,255,255,.05);
            border: 1px solid rgba(255,255,255,.08);
            border-radius: var(--radius-md);
            padding: .85rem 1rem;
            display: flex;
            align-items: center;
            gap: .75rem;
        }
        .sb-avatar {
            width: 36px; height: 36px;
            background: linear-gradient(135deg, var(--teal), var(--teal-mid));
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            font-size: .75rem;
            font-weight: 700;
            color: #fff;
            flex-shrink: 0;
            letter-spacing: .02em;
        }
        .sb-user-name { font-size: .82rem; font-weight: 600; color: rgba(255,255,255,.9); line-height: 1.2 }
        .sb-user-role {
            font-size: .63rem;
            color: rgba(255,255,255,.4);
            margin-top: .18rem;
            display: flex;
            align-items: center;
            gap: .35rem;
        }
        .online-dot { width: 6px; height: 6px; background: #4ade80; border-radius: 50%; flex-shrink: 0 }

        .sb-nav { flex: 1; overflow-y: auto; padding: .5rem 0 1rem }

        .sb-group {
            font-size: .58rem;
            font-weight: 700;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: rgba(255,255,255,.25);
            padding: 1rem 1.5rem .4rem;
        }

        .sb-item {
            display: flex;
            align-items: center;
            gap: .7rem;
            padding: .6rem 1.5rem;
            font-size: .8rem;
            font-weight: 500;
            color: rgba(255,255,255,.5);
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            border-left: 2.5px solid transparent;
            position: relative;
        }
        .sb-item:hover { color: rgba(255,255,255,.85); background: rgba(255,255,255,.05) }
        .sb-item.active {
            color: #fff;
            background: rgba(0,143,133,.15);
            border-left-color: var(--teal-mid);
        }
        .sb-item-ico { width: 18px; height: 18px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; opacity: .6 }
        .sb-item.active .sb-item-ico { opacity: 1 }
        .sb-item-ico svg { width: 15px; height: 15px; stroke: currentColor; fill: none; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round }
        .sb-badge {
            margin-left: auto;
            background: rgba(0,143,133,.3);
            color: var(--teal-mid);
            font-size: .58rem;
            font-weight: 700;
            padding: .12rem .5rem;
            border-radius: 20px;
            font-family: var(--font-mono);
        }

        .sb-bottom {
            padding: 1rem;
            border-top: 1px solid rgba(255,255,255,.07);
        }
        .sb-logout {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            padding: .6rem;
            background: transparent;
            border: 1px solid rgba(255,255,255,.1);
            border-radius: var(--radius);
            color: rgba(255,255,255,.4);
            font-size: .75rem;
            font-weight: 500;
            font-family: var(--font-ui);
            cursor: pointer;
            transition: var(--transition);
        }
        .sb-logout:hover { border-color: var(--red); color: #fc8181; background: rgba(192,57,43,.1) }
        .sb-logout svg { width: 13px; height: 13px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round }

        /* ── MAIN ─────────────────────────────────────────── */
        .main { margin-left: var(--sidebar-w); flex: 1; display: flex; flex-direction: column; min-height: 100vh }

        .topbar {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: var(--shadow-sm);
        }
        .topbar-left {}
        .topbar-title {
            font-family: var(--font-head);
            font-size: 1.25rem;
            color: var(--text);
            letter-spacing: -.01em;
            display: flex;
            align-items: center;
            gap: .6rem;
        }
        .topbar-title-accent { color: var(--teal) }
        .topbar-sub {
            font-size: .68rem;
            color: var(--text-3);
            margin-top: .2rem;
            font-family: var(--font-mono);
            letter-spacing: .03em;
        }
        .topbar-actions { display: flex; align-items: center; gap: .6rem }

        .btn {
            display: inline-flex; align-items: center; gap: .45rem;
            font-family: var(--font-ui); font-size: .78rem; font-weight: 600;
            cursor: pointer; border: none; border-radius: var(--radius);
            padding: .55rem 1.15rem; transition: var(--transition);
            white-space: nowrap; text-decoration: none; letter-spacing: .01em;
        }
        .btn svg { width: 14px; height: 14px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round }

        .btn-primary { background: var(--teal); color: #fff; box-shadow: 0 1px 3px var(--teal-glow) }
        .btn-primary:hover { background: var(--teal-mid); box-shadow: 0 4px 16px var(--teal-glow); transform: translateY(-1px) }

        .btn-ghost { background: transparent; color: var(--text-2); border: 1px solid var(--border); }
        .btn-ghost:hover { background: var(--surface-3); border-color: var(--border-2); color: var(--text) }

        .btn-sm { padding: .42rem .9rem; font-size: .72rem }

        .divider-label {
            font-size: .62rem;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--text-3);
            display: flex;
            align-items: center;
            gap: .7rem;
            margin-bottom: 1.2rem;
        }
        .divider-label::after { content: ''; flex: 1; height: 1px; background: var(--border) }

        /* ── CONTENT ─────────────────────────────────────── */
        .content { padding: 2rem; flex: 1 }

        /* ── STATS ─────────────────────────────────────────  */
        .stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; margin-bottom: 2rem }
        .stat {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 1.3rem 1.4rem 1.1rem;
            position: relative;
            overflow: hidden;
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
        }
        .stat:hover { transform: translateY(-2px); box-shadow: var(--shadow) }

        .stat-stripe {
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            border-radius: 4px 4px 0 0;
        }
        .stat.teal .stat-stripe { background: var(--teal) }
        .stat.green .stat-stripe { background: var(--green) }
        .stat.amber .stat-stripe { background: var(--amber) }
        .stat.red .stat-stripe { background: var(--red) }

        .stat-header { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: .7rem }
        .stat-label { font-size: .62rem; font-weight: 700; text-transform: uppercase; letter-spacing: .1em; color: var(--text-3) }
        .stat-icon {
            width: 32px; height: 32px;
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .stat.teal .stat-icon { background: var(--teal-light); color: var(--teal) }
        .stat.green .stat-icon { background: var(--green-light); color: var(--green) }
        .stat.amber .stat-icon { background: var(--amber-light); color: var(--amber) }
        .stat.red .stat-icon { background: var(--red-light); color: var(--red) }
        .stat-icon svg { width: 16px; height: 16px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round }

        .stat-value {
            font-family: var(--font-head);
            font-size: 2.2rem;
            color: var(--text);
            line-height: 1;
            letter-spacing: -.03em;
            margin-bottom: .35rem;
        }
        .stat.teal .stat-value { color: var(--teal) }

        .stat-foot { display: flex; align-items: center; gap: .4rem }
        .stat-sub { font-size: .65rem; color: var(--text-3); font-family: var(--font-mono) }

        /* ── ALERTS ─────────────────────────────────────── */
        .alert {
            padding: .9rem 1.2rem;
            border-radius: var(--radius-md);
            font-size: .82rem;
            margin-bottom: 1.2rem;
            display: flex;
            align-items: center;
            gap: .7rem;
            border-width: 1px;
            border-style: solid;
        }
        .alert svg { width: 16px; height: 16px; stroke: currentColor; fill: none; stroke-width: 2; flex-shrink: 0 }
        .alert-success { background: var(--green-light); border-color: rgba(45,125,70,.2); color: var(--green) }
        .alert-error { background: var(--red-light); border-color: rgba(192,57,43,.2); color: var(--red) }

        /* ── CARD ─────────────────────────────────────────── */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-xl);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }
        .card-head {
            padding: 1.1rem 1.6rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: .7rem;
            background: var(--surface-2);
        }
        .card-title {
            font-family: var(--font-head);
            font-size: 1rem;
            color: var(--text);
            display: flex;
            align-items: center;
            gap: .6rem;
        }
        .card-title-badge {
            font-family: var(--font-mono);
            font-size: .6rem;
            font-weight: 500;
            background: var(--teal-light);
            color: var(--teal);
            padding: .15rem .5rem;
            border-radius: 4px;
            letter-spacing: .05em;
        }
        .card-body { padding: 1.6rem }

        /* ── TABS ─────────────────────────────────────────── */
        .tab-nav {
            display: flex;
            align-items: stretch;
            gap: .3rem;
            border-bottom: 2px solid var(--border);
            padding: 0 .5rem;
            overflow-x: auto;
            flex-wrap: nowrap;
            background: var(--surface-2);
        }
        .tab-btn {
            font-family: var(--font-ui);
            font-size: .76rem;
            font-weight: 600;
            color: var(--text-3);
            padding: .85rem 1.1rem;
            cursor: pointer;
            border: none;
            background: transparent;
            border-bottom: 2px solid transparent;
            position: relative;
            bottom: -2px;
            display: flex;
            align-items: center;
            gap: .45rem;
            transition: var(--transition);
            white-space: nowrap;
        }
        .tab-btn:hover { color: var(--text-2) }
        .tab-btn.active { color: var(--teal); border-bottom-color: var(--teal) }
        .tab-chip {
            background: var(--surface-3);
            color: var(--text-3);
            font-size: .58rem;
            font-weight: 700;
            padding: .1rem .4rem;
            border-radius: 4px;
            font-family: var(--font-mono);
        }
        .tab-btn.active .tab-chip { background: var(--teal-light); color: var(--teal) }

        .tab-panel { display: none }
        .tab-panel.active { display: block }

        /* ── FORM ELEMENTS ─────────────────────────────────── */
        .form-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem }
        .form-grid-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem; margin-bottom: 1rem }
        .form-grid-4 { display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap: .85rem; margin-bottom: 1rem }
        .form-group { display: flex; flex-direction: column; gap: .4rem }

        .form-label {
            font-size: .68rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .07em;
            color: var(--text-3);
        }
        .form-input, .form-select, .form-textarea {
            font-family: var(--font-ui);
            font-size: .84rem;
            color: var(--text);
            background: var(--surface);
            border: 1.5px solid var(--border);
            border-radius: var(--radius);
            padding: .62rem .9rem;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
            width: 100%;
        }
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            border-color: var(--teal);
            box-shadow: 0 0 0 3px var(--teal-glow);
        }
        .form-select { cursor: pointer; appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%238a9ab0' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right .8rem center; padding-right: 2.2rem }
        .form-textarea { resize: vertical; min-height: 80px; line-height: 1.65 }

        /* ── PANEL HEADER ─────────────────────────────────── */
        .panel-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: linear-gradient(135deg, var(--surface-2), var(--surface));
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            padding: 1rem 1.3rem;
            margin-bottom: 1.3rem;
        }
        .panel-header-icon {
            width: 44px; height: 44px;
            background: var(--teal-light);
            border-radius: var(--radius);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
        }
        .panel-header-title {
            font-family: var(--font-head);
            font-size: .95rem;
            color: var(--text);
        }
        .panel-header-sub { font-size: .68rem; color: var(--text-3); margin-top: .15rem }

        /* ── DATA SECTION ─────────────────────────────────── */
        .data-section {
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            overflow: hidden;
            margin-bottom: 1.2rem;
        }
        .data-section-head {
            background: var(--surface-3);
            padding: .65rem 1rem;
            font-size: .68rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: var(--teal);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: .45rem;
        }
        .data-section-body { padding: 1rem; background: var(--surface) }

        /* ── TABLE ─────────────────────────────────────────── */
        .data-table { width: 100%; border-collapse: collapse; font-size: .79rem }
        .data-table th {
            background: var(--surface-inv);
            color: rgba(255,255,255,.75);
            padding: .55rem .75rem;
            text-align: center;
            font-size: .62rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .07em;
            border: 1px solid rgba(255,255,255,.06);
        }
        .data-table th:first-child { text-align: left; border-radius: 0 }
        .data-table td {
            padding: .42rem .55rem;
            border: 1px solid var(--border);
            color: var(--text-2);
            vertical-align: middle;
        }
        .data-table tr:hover td { background: var(--surface-2) }
        .data-table td.row-label {
            font-size: .75rem;
            font-weight: 600;
            color: var(--text);
            background: var(--surface-2);
            white-space: nowrap;
            padding: .55rem .85rem;
            border-right: 2px solid var(--border-2);
        }
        .data-table input[type=number] {
            width: 100%;
            padding: .32rem .45rem;
            border: 1.5px solid var(--border);
            border-radius: 5px;
            font-size: .78rem;
            font-family: var(--font-mono);
            text-align: center;
            background: var(--surface);
            color: var(--text);
            outline: none;
            min-width: 52px;
            transition: border-color .15s, box-shadow .15s;
        }
        .data-table input[type=number]:focus {
            border-color: var(--teal);
            box-shadow: 0 0 0 2px var(--teal-glow);
        }
        .data-table input[type=number]:hover { border-color: var(--border-2) }

        /* ── FORM ACTIONS ─────────────────────────────────── */
        .form-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: .7rem;
            margin-top: 1.3rem;
            padding-top: 1.1rem;
            border-top: 1px solid var(--border);
        }

        /* ── PRINT ─────────────────────────────────────────── */
        .print-header { display: none }

        @media print {
            .sidebar, .topbar, .tab-nav, .no-print { display: none !important }
            .main { margin-left: 0 !important }
            body, .card, .data-section { background: #fff !important; color: #000 !important }
            .card { border: 1px solid #ccc !important; box-shadow: none !important }
            .panel-header { border: 1px solid #ccc !important; background: #f9f9f9 !important }
            .data-table th { background: #e8e8e8 !important; color: #000 !important; -webkit-print-color-adjust: exact; print-color-adjust: exact }
            .data-table td.row-label { background: #f4f4f4 !important; -webkit-print-color-adjust: exact; print-color-adjust: exact }
            .stats { display: none !important }
            .print-header { display: block !important; text-align: center; padding: 1.2rem; border-bottom: 2px solid #000; margin-bottom: 1.4rem }
            @page { margin: 1.5cm; size: A4 }
        }

        /* ── RESPONSIVE ─────────────────────────────────────── */
        @media (max-width: 1200px) { .stats { grid-template-columns: repeat(2, 1fr) } }
        @media (max-width: 900px) { .form-grid-2, .form-grid-3, .form-grid-4 { grid-template-columns: 1fr } }
        @media (max-width: 700px) { .sidebar { transform: translateX(-100%) } .main { margin-left: 0 } .stats { grid-template-columns: 1fr 1fr } }
    </style>
</head>
<body>

<!-- ═══════════════════════════════════════
     SIDEBAR
════════════════════════════════════════ -->
<aside class="sidebar">
    <div class="sb-brand">
        <div class="sb-brand-top">
            <div class="sb-mark">
                <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
            </div>
            <div>
                <div class="sb-brand-name">Centre de Santé</div>
                <div class="sb-brand-sub">Jemaat Shaim · Safi</div>
            </div>
        </div>
        <div class="sb-tagline">Région Marrakech-Safi · Maroc</div>
    </div>

    <div class="sb-user">
        <div class="sb-avatar">MC</div>
        <div>
            <div class="sb-user-name">Médecin Chef</div>
            <div class="sb-user-role">
                <span class="online-dot"></span>
                Administrateur · Actif
            </div>
        </div>
    </div>

    <nav class="sb-nav">
        <div class="sb-group">Principal</div>
        <a href="/dashboard/chef" class="sb-item active">
            <span class="sb-item-ico">
                <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
            </span>
            Tableau de bord
        </a>

        <div class="sb-group">Modules</div>
        <a href="/medicaments" class="sb-item">
            <span class="sb-item-ico">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><line x1="8" y1="12" x2="16" y2="12"/><line x1="12" y1="8" x2="12" y2="16"/></svg>
            </span>
            Médicaments
        </a>
        <a href="/appareils" class="sb-item">
            <span class="sb-item-ico">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M4.22 4.22l2.12 2.12M17.66 17.66l2.12 2.12M2 12h3M19 12h3M4.22 19.78l2.12-2.12M17.66 6.34l2.12-2.12"/></svg>
            </span>
            Appareils
        </a>
        <a href="/rapports" class="sb-item">
            <span class="sb-item-ico">
                <svg viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="9" y1="7" x2="15" y2="7"/><line x1="9" y1="11" x2="15" y2="11"/><line x1="9" y1="15" x2="12" y2="15"/></svg>
            </span>
            Rapports SREC
            <span class="sb-badge">SREC</span>
        </a>
        <a href="/conges" class="sb-item">
            <span class="sb-item-ico">
                <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            </span>
            Congés
        </a>
        <a href="/declarations" class="sb-item">
            <span class="sb-item-ico">
                <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
            </span>
            Déclarations
        </a>
    </nav>

    <div class="sb-bottom">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="sb-logout">
                <svg viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                Se déconnecter
            </button>
        </form>
    </div>
</aside>

<!-- ═══════════════════════════════════════
     MAIN
════════════════════════════════════════ -->
<main class="main">
    <header class="topbar">
        <div class="topbar-left">
            <div class="topbar-title">
                Chef de Service &nbsp;<span class="topbar-title-accent">—</span>&nbsp; Tableau de bord
            </div>
            <div class="topbar-sub">{{ now()->locale('fr')->isoFormat('dddd D MMMM YYYY') }}</div>
        </div>
        <div class="topbar-actions no-print">
            <button onclick="window.print()" class="btn btn-ghost btn-sm">
                <svg viewBox="0 0 24 24"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
                Exporter PDF
            </button>
            <button onclick="imprimerRapport()" class="btn btn-primary btn-sm">
                <svg viewBox="0 0 24 24"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
                Imprimer l'onglet actif
            </button>
        </div>
    </header>

    <div class="content">

        @if(session('success'))
            <div class="alert alert-success">
                <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-error">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                @foreach($errors->all() as $e) {{ $e }} @endforeach
            </div>
        @endif

        <!-- ── STATS ── -->
        <div class="divider-label">Indicateurs du mois</div>
        <div class="stats">
            <div class="stat teal">
                <div class="stat-stripe"></div>
                <div class="stat-header">
                    <div class="stat-label">Patients actifs</div>
                    <div class="stat-icon">
                        <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                </div>
                <div class="stat-value">{{ $totalPatients ?? 0 }}</div>
                <div class="stat-foot">
                    <div class="stat-sub">Suivis ce mois</div>
                </div>
            </div>
            <div class="stat green">
                <div class="stat-stripe"></div>
                <div class="stat-header">
                    <div class="stat-label">Consultations</div>
                    <div class="stat-icon">
                        <svg viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                    </div>
                </div>
                <div class="stat-value">{{ $totalConsultations ?? 0 }}</div>
                <div class="stat-foot">
                    <div class="stat-sub">Total mensuel</div>
                </div>
            </div>
            <div class="stat amber">
                <div class="stat-stripe"></div>
                <div class="stat-header">
                    <div class="stat-label">Vaccinations</div>
                    <div class="stat-icon">
                        <svg viewBox="0 0 24 24"><path d="m19 9-1.25-2.5L20 5l-1-2-1.25 2.5L15 4l1.25 2.5-2.25 1.5L15.5 11"/><path d="m6.5 11.5-4 4L4 17l6-1"/><path d="m9 13 3.5-3.5"/><circle cx="10" cy="17" r="3"/></svg>
                    </div>
                </div>
                <div class="stat-value">{{ $totalVaccinations ?? 0 }}</div>
                <div class="stat-foot">
                    <div class="stat-sub">Enfants 0-11 mois</div>
                </div>
            </div>
            <div class="stat red">
                <div class="stat-stripe"></div>
                <div class="stat-header">
                    <div class="stat-label">Rapports</div>
                    <div class="stat-icon">
                        <svg viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="9" y1="7" x2="15" y2="7"/><line x1="9" y1="11" x2="15" y2="11"/><line x1="9" y1="15" x2="12" y2="15"/></svg>
                    </div>
                </div>
                <div class="stat-value">{{ $totalRapports ?? 0 }}</div>
                <div class="stat-foot">
                    <div class="stat-sub">Enregistrés ce mois</div>
                </div>
            </div>
        </div>

        <!-- ── RAPPORT CARD ── -->
        <div class="divider-label">Rapport mensuel SREC</div>
        <div class="card">
            <div class="card-head">
                <div class="card-title">
                    Rapport Mensuel des Activités
                    <span class="card-title-badge">SREC</span>
                </div>
                <div style="font-size:.7rem;color:var(--text-3);font-family:var(--font-mono)">
                    Ministère de la Santé · Région Marrakech-Safi
                </div>
            </div>

            <!-- Print header (hidden on screen) -->
            <div class="print-header" id="printHeader">
                <h2 style="font-size:1.1rem;font-family:var(--font-head);">Ministère de la Santé et de la Protection Sociale</h2>
                <p style="color:#555;font-size:.85rem;">Royaume du Maroc · Région : Marrakech-Safi · Province : Safi</p>
                <p style="color:#555;font-size:.85rem;">Établissement : Jemaat Shaim · Année : {{ date('Y') }} · Mois : <span id="printMois"></span></p>
                <p style="margin-top:.6rem;font-weight:600;font-size:.8rem;" id="printDate"></p>
            </div>

            <!-- Tab Navigation -->
            <nav class="tab-nav no-print">
                <button class="tab-btn active" onclick="showTab('tab-pf',this)">
                    Planification Familiale <span class="tab-chip">PF</span>
                </button>
                <button class="tab-btn" onclick="showTab('tab-cpn',this)">
                    Consultation Prénatale <span class="tab-chip">CPN</span>
                </button>
                <button class="tab-btn" onclick="showTab('tab-acc',this)">
                    Accouchement <span class="tab-chip">ACC</span>
                </button>
                <button class="tab-btn" onclick="showTab('tab-vacc',this)">
                    Vaccination <span class="tab-chip">VAC</span>
                </button>
                <button class="tab-btn" onclick="showTab('tab-consult',this)">
                    Enfants &lt; 5 ans <span class="tab-chip">ENF</span>
                </button>
                <button class="tab-btn" onclick="showTab('tab-chron',this)">
                    Maladies Chroniques <span class="tab-chip">CHR</span>
                </button>
            </nav>

            <div class="card-body">

                <!-- ────── PF ────── -->
                <div id="tab-pf" class="tab-panel active">
                    <div class="panel-header">
                        <div class="panel-header-icon">📌</div>
                        <div>
                            <div class="panel-header-title">Planification Familiale – Contraception</div>
                            <div class="panel-header-sub">Programme National de Planification Familiale</div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('rapports.store') }}">
                        @csrf
                        <input type="hidden" name="type_rapport" value="pf"/>
                        <div class="form-grid-2">
                            <div class="form-group">
                                <label class="form-label">Mois de référence</label>
                                <select class="form-select" name="mois" required>
                                    @php
                                        $moisListe=['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'];
                                        $annee=date('Y');
                                    @endphp
                                    @foreach($moisListe as $m)
                                        <option value="{{ $m }} {{ $annee }}">{{ $m }} {{ $annee }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Circonscription</label>
                                <input type="text" class="form-input" name="circonscription" value="Safi"/>
                            </div>
                        </div>

                        <div class="data-section">
                            <div class="data-section-head">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                                1. Performances
                            </div>
                            <div class="data-section-body">
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th style="text-align:left;">Indicateur</th>
                                            <th>Urbaine</th><th>Rurale</th><th>Ensemble</th><th>Dont rural mobile</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><td class="row-label">Nouvelles clientes PNPF</td><td><input type="number" name="pf_nouvelles_urb" min="0" value="0"/></td><td><input type="number" name="pf_nouvelles_rur" min="0" value="0"/></td><td><input type="number" name="pf_nouvelles_total" min="0" value="0"/></td><td><input type="number" name="pf_nouvelles_mobile" min="0" value="0"/></td></tr>
                                        <tr><td class="row-label">Clientes de retour</td><td><input type="number" name="pf_retour_urb" min="0" value="0"/></td><td><input type="number" name="pf_retour_rur" min="0" value="0"/></td><td><input type="number" name="pf_retour_total" min="0" value="0"/></td><td><input type="number" name="pf_retour_mobile" min="0" value="0"/></td></tr>
                                        <tr><td class="row-label">Insertions DIU</td><td><input type="number" name="pf_diu_urb" min="0" value="0"/></td><td><input type="number" name="pf_diu_rur" min="0" value="0"/></td><td><input type="number" name="pf_diu_total" min="0" value="0"/></td><td><input type="number" name="pf_diu_mobile" min="0" value="0"/></td></tr>
                                        <tr><td class="row-label">Injectables</td><td><input type="number" name="pf_inj_urb" min="0" value="0"/></td><td><input type="number" name="pf_inj_rur" min="0" value="0"/></td><td><input type="number" name="pf_inj_total" min="0" value="0"/></td><td><input type="number" name="pf_inj_mobile" min="0" value="0"/></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="reset" class="btn btn-ghost btn-sm">
                                <svg viewBox="0 0 24 24" width="13" height="13" stroke="currentColor" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 .49-3.51"/></svg>
                                Réinitialiser
                            </button>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <svg viewBox="0 0 24 24" width="13" height="13" stroke="currentColor" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                                Enregistrer PF
                            </button>
                        </div>
                    </form>
                </div>

                <!-- ────── CPN ────── -->
                <div id="tab-cpn" class="tab-panel">
                    <div class="panel-header">
                        <div class="panel-header-icon">🤰</div>
                        <div>
                            <div class="panel-header-title">Consultation Prénatale</div>
                            <div class="panel-header-sub">Suivi de grossesse</div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('rapports.store') }}">
                        @csrf
                        <input type="hidden" name="type_rapport" value="cpn"/>
                        <div class="form-group" style="max-width:260px;margin-bottom:1rem">
                            <label class="form-label">Mois de référence</label>
                            <select class="form-select" name="mois" required>
                                @foreach($moisListe as $m)
                                    <option value="{{ $m }} {{ $annee }}">{{ $m }} {{ $annee }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="data-section">
                            <div class="data-section-head">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                                Consultations prénatales par trimestre
                            </div>
                            <div class="data-section-body">
                                <table class="data-table">
                                    <thead>
                                        <tr><th style="text-align:left;">Type</th><th>Urbaine</th><th>Rurale</th><th>Ensemble</th><th>Mobile</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr><td class="row-label">CPN 1er trimestre (≤ 15 SA)</td><td><input type="number" name="cpn_1er_trim_urb" min="0" value="0"/></td><td><input type="number" name="cpn_1er_trim_rur" min="0" value="0"/></td><td><input type="number" name="cpn_1er_trim_total" min="0" value="0"/></td><td><input type="number" name="cpn_1er_trim_mobile" min="0" value="0"/></td></tr>
                                        <tr><td class="row-label">CPN 2ème trimestre (24–28 SA)</td><td><input type="number" name="cpn_2e_trim_urb" min="0" value="0"/></td><td><input type="number" name="cpn_2e_trim_rur" min="0" value="0"/></td><td><input type="number" name="cpn_2e_trim_total" min="0" value="0"/></td><td><input type="number" name="cpn_2e_trim_mobile" min="0" value="0"/></td></tr>
                                        <tr><td class="row-label">CPN 3ème trimestre (32–34 SA)</td><td><input type="number" name="cpn_3e_trim_urb" min="0" value="0"/></td><td><input type="number" name="cpn_3e_trim_rur" min="0" value="0"/></td><td><input type="number" name="cpn_3e_trim_total" min="0" value="0"/></td><td><input type="number" name="cpn_3e_trim_mobile" min="0" value="0"/></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="reset" class="btn btn-ghost btn-sm">Réinitialiser</button>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <svg viewBox="0 0 24 24" width="13" height="13" stroke="currentColor" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                                Enregistrer CPN
                            </button>
                        </div>
                    </form>
                </div>

                <!-- ────── ACCOUCHEMENT ────── -->
                <div id="tab-acc" class="tab-panel">
                    <div class="panel-header">
                        <div class="panel-header-icon">🚼</div>
                        <div>
                            <div class="panel-header-title">Accouchement et Suites de Couches</div>
                            <div class="panel-header-sub">Mères et nouveau-nés</div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('rapports.store') }}">
                        @csrf
                        <input type="hidden" name="type_rapport" value="accouchement"/>
                        <div class="form-group" style="max-width:260px;margin-bottom:1rem">
                            <label class="form-label">Mois de référence</label>
                            <select class="form-select" name="mois" required>
                                @foreach($moisListe as $m)
                                    <option value="{{ $m }} {{ $annee }}">{{ $m }} {{ $annee }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="data-section">
                            <div class="data-section-head">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                                Accouchements
                            </div>
                            <div class="data-section-body">
                                <table class="data-table">
                                    <thead>
                                        <tr><th style="text-align:left;">Type d'accouchement</th><th>Urbaine</th><th>Rurale</th><th>Total</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr><td class="row-label">Voie basse non instrumentale</td><td><input type="number" name="acc_vb_urb" min="0" value="0"/></td><td><input type="number" name="acc_vb_rur" min="0" value="0"/></td><td><input type="number" name="acc_vb_total" min="0" value="0"/></td></tr>
                                        <tr><td class="row-label">Voie basse instrumentale</td><td><input type="number" name="acc_vbi_urb" min="0" value="0"/></td><td><input type="number" name="acc_vbi_rur" min="0" value="0"/></td><td><input type="number" name="acc_vbi_total" min="0" value="0"/></td></tr>
                                        <tr><td class="row-label">Césariennes</td><td><input type="number" name="acc_cesar_urb" min="0" value="0"/></td><td><input type="number" name="acc_cesar_rur" min="0" value="0"/></td><td><input type="number" name="acc_cesar_total" min="0" value="0"/></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="reset" class="btn btn-ghost btn-sm">Réinitialiser</button>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <svg viewBox="0 0 24 24" width="13" height="13" stroke="currentColor" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                                Enregistrer Accouchements
                            </button>
                        </div>
                    </form>
                </div>

                <!-- ────── VACCINATION ────── -->
                <div id="tab-vacc" class="tab-panel">
                    <div class="panel-header">
                        <div class="panel-header-icon">💉</div>
                        <div>
                            <div class="panel-header-title">Vaccination</div>
                            <div class="panel-header-sub">Programme National d'Immunisation</div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('rapports.store') }}">
                        @csrf
                        <input type="hidden" name="type_rapport" value="vaccination"/>
                        <div class="form-group" style="max-width:260px;margin-bottom:1rem">
                            <label class="form-label">Mois de référence</label>
                            <select class="form-select" name="mois" required>
                                @foreach($moisListe as $m)
                                    <option value="{{ $m }} {{ $annee }}">{{ $m }} {{ $annee }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="data-section">
                            <div class="data-section-head">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                                Enfants 0–11 mois
                            </div>
                            <div class="data-section-body">
                                <table class="data-table">
                                    <thead>
                                        <tr><th style="text-align:left;">Antigène</th><th>Garçons</th><th>Filles</th><th>Total</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr><td class="row-label">BCG</td><td><input type="number" name="vacc_bcg_g" min="0" value="0"/></td><td><input type="number" name="vacc_bcg_f" min="0" value="0"/></td><td><input type="number" name="vacc_bcg_total" min="0" value="0"/></td></tr>
                                        <tr><td class="row-label">Penta 1</td><td><input type="number" name="vacc_penta1_g" min="0" value="0"/></td><td><input type="number" name="vacc_penta1_f" min="0" value="0"/></td><td><input type="number" name="vacc_penta1_total" min="0" value="0"/></td></tr>
                                        <tr><td class="row-label">Penta 2</td><td><input type="number" name="vacc_penta2_g" min="0" value="0"/></td><td><input type="number" name="vacc_penta2_f" min="0" value="0"/></td><td><input type="number" name="vacc_penta2_total" min="0" value="0"/></td></tr>
                                        <tr><td class="row-label">Penta 3</td><td><input type="number" name="vacc_penta3_g" min="0" value="0"/></td><td><input type="number" name="vacc_penta3_f" min="0" value="0"/></td><td><input type="number" name="vacc_penta3_total" min="0" value="0"/></td></tr>
                                        <tr><td class="row-label">RR 1</td><td><input type="number" name="vacc_rr1_g" min="0" value="0"/></td><td><input type="number" name="vacc_rr1_f" min="0" value="0"/></td><td><input type="number" name="vacc_rr1_total" min="0" value="0"/></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="reset" class="btn btn-ghost btn-sm">Réinitialiser</button>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <svg viewBox="0 0 24 24" width="13" height="13" stroke="currentColor" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                                Enregistrer Vaccination
                            </button>
                        </div>
                    </form>
                </div>

                <!-- ────── ENFANT < 5 ANS ────── -->
                <div id="tab-consult" class="tab-panel">
                    <div class="panel-header">
                        <div class="panel-header-icon">🩺</div>
                        <div>
                            <div class="panel-header-title">Consultation Médicale de l'Enfant de Moins de 5 ans</div>
                            <div class="panel-header-sub">Suivi et diagnostics pédiatriques</div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('rapports.store') }}">
                        @csrf
                        <input type="hidden" name="type_rapport" value="enfant"/>
                        <div class="form-group" style="max-width:260px;margin-bottom:1rem">
                            <label class="form-label">Mois de référence</label>
                            <select class="form-select" name="mois" required>
                                @foreach($moisListe as $m)
                                    <option value="{{ $m }} {{ $annee }}">{{ $m }} {{ $annee }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="data-section">
                            <div class="data-section-head">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                                Visites médicales
                            </div>
                            <div class="data-section-body">
                                <div class="form-grid-3">
                                    <div class="form-group">
                                        <label class="form-label">Visites 0–2 mois</label>
                                        <input type="number" class="form-input" name="enf_visites_0_2" min="0" value="0" style="font-family:var(--font-mono)"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Visites 2–59 mois</label>
                                        <input type="number" class="form-input" name="enf_visites_2_59" min="0" value="0" style="font-family:var(--font-mono)"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Premiers contacts</label>
                                        <input type="number" class="form-input" name="enf_premiers_contacts" min="0" value="0" style="font-family:var(--font-mono)"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="reset" class="btn btn-ghost btn-sm">Réinitialiser</button>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <svg viewBox="0 0 24 24" width="13" height="13" stroke="currentColor" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                                Enregistrer Consultations
                            </button>
                        </div>
                    </form>
                </div>

                <!-- ────── MALADIES CHRONIQUES ────── -->
                <div id="tab-chron" class="tab-panel">
                    <div class="panel-header">
                        <div class="panel-header-icon">❤️</div>
                        <div>
                            <div class="panel-header-title">Suivi des Maladies Chroniques</div>
                            <div class="panel-header-sub">Diabète et Hypertension Artérielle</div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('rapports.store') }}">
                        @csrf
                        <input type="hidden" name="type_rapport" value="chroniques"/>
                        <div class="form-group" style="max-width:260px;margin-bottom:1rem">
                            <label class="form-label">Mois de référence</label>
                            <select class="form-select" name="mois" required>
                                @foreach($moisListe as $m)
                                    <option value="{{ $m }} {{ $annee }}">{{ $m }} {{ $annee }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="data-section">
                            <div class="data-section-head">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                                Diabète
                            </div>
                            <div class="data-section-body">
                                <div class="form-grid-4">
                                    <div class="form-group"><label class="form-label">Nouveaux cas</label><input type="number" class="form-input" name="diab_nouveaux" min="0" value="0" style="font-family:var(--font-mono)"/></div>
                                    <div class="form-group"><label class="form-label">Anciens cas</label><input type="number" class="form-input" name="diab_anciens" min="0" value="0" style="font-family:var(--font-mono)"/></div>
                                    <div class="form-group"><label class="form-label">Masculin</label><input type="number" class="form-input" name="diab_m" min="0" value="0" style="font-family:var(--font-mono)"/></div>
                                    <div class="form-group"><label class="form-label">Féminin</label><input type="number" class="form-input" name="diab_f" min="0" value="0" style="font-family:var(--font-mono)"/></div>
                                </div>
                            </div>
                        </div>

                        <div class="data-section">
                            <div class="data-section-head">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                                Hypertension Artérielle
                            </div>
                            <div class="data-section-body">
                                <div class="form-grid-4">
                                    <div class="form-group"><label class="form-label">Nouveaux cas</label><input type="number" class="form-input" name="hta_nouveaux" min="0" value="0" style="font-family:var(--font-mono)"/></div>
                                    <div class="form-group"><label class="form-label">Anciens cas</label><input type="number" class="form-input" name="hta_anciens" min="0" value="0" style="font-family:var(--font-mono)"/></div>
                                    <div class="form-group"><label class="form-label">Masculin</label><input type="number" class="form-input" name="hta_m" min="0" value="0" style="font-family:var(--font-mono)"/></div>
                                    <div class="form-group"><label class="form-label">Féminin</label><input type="number" class="form-input" name="hta_f" min="0" value="0" style="font-family:var(--font-mono)"/></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="reset" class="btn btn-ghost btn-sm">Réinitialiser</button>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <svg viewBox="0 0 24 24" width="13" height="13" stroke="currentColor" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                                Enregistrer Chroniques
                            </button>
                        </div>
                    </form>
                </div>

            </div><!-- /card-body -->
        </div><!-- /card -->

    </div><!-- /content -->
</main>

<script>
function showTab(id, btn) {
    document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.getElementById(id).classList.add('active');
    btn.classList.add('active');
}

function imprimerRapport() {
    const activePanel = document.querySelector('.tab-panel.active');
    if (!activePanel) return;
    const moisSelect = activePanel.querySelector('select[name="mois"]');
    const moisValue = moisSelect ? moisSelect.value : '';
    const now = new Date();
    const dateStr = now.toLocaleDateString('fr-FR', { weekday:'long', year:'numeric', month:'long', day:'numeric' });
    document.getElementById('printDate').textContent = 'Imprimé le ' + dateStr;
    document.getElementById('printMois').textContent = moisValue;
    window.print();
}
</script>
</body>
</html>