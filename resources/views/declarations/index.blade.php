<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Déclarations — Centre de Santé Safi</title>
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
            --r:     8px;
            --r-lg:  14px;
            --r-xl:  20px;
            --tr:    .16s ease;
            --sh-sm: 0 1px 6px rgba(0,0,0,.06),0 0 0 1px rgba(0,0,0,.04);
            --sh-md: 0 4px 20px rgba(0,0,0,.08),0 1px 4px rgba(0,0,0,.04);
            --sh-lg: 0 16px 48px rgba(0,0,0,.11),0 2px 8px rgba(0,0,0,.05);
            --fw: 'DM Sans', sans-serif;
            --fd: 'DM Serif Display', serif;
            --fm: 'DM Mono', monospace;
        }
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        body{font-family:var(--fw);background:var(--paper);color:var(--ink);display:flex;min-height:100vh;-webkit-font-smoothing:antialiased}
        ::-webkit-scrollbar{width:4px}
        ::-webkit-scrollbar-thumb{background:var(--ink-4);border-radius:2px}

        /* SIDEBAR */
        .sidebar{width:252px;background:var(--ink);display:flex;flex-direction:column;position:fixed;top:0;left:0;bottom:0;z-index:300;flex-shrink:0}
        .sb-head{padding:1.6rem 1.5rem 1.2rem;border-bottom:1px solid rgba(255,255,255,.08)}
        .sb-logo{display:flex;align-items:center;gap:.8rem;margin-bottom:1rem}
        .sb-logo-mark{width:38px;height:38px;background:linear-gradient(135deg,var(--teal),#004d55);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.1rem;box-shadow:0 4px 14px var(--teal-glow);flex-shrink:0}
        .sb-logo-name{font-family:var(--fd);font-size:1rem;color:#fff;line-height:1.15;letter-spacing:-.01em}
        .sb-logo-sub{font-size:.58rem;color:rgba(255,255,255,.35);letter-spacing:.14em;text-transform:uppercase;margin-top:.12rem}
        .sb-user{display:flex;align-items:center;gap:.7rem}
        .sb-avatar{width:30px;height:30px;background:rgba(0,109,119,.4);border:1.5px solid var(--teal);border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:.65rem;font-weight:700;color:#83d9df;flex-shrink:0}
        .sb-user-name{font-size:.78rem;font-weight:600;color:rgba(255,255,255,.85)}
        .sb-user-role{font-size:.6rem;color:rgba(255,255,255,.35);margin-top:.08rem;display:flex;align-items:center;gap:.3rem}
        .sb-user-role::before{content:'';width:5px;height:5px;background:#4ade80;border-radius:50%;box-shadow:0 0 5px #4ade80}
        .sb-nav{flex:1;overflow-y:auto;padding:.8rem 0}
        .sb-section{font-size:.54rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.25);padding:.9rem 1.5rem .3rem}
        .sb-link{display:flex;align-items:center;gap:.65rem;padding:.52rem 1.5rem;font-size:.77rem;font-weight:500;color:rgba(255,255,255,.5);text-decoration:none;border-left:2px solid transparent;transition:var(--tr)}
        .sb-link:hover{color:rgba(255,255,255,.85);background:rgba(255,255,255,.05)}
        .sb-link.active{color:#fff;background:rgba(0,109,119,.25);border-left-color:var(--teal);font-weight:600}
        .sb-link-ico{width:16px;display:flex;align-items:center;justify-content:center;font-size:.85rem;flex-shrink:0;opacity:.7}
        .sb-link.active .sb-link-ico{opacity:1}
        .sb-foot{padding:1rem 1.5rem;border-top:1px solid rgba(255,255,255,.08)}
        .sb-logout{width:100%;display:flex;align-items:center;justify-content:center;gap:.5rem;padding:.5rem;background:transparent;border:1px solid rgba(255,255,255,.12);border-radius:var(--r);color:rgba(255,255,255,.4);font-size:.73rem;font-weight:600;font-family:var(--fw);cursor:pointer;transition:var(--tr)}
        .sb-logout:hover{border-color:#f87171;color:#f87171;background:rgba(248,113,113,.08)}

        /* MAIN */
        .main{margin-left:252px;flex:1;display:flex;flex-direction:column;min-height:100vh}
        .topbar{background:var(--surface);border-bottom:1px solid var(--rule);padding:.85rem 2rem;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:100;box-shadow:var(--sh-sm)}
        .topbar-crumb{font-size:.62rem;color:var(--ink-3);font-family:var(--fm);margin-bottom:.2rem;display:flex;align-items:center;gap:.3rem}
        .topbar-title{font-family:var(--fd);font-size:1.1rem;color:var(--ink);display:flex;align-items:center;gap:.55rem}
        .topbar-title .pulse{width:7px;height:7px;background:var(--teal);border-radius:50%;box-shadow:0 0 0 3px var(--teal-lt);animation:pulse 2s ease-in-out infinite}
        @keyframes pulse{0%,100%{box-shadow:0 0 0 3px var(--teal-lt)}50%{box-shadow:0 0 0 6px transparent}}
        .topbar-right{display:flex;align-items:center;gap:.6rem}

        /* BUTTONS */
        .btn{display:inline-flex;align-items:center;gap:.38rem;font-family:var(--fw);font-size:.76rem;font-weight:600;cursor:pointer;border:none;border-radius:var(--r);padding:.5rem 1rem;transition:var(--tr);white-space:nowrap;text-decoration:none}
        .btn-teal{background:var(--teal);color:#fff;box-shadow:0 2px 10px var(--teal-glow)}
        .btn-teal:hover{background:#005560;transform:translateY(-1px)}
        .btn-ghost{background:transparent;color:var(--ink-2);border:1px solid var(--rule-2)}
        .btn-ghost:hover{background:var(--surface-2)}
        .btn-danger{background:var(--coral-lt);color:var(--coral);border:1px solid rgba(192,57,43,.2)}
        .btn-danger:hover{background:var(--coral);color:#fff}
        .btn-sm{padding:.38rem .85rem;font-size:.72rem}
        .btn-xs{padding:.22rem .55rem;font-size:.65rem;border-radius:6px}

        /* CONTENT */
        .content{padding:1.8rem 2rem;flex:1}

        /* KPI STRIP */
        .kpi-strip{display:grid;grid-template-columns:repeat(4,1fr);gap:.85rem;margin-bottom:1.8rem}
        .kpi{background:var(--surface);border:1px solid var(--rule);border-radius:var(--r-lg);padding:1rem 1.1rem;position:relative;overflow:hidden;box-shadow:var(--sh-sm);transition:var(--tr)}
        .kpi:hover{box-shadow:var(--sh-md);transform:translateY(-2px)}
        .kpi-top{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:.5rem}
        .kpi-label{font-size:.58rem;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:var(--ink-3)}
        .kpi-ico{font-size:1.1rem;opacity:.45}
        .kpi-val{font-family:var(--fd);font-size:1.8rem;line-height:1;letter-spacing:-.03em}
        .kpi-foot{font-size:.62rem;color:var(--ink-3);margin-top:.3rem;font-family:var(--fm)}
        .kpi-bar{position:absolute;bottom:0;left:0;right:0;height:2.5px}
        .c-teal{color:var(--teal)}.b-teal{background:var(--teal)}
        .c-amber{color:var(--amber)}.b-amber{background:var(--amber)}
        .c-emerald{color:var(--emerald)}.b-emerald{background:var(--emerald)}
        .c-coral{color:var(--coral)}.b-coral{background:var(--coral)}
        .c-indigo{color:var(--indigo)}.b-indigo{background:var(--indigo)}

        /* CARD */
        .card{background:var(--surface);border:1px solid var(--rule);border-radius:var(--r-lg);overflow:hidden;box-shadow:var(--sh-sm);margin-bottom:1.5rem}
        .card-head{padding:.9rem 1.4rem;border-bottom:1px solid var(--rule);display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.6rem;background:var(--surface-2)}
        .card-title{font-family:var(--fd);font-size:.98rem;color:var(--ink);display:flex;align-items:center;gap:.5rem}
        .card-body{padding:1.4rem}

        /* ALERT */
        .flash{padding:.8rem 1.1rem;border-radius:var(--r);font-size:.82rem;margin-bottom:1.2rem;display:flex;align-items:center;gap:.6rem;animation:fadeUp .3s ease}
        .flash-ok{background:var(--emerald-lt);border:1px solid rgba(22,101,52,.2);color:var(--emerald)}
        .flash-err{background:var(--coral-lt);border:1px solid rgba(192,57,43,.2);color:var(--coral)}

        /* FORM */
        .form-grid-2{display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-bottom:1rem}
        .form-grid-3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:1rem;margin-bottom:1rem}
        .form-group{margin-bottom:.9rem}
        .form-label{display:block;font-size:.6rem;font-weight:700;color:var(--ink-3);text-transform:uppercase;letter-spacing:.1em;margin-bottom:.32rem}
        .form-input,.form-select,.form-textarea{width:100%;padding:.58rem .85rem;border:1px solid var(--rule-2);border-radius:var(--r);font-size:.82rem;font-family:var(--fw);color:var(--ink);background:var(--surface-2);outline:none;transition:var(--tr)}
        .form-input:focus,.form-select:focus,.form-textarea:focus{border-color:var(--teal);background:var(--surface);box-shadow:0 0 0 3px var(--teal-lt)}
        .form-textarea{resize:vertical;min-height:76px;line-height:1.6}
        .form-select{cursor:pointer}
        .form-input.error{border-color:var(--coral);box-shadow:0 0 0 3px var(--coral-lt)}
        .field-error{font-size:.65rem;color:var(--coral);margin-top:.25rem}

        /* SECTION BAND */
        .section-band{background:var(--surface-2);border:1px solid var(--rule);border-radius:var(--r-lg);padding:1.1rem 1.3rem;margin-bottom:1.2rem}
        .section-band-title{font-size:.6rem;font-weight:700;text-transform:uppercase;letter-spacing:.12em;color:var(--teal);margin-bottom:.9rem;display:flex;align-items:center;gap:.4rem;padding-bottom:.55rem;border-bottom:1px solid var(--rule)}

        /* CHIPS */
        .chip{display:inline-flex;align-items:center;gap:.25rem;font-size:.6rem;font-weight:700;padding:.2rem .55rem;border-radius:6px;font-family:var(--fm);border:1px solid;white-space:nowrap}
        .chip::before{content:'';width:4px;height:4px;border-radius:50%;flex-shrink:0}
        .chip-ok    {background:var(--emerald-lt);color:var(--emerald);border-color:rgba(22,101,52,.2)}.chip-ok::before{background:var(--emerald)}
        .chip-warn  {background:var(--amber-lt);color:var(--amber);border-color:rgba(180,83,9,.2)}.chip-warn::before{background:var(--amber)}
        .chip-crit  {background:var(--coral-lt);color:var(--coral);border-color:rgba(192,57,43,.2)}.chip-crit::before{background:var(--coral)}
        .chip-info  {background:var(--teal-lt);color:var(--teal);border-color:rgba(0,109,119,.2)}.chip-info::before{background:var(--teal)}
        .chip-indigo{background:var(--indigo-lt);color:var(--indigo);border-color:rgba(55,48,163,.2)}.chip-indigo::before{background:var(--indigo)}

        /* TABLE */
        .tbl-wrap{overflow-x:auto}
        .tbl{width:100%;border-collapse:collapse;font-size:.79rem}
        .tbl thead{background:var(--surface-2)}
        .tbl th{padding:.58rem 1rem;text-align:left;font-size:.58rem;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:var(--ink-3);border-bottom:1px solid var(--rule);white-space:nowrap}
        .tbl td{padding:.68rem 1rem;border-bottom:1px solid var(--rule);color:var(--ink-2);vertical-align:middle}
        .tbl tbody tr:last-child td{border-bottom:none}
        .tbl tbody tr:hover td{background:var(--surface-2)}
        .tbl td.agent-name{font-weight:700;color:var(--ink)}
        .tbl td.mono{font-family:var(--fm);font-size:.72rem;color:var(--ink-3)}

        /* DYNAMIC FIELDS */
        .dyn-section{display:none;animation:fadeUp .25s ease}
        .dyn-section.show{display:block}

        /* EMPTY STATE */
        .empty-state{text-align:center;padding:3.5rem 2rem;color:var(--ink-3)}
        .empty-state-ico{font-size:2.5rem;opacity:.25;margin-bottom:.7rem}
        .empty-state-title{font-family:var(--fd);font-size:1rem;color:var(--ink-2);margin-bottom:.3rem}
        .empty-state-sub{font-size:.75rem}

        /* PAGINATION */
        .pagination{display:flex;gap:.35rem;justify-content:center;padding:1rem;flex-wrap:wrap}
        .pagination .page-item .page-link{display:inline-flex;align-items:center;justify-content:center;width:32px;height:32px;border-radius:var(--r);font-size:.75rem;font-weight:600;font-family:var(--fm);border:1px solid var(--rule-2);color:var(--ink-2);text-decoration:none;transition:var(--tr);background:var(--surface)}
        .pagination .page-item.active .page-link{background:var(--teal);color:#fff;border-color:var(--teal)}
        .pagination .page-item .page-link:hover{background:var(--teal-lt);border-color:var(--teal);color:var(--teal)}

        @keyframes fadeUp{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:translateY(0)}}
        .anim{animation:fadeUp .35s ease both}
        .anim-d1{animation-delay:.05s}.anim-d2{animation-delay:.1s}.anim-d3{animation-delay:.15s}

        @media print{.sidebar,.topbar,.no-print{display:none!important}.main{margin-left:0!important}}
        @media(max-width:900px){.kpi-strip{grid-template-columns:1fr 1fr}.form-grid-3{grid-template-columns:1fr 1fr}}
        @media(max-width:700px){.sidebar{display:none}.main{margin-left:0}.kpi-strip{grid-template-columns:1fr 1fr}}
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
        <a href="/dashboard/chef" class="sb-link"><span class="sb-link-ico">⊞</span> Tableau de bord</a>

        <div class="sb-section">Gestion médicale</div>
        <a href="/patients"      class="sb-link"><span class="sb-link-ico">◯</span> Patients</a>
        <a href="/consultations" class="sb-link"><span class="sb-link-ico">✦</span> Consultations</a>
        <a href="/medicaments"   class="sb-link"><span class="sb-link-ico">⬡</span> Médicaments</a>

        <div class="sb-section">Services</div>
        <a href="/smi"        class="sb-link"><span class="sb-link-ico">◈</span> Service SMI</a>
        <a href="/chroniques" class="sb-link"><span class="sb-link-ico">♡</span> Maladies Chroniques</a>

        <div class="sb-section">Administration</div>
        <a href="/rapports"     class="sb-link"><span class="sb-link-ico">▦</span> Rapports SREC</a>
        <a href="/appareils"    class="sb-link"><span class="sb-link-ico">⊕</span> Appareils</a>
        <a href="/declarations" class="sb-link active"><span class="sb-link-ico">📋</span> Déclarations</a>
        <a href="/conges"       class="sb-link"><span class="sb-link-ico">🏖</span> Congés</a>
        <a href="/users"        class="sb-link"><span class="sb-link-ico">⚙</span> Utilisateurs</a>
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
                <span>🏥 Centre de Santé</span>
                <span style="opacity:.4">›</span>
                <span>Déclarations du Personnel</span>
            </div>
            <div class="topbar-title">
                <span class="pulse"></span>
                Déclarations — Gestion Administrative
            </div>
        </div>
        <div class="topbar-right no-print">
            <a href="/dashboard/chef" class="btn btn-ghost btn-sm">← Tableau de bord</a>
            <button onclick="window.print()" class="btn btn-ghost btn-sm">📄 Imprimer</button>
        </div>
    </header>

    <div class="content">

        {{-- Flash messages --}}
        @if(session('success'))
        <div class="flash flash-ok anim">✓ &nbsp;{{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="flash flash-err anim">✕ &nbsp;{{ session('error') }}</div>
        @endif

        <!-- KPI STRIP -->
        <div class="kpi-strip anim">
            <div class="kpi">
                <div class="kpi-top"><div class="kpi-label">Total</div><div class="kpi-ico">📋</div></div>
                <div class="kpi-val c-teal">{{ $stats['total'] }}</div>
                <div class="kpi-foot">Toutes déclarations</div>
                <div class="kpi-bar b-teal"></div>
            </div>
            <div class="kpi">
                <div class="kpi-top"><div class="kpi-label">En attente</div><div class="kpi-ico">⏳</div></div>
                <div class="kpi-val c-amber">{{ $stats['en_attente'] }}</div>
                <div class="kpi-foot">À traiter</div>
                <div class="kpi-bar b-amber"></div>
            </div>
            <div class="kpi">
                <div class="kpi-top"><div class="kpi-label">En cours</div><div class="kpi-ico">🔄</div></div>
                <div class="kpi-val c-indigo">{{ $stats['en_cours'] }}</div>
                <div class="kpi-foot">En traitement</div>
                <div class="kpi-bar b-indigo"></div>
            </div>
            <div class="kpi">
                <div class="kpi-top"><div class="kpi-label">Validées</div><div class="kpi-ico">✓</div></div>
                <div class="kpi-val c-emerald">{{ $stats['valide'] }}</div>
                <div class="kpi-foot">Approuvées</div>
                <div class="kpi-bar b-emerald"></div>
            </div>
        </div>

        <!-- FORMULAIRE NOUVELLE DÉCLARATION -->
        <div class="card anim anim-d1">
            <div class="card-head">
                <div class="card-title">📋 Nouvelle Déclaration</div>
                <button type="button" onclick="toggleForm()" class="btn btn-ghost btn-sm no-print" id="btn-toggle-form">
                    + Saisir une déclaration
                </button>
            </div>

            <div id="form-wrapper" style="display:none">
                <div class="card-body">
                    <form method="POST" action="/declarations" id="decl-form">
                        @csrf

                        {{-- Section agent --}}
                        <div class="section-band">
                            <div class="section-band-title">👤 Informations de l'agent</div>
                            <div class="form-grid-3">
                                <div class="form-group">
                                    <label class="form-label">Nom complet *</label>
                                    <input type="text" name="nom_agent" class="form-input @error('nom_agent') error @enderror"
                                           value="{{ old('nom_agent') }}" placeholder="Nom et prénom" required/>
                                    @error('nom_agent')<div class="field-error">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Matricule</label>
                                    <input type="text" name="matricule" class="form-input"
                                           value="{{ old('matricule') }}" placeholder="MAT-XXXX"/>
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
                                        @foreach(['SMI','Consultation générale','Planification Familiale','Maladies Chroniques','Pharmacie','Administration'] as $s)
                                        <option value="{{ $s }}" {{ old('service')==$s?'selected':'' }}>{{ $s }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">CIN</label>
                                    <input type="text" name="cin" class="form-input"
                                           value="{{ old('cin') }}" placeholder="A-XXXXXXX"/>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Date de déclaration *</label>
                                    <input type="date" name="date_decl" class="form-input"
                                           value="{{ old('date_decl', date('Y-m-d')) }}" required/>
                                </div>
                            </div>
                        </div>

                        {{-- Section type & motif --}}
                        <div class="section-band">
                            <div class="section-band-title">📄 Type et motif</div>
                            <div class="form-grid-2">
                                <div class="form-group">
                                    <label class="form-label">Type de déclaration *</label>
                                    <select name="type" id="type-select" class="form-select @error('type') error @enderror"
                                            onchange="toggleDynFields(this.value)" required>
                                        <option value="">— Sélectionner —</option>
                                        <option value="accident"      {{ old('type')=='accident'?'selected':''      }}>Accident de travail</option>
                                        <option value="maladie"       {{ old('type')=='maladie'?'selected':''       }}>Maladie professionnelle</option>
                                        <option value="incident"      {{ old('type')=='incident'?'selected':''      }}>Incident / Signalement</option>
                                        <option value="absence"       {{ old('type')=='absence'?'selected':''       }}>Absence injustifiée</option>
                                        <option value="disciplinaire" {{ old('type')=='disciplinaire'?'selected':'' }}>Faute disciplinaire</option>
                                        <option value="autre"         {{ old('type')=='autre'?'selected':''         }}>Autre</option>
                                    </select>
                                    @error('type')<div class="field-error">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Degré d'urgence</label>
                                    <select name="urgence" class="form-select">
                                        @foreach(['Normal','Urgent','Très urgent'] as $u)
                                        <option value="{{ $u }}" {{ old('urgence')==$u?'selected':'' }}>{{ $u }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Champs accident --}}
                            <div id="dyn-accident" class="dyn-section {{ old('type')=='accident'?'show':'' }}">
                                <div class="form-grid-3">
                                    <div class="form-group">
                                        <label class="form-label">Date de l'accident *</label>
                                        <input type="date" name="date_faits" class="form-input" value="{{ old('date_faits') }}"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Heure</label>
                                        <input type="time" name="heure_accident" class="form-input" value="{{ old('heure_accident') }}"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Lieu</label>
                                        <input type="text" name="lieu_accident" class="form-input" value="{{ old('lieu_accident') }}" placeholder="Salle de soins…"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nature de la blessure</label>
                                        <select name="nature_blessure" class="form-select">
                                            @foreach(['Coupure / Plaie','Contusion','Fracture','Brûlure','Exposition sang','Chute','Autre'] as $n)
                                            <option value="{{ $n }}" {{ old('nature_blessure')==$n?'selected':'' }}>{{ $n }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Partie du corps</label>
                                        <input type="text" name="partie_corps" class="form-input" value="{{ old('partie_corps') }}" placeholder="Main droite, dos…"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Témoin(s)</label>
                                        <input type="text" name="temoins" class="form-input" value="{{ old('temoins') }}" placeholder="Noms des témoins"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Circonstances</label>
                                    <textarea name="circonstances" class="form-textarea" placeholder="Décrivez les circonstances de l'accident…">{{ old('circonstances') }}</textarea>
                                </div>
                            </div>

                            {{-- Champs autres types --}}
                            <div id="dyn-autre" class="dyn-section {{ in_array(old('type'),['maladie','incident','absence','disciplinaire','autre'])?'show':'' }}">
                                <div class="form-group">
                                    <label class="form-label">Description détaillée</label>
                                    <textarea name="description" class="form-textarea" placeholder="Décrivez la situation en détail…">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            {{-- Date faits pour non-accident --}}
                            <div id="dyn-date-faits" class="dyn-section {{ old('type') && old('type')!='accident'?'show':'' }}">
                                <div class="form-group" style="max-width:260px">
                                    <label class="form-label">Date des faits *</label>
                                    <input type="date" name="date_faits" class="form-input" value="{{ old('date_faits') }}"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Observations complémentaires</label>
                                <textarea name="observations" class="form-textarea" placeholder="Toute information utile pour le traitement de ce dossier…">{{ old('observations') }}</textarea>
                            </div>
                        </div>

                        {{-- Section validation --}}
                        <div class="section-band">
                            <div class="section-band-title">✍️ Validation</div>
                            <div class="form-grid-3">
                                <div class="form-group">
                                    <label class="form-label">Déclaré par</label>
                                    <input type="text" name="declare_par" class="form-input"
                                           value="{{ old('declare_par', auth()->user()->name ?? 'Chef de Service') }}"/>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Statut</label>
                                    <select name="statut" class="form-select">
                                        <option value="en_attente" {{ old('statut','en_attente')=='en_attente'?'selected':'' }}>En attente</option>
                                        <option value="en_cours"   {{ old('statut')=='en_cours'?'selected':''   }}>En cours</option>
                                        <option value="valide"     {{ old('statut')=='valide'?'selected':''     }}>Validé</option>
                                        <option value="classe"     {{ old('statut')=='classe'?'selected':''     }}>Classé sans suite</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Date de traitement</label>
                                    <input type="date" name="date_traitement" class="form-input" value="{{ old('date_traitement') }}"/>
                                </div>
                            </div>
                        </div>

                        <div style="display:flex;gap:.8rem;justify-content:flex-end" class="no-print">
                            <button type="button" onclick="toggleForm()" class="btn btn-ghost">✕ Annuler</button>
                            <button type="button" onclick="genererPDF()" class="btn btn-ghost"
                                    style="background:var(--indigo-lt);color:var(--indigo);border-color:rgba(55,48,163,.2)">
                                📥 Télécharger PDF
                            </button>
                            <button type="submit" class="btn btn-teal">↓ Enregistrer la déclaration</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- TABLEAU HISTORIQUE -->
        <div class="card anim anim-d2">
            <div class="card-head">
                <div class="card-title">📋 Historique des Déclarations</div>
                <div style="display:flex;align-items:center;gap:.6rem">
                    <span class="chip chip-info">{{ $stats['total'] }} déclaration(s)</span>
                    <button onclick="window.print()" class="btn btn-ghost btn-sm no-print">🖨️ Imprimer</button>
                </div>
            </div>

            @if($declarations->count() > 0)
            <div class="tbl-wrap">
                <table class="tbl">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Agent</th>
                            <th>Grade / Service</th>
                            <th>Type</th>
                            <th>Date des faits</th>
                            <th>Date déclaration</th>
                            <th>Urgence</th>
                            <th>Statut</th>
                            <th class="no-print">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($declarations as $decl)
                        <tr>
                            <td class="mono">{{ $decl->id }}</td>
                            <td class="agent-name">{{ $decl->nom_agent }}</td>
                            <td>
                                <div style="font-size:.75rem;color:var(--ink-2)">{{ $decl->grade }}</div>
                                <div class="mono" style="color:var(--ink-3)">{{ $decl->service }}</div>
                            </td>
                            <td>
                                <span style="font-size:.77rem;font-weight:600;color:var(--ink-2)">{{ $decl->type_libelle }}</span>
                            </td>
                            <td class="mono">{{ $decl->date_faits ? $decl->date_faits->format('d/m/Y') : '—' }}</td>
                            <td class="mono">{{ $decl->date_decl ? $decl->date_decl->format('d/m/Y') : '—' }}</td>
                            <td>
                                @php
                                    $uChip = match($decl->urgence) {
                                        'Très urgent' => 'chip-crit',
                                        'Urgent'      => 'chip-warn',
                                        default       => 'chip-ok',
                                    };
                                @endphp
                                <span class="chip {{ $uChip }}">{{ $decl->urgence }}</span>
                            </td>
                            <td>
                                @php
                                    $sChip = match($decl->statut) {
                                        'valide'     => 'chip-ok',
                                        'en_cours'   => 'chip-indigo',
                                        'en_attente' => 'chip-warn',
                                        'classe'     => 'chip-info',
                                        default      => 'chip-info',
                                    };
                                @endphp
                                <span class="chip {{ $sChip }}">{{ $decl->statut_libelle }}</span>
                            </td>
                            @php $dateFmt = $decl->date_faits ? $decl->date_faits->format('d/m/Y') : '-'; @endphp
                            <td class="no-print">
                                <div style="display:flex;gap:.3rem">
                                    <button onclick="imprimerDeclaration({{ $decl->id }}, '{{ addslashes($decl->nom_agent) }}', '{{ $decl->matricule }}', '{{ addslashes($decl->grade) }}', '{{ addslashes($decl->service) }}', '{{ $decl->cin }}', '{{ addslashes($decl->type_libelle) }}', '{{ $decl->urgence }}', '{{ $decl->statut_libelle }}', '{{ $dateFmt }}', '{{ addslashes($decl->observations) }}')"
                                       class="btn btn-ghost btn-xs" style="color:var(--teal)">
                                        📥
                                    </button>
                                    <form method="POST" action="/declarations/{{ $decl->id }}" style="display:inline"
                                          onsubmit="return confirm('Supprimer cette déclaration ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs">✕</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- Pagination --}}
            <div class="pagination">
                {{ $declarations->links('pagination::simple-bootstrap-4') }}
            </div>
            @else
            <div class="empty-state">
                <div class="empty-state-ico">📋</div>
                <div class="empty-state-title">Aucune déclaration enregistrée</div>
                <div class="empty-state-sub">Cliquez sur "Saisir une déclaration" pour commencer</div>
            </div>
            @endif
        </div>

    </div>
</main>

<script>
// Afficher/masquer le formulaire
function toggleForm() {
    const w = document.getElementById('form-wrapper');
    const btn = document.getElementById('btn-toggle-form');
    const open = w.style.display === 'block';
    w.style.display = open ? 'none' : 'block';
    btn.textContent = open ? '+ Saisir une déclaration' : '− Masquer le formulaire';
    if (!open) w.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

// Auto-ouvrir si erreurs de validation
@if($errors->any())
document.getElementById('form-wrapper').style.display = 'block';
document.getElementById('btn-toggle-form').textContent = '− Masquer le formulaire';
@endif

// Champs dynamiques selon type
function toggleDynFields(type) {
    const acc       = document.getElementById('dyn-accident');
    const autre     = document.getElementById('dyn-autre');
    const dateFaits = document.getElementById('dyn-date-faits');

    acc.classList.remove('show');
    autre.classList.remove('show');
    dateFaits.classList.remove('show');

    if (type === 'accident') {
        acc.classList.add('show');
    } else if (type) {
        autre.classList.add('show');
        dateFaits.classList.add('show');
    }
}

// Init
document.addEventListener('DOMContentLoaded', () => {
    const sel = document.getElementById('type-select');
    if (sel && sel.value) toggleDynFields(sel.value);
});

// Générer PDF déclaration depuis le formulaire
function genererPDF() {
    const get = id => document.querySelector(id)?.value || '—';
    const nom        = get('[name="nom_agent"]');
    const matricule  = get('[name="matricule"]');
    const grade      = get('[name="grade"]');
    const service    = get('[name="service"]');
    const cin        = get('[name="cin"]');
    const typeVal    = get('[name="type"]');
    const urgence    = get('[name="urgence"]');
    const dateDecl   = get('[name="date_decl"]');
    const obs        = get('[name="observations"]');
    const declarePar = get('[name="declare_par"]');
    const statut     = get('[name="statut"]');
    const typeLabels = {accident:'Accident de travail',maladie:'Maladie professionnelle',incident:'Incident / Signalement',absence:'Absence injustifiée',disciplinaire:'Faute disciplinaire',autre:'Autre','':'Non spécifié'};
    const statutLabels = {en_attente:'En attente',en_cours:'En cours',valide:'Validé',classe:'Classé sans suite'};
    openPDF(Math.floor(Math.random()*9000)+1000, nom, matricule, grade, service, cin, typeLabels[typeVal]||typeVal, urgence, statutLabels[statut]||statut, dateDecl, obs, declarePar);
}

// Imprimer une déclaration existante depuis le tableau
function imprimerDeclaration(id, nom, mat, grade, service, cin, type, urgence, statut, dateFaits, obs) {
    openPDF(id, nom, mat, grade, service, cin, type, urgence, statut, dateFaits, obs, 'Chef de Service');
}

function openPDF(num, nom, mat, grade, service, cin, type, urgence, statut, dateFaits, obs, declarePar) {
    declarePar = declarePar || 'Chef de Service';
    const urg = { 'Très urgent':'#c0392b','Urgent':'#b45309','Normal':'#166534' };
    const sta = { 'Validé':'#166534','En cours':'#3730a3','En attente':'#b45309','Classé sans suite':'#6b7a99' };
    const uC = urg[urgence]||'#006d77';
    const sC = sta[statut]||'#6b7a99';
    const today = new Date().toLocaleDateString('fr-FR',{weekday:'long',year:'numeric',month:'long',day:'numeric'});

    const html = `<!DOCTYPE html>
<html lang="fr"><head><meta charset="UTF-8"/><title>Déclaration N°${num}</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=DM+Sans:wght@400;600;700&family=DM+Mono&display=swap" rel="stylesheet"/>
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:'DM Sans',Arial,sans-serif;background:#fff;color:#0a0f1e;padding:2.2cm 2cm;font-size:13px;line-height:1.6}
.header{display:flex;justify-content:space-between;align-items:flex-start;padding-bottom:1.4rem;border-bottom:3px solid #006d77;margin-bottom:2rem}
.hl .flag{font-size:1.8rem;margin-bottom:.4rem;display:block}
.hl .min{font-size:.72rem;color:#6b7a99;text-transform:uppercase;letter-spacing:.07em}
.hl .pay{font-weight:700;font-size:.85rem}
.hl .sub{font-size:.72rem;color:#6b7a99;margin-top:.15rem}
.hr{text-align:right}
.hr .num{font-family:'DM Serif Display',serif;font-size:2rem;color:#006d77;letter-spacing:-.04em}
.hr .lbl{font-size:.6rem;color:#6b7a99;text-transform:uppercase;letter-spacing:.1em}
.hr .date{font-size:.7rem;color:#2d3650;margin-top:.25rem}
.badge{display:inline-flex;align-items:center;gap:.3rem;padding:.22rem .75rem;border-radius:50px;font-size:.7rem;font-weight:700;border:1.5px solid}
.main-title{text-align:center;margin-bottom:1.8rem}
.main-title h1{font-family:'DM Serif Display',serif;font-size:1.5rem;letter-spacing:-.02em;text-transform:uppercase;margin-bottom:.3rem}
.main-title .sub{font-size:.78rem;color:#6b7a99}
.badges{margin-top:.7rem;display:flex;justify-content:center;gap:.5rem;flex-wrap:wrap}
.sec{margin-bottom:1.6rem;page-break-inside:avoid}
.sec-head{display:flex;align-items:center;gap:.5rem;padding:.45rem .85rem;background:#f0f9f9;border-left:3px solid #006d77;border-radius:0 6px 6px 0;margin-bottom:.8rem}
.sec-head .ico{font-size:1rem}
.sec-head .ttl{font-family:'DM Serif Display',serif;font-size:.78rem;text-transform:uppercase;letter-spacing:.07em;color:#006d77}
table.info{width:100%;border-collapse:collapse}
table.info tr:nth-child(even) td{background:#f9f8f5}
table.info td{padding:.48rem .75rem;border:1px solid #e2e8f0;font-size:.82rem;vertical-align:top}
table.info td:first-child{font-weight:700;background:#f0f9f9;width:200px;color:#0a0f1e;white-space:nowrap}
.sigs{display:flex;justify-content:space-around;margin-top:2.5rem;padding-top:1.2rem;border-top:1px solid #e2e8f0}
.sig{text-align:center;width:180px}
.sig-line{border-bottom:1px solid #0a0f1e;margin-bottom:.4rem;height:44px}
.sig-ttl{font-size:.68rem;font-weight:700;text-transform:uppercase;letter-spacing:.06em}
.sig-name{font-size:.68rem;color:#6b7a99;font-style:italic;margin-top:.15rem}
.footer{margin-top:1.8rem;padding-top:.7rem;border-top:1px solid #e2e8f0;display:flex;justify-content:space-between;font-size:.62rem;color:#a8b4cc}
.footer-r{color:#006d77;font-weight:600}
.actions{text-align:center;margin:1.5rem 0 0;display:flex;gap:.6rem;justify-content:center}
.actions button{padding:.55rem 1.3rem;border-radius:8px;cursor:pointer;font-family:'DM Sans',sans-serif;font-weight:600;font-size:.8rem}
.btn-p{background:#006d77;color:#fff;border:none}
.btn-c{background:#f5f4f0;color:#2d3650;border:1px solid #e2e8f0}
@media print{body{padding:1.5cm}.actions{display:none}@page{size:A4;margin:1.5cm}}
</style></head><body>
<div class="header">
  <div class="hl">
    <span class="flag">🇲🇦</span>
    <div class="min">Ministère de la Santé et de la Protection Sociale</div>
    <div class="pay">Royaume du Maroc</div>
    <div class="sub">Région : Marrakech-Safi · Province : Safi</div>
    <div class="sub">Centre de Santé Jemaat Shaim</div>
  </div>
  <div class="hr">
    <div class="lbl">Déclaration N°</div>
    <div class="num">${String(num).padStart(4,'0')}</div>
    <div class="date">Généré le ${today}</div>
    <div style="margin-top:.4rem">
      <span class="badge" style="color:${uC};border-color:${uC}20;background:${uC}12">⚡ ${urgence}</span>
    </div>
  </div>
</div>

<div class="main-title">
  <h1>Déclaration Officielle</h1>
  <div class="sub">Document confidentiel — Personnel de santé</div>
  <div class="badges">
    <span class="badge" style="color:${uC};border-color:${uC}30;background:${uC}10">⚡ ${urgence}</span>
    <span class="badge" style="color:${sC};border-color:${sC}30;background:${sC}10">● ${statut}</span>
    <span class="badge" style="color:#006d77;border-color:#006d7730;background:#006d7710">📋 ${type}</span>
  </div>
</div>

<div class="sec">
  <div class="sec-head"><span class="ico">👤</span><span class="ttl">Informations de l'agent</span></div>
  <table class="info">
    <tr><td>Nom complet</td><td style="font-weight:700;font-size:.92rem">${nom}</td></tr>
    <tr><td>Matricule</td><td>${mat}</td></tr>
    <tr><td>Grade / Fonction</td><td>${grade}</td></tr>
    <tr><td>Service</td><td>${service}</td></tr>
    <tr><td>CIN</td><td>${cin}</td></tr>
    <tr><td>Date de déclaration</td><td>${dateFaits}</td></tr>
  </table>
</div>

<div class="sec">
  <div class="sec-head"><span class="ico">📄</span><span class="ttl">Type et motif</span></div>
  <table class="info">
    <tr><td>Type de déclaration</td><td><strong>${type}</strong></td></tr>
    <tr><td>Degré d'urgence</td><td><span style="font-weight:700;color:${uC}">${urgence}</span></td></tr>
    <tr><td>Observations</td><td style="white-space:pre-wrap">${obs}</td></tr>
  </table>
</div>

<div class="sec">
  <div class="sec-head"><span class="ico">✍️</span><span class="ttl">Validation et suivi</span></div>
  <table class="info">
    <tr><td>Déclaré par</td><td>${declarePar}</td></tr>
    <tr><td>Statut</td><td><span style="font-weight:700;color:${sC}">${statut}</span></td></tr>
    <tr><td>Établissement</td><td>Centre de Santé Jemaat Shaim — Safi</td></tr>
  </table>
</div>

<div class="sigs">
  <div class="sig"><div class="sig-line"></div><div class="sig-ttl">L'Agent</div><div class="sig-name">${nom}</div></div>
  <div class="sig"><div class="sig-line"></div><div class="sig-ttl">Chef de Service</div><div class="sig-name">${declarePar}</div></div>
  <div class="sig"><div class="sig-line"></div><div class="sig-ttl">Cachet Officiel</div><div class="sig-name">Province de Safi</div></div>
</div>

<div class="footer">
  <div>Centre de Santé Jemaat Shaim · Safi, Maroc · ${today}</div>
  <div class="footer-r">N°${String(num).padStart(4,'0')} · © ${new Date().getFullYear()}</div>
</div>

<div class="actions">
  <button class="btn-p" onclick="window.print()">🖨️ Imprimer / PDF</button>
  <button class="btn-c" onclick="window.close()">✕ Fermer</button>
</div>
</body></html>`;

    const blob = new Blob([html], { type: 'text/html;charset=utf-8' });
    const url  = URL.createObjectURL(blob);
    const win  = window.open(url, '_blank');
    if (!win) {
        const a = document.createElement('a');
        a.href = url;
        a.download = `declaration_${String(num).padStart(4,'0')}_${nom.replace(/\s+/g,'_')}.html`;
        document.body.appendChild(a); a.click(); document.body.removeChild(a);
    }
    setTimeout(() => URL.revokeObjectURL(url), 15000);
}
</script>
</body>
</html>